<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;

class MenuCategoryController extends AdminController{

    public function scroll($page = 1){

        $menuCategories = DB::table("menu_categories")
            ->join("menu_category_translations", "menu_category_translations.menu_category_id", "=", "menu_categories.id")
            ->groupBy("menu_category_id")
        ->select("menu_category_id", DB::raw('group_concat(name) as names'), DB::raw('group_concat(locale) as locales'));

        //ORDER START
        $allowedOrderBy =           ["id", "name", "locale"];
        $allowedOriginalOrderBy =   ["menu_category_id", "name", "locale"];

        $allowedOrderType = ["asc", "desc"];

        $originalOrderByIndex = array_search(Request::input("order_by"), $allowedOrderBy);
        if($originalOrderByIndex !== false){

            $orderBy = $allowedOrderBy[$originalOrderByIndex];
            $orderType = $allowedOrderType[array_search(Request::input("order_type"), $allowedOrderType)];

            $menuCategories = $menuCategories->orderBy($allowedOriginalOrderBy[$originalOrderByIndex], $allowedOrderType[array_search(Request::input("order_type"), $allowedOrderType)]);
        }
        else{
            $orderBy = null;
            $orderType = null;
        }
        //ORDER END

        //WHERE START
        $input = Request::all();

        $rules['name'] = "max:100";

        $validator = Validator::make($input, $rules);

        if (!$validator->fails()) {

            $rules['name'] = "required";

            $isSetAnyVarValidator = Validator::make($input, $rules);

            if(!$isSetAnyVarValidator->fails()){

                $menuCategoriesFiltered = (clone $menuCategories);

                if(!empty($input['name'])) {
                    $menuCategories = $menuCategories->where("name", "LIKE", "%".$input['name']."%");
                    $menuCategoriesFiltered = $menuCategoriesFiltered->having("names", "LIKE", "%".$input['name']."%");
                }

                $menuCategories = $menuCategories->paginate(10, ['*'], null, $page);
                $menuCategoriesFiltered = $menuCategoriesFiltered->get();

                for($i=0; $i<$menuCategories->count();$i++)
                    $menuCategories[$i] = $menuCategoriesFiltered[$i];
            }
            else{
                $menuCategories = $menuCategories->paginate(10, ['*'], null, $page);
            }
        }
        else{
            $menuCategories = $menuCategories->paginate(10, ['*'], null, $page);
        }
        //WHERE END

        $filterQuery = [];
        foreach ($input as $key=>$value){
            if(!in_array($key, ["order_by", "order_type"])) {
                $filterQuery[] = $key . "=" . $value;
            }
        }
        $filterQuery = implode("&", $filterQuery);

        $languagesCount = DB::table("languages")->count();
        $languages = DB::table("languages")->get();

        foreach ($menuCategories as $key=>$menuCategory){
            $menuCategories[$key]->names = explode(",", $menuCategories[$key]->names);
            $menuCategories[$key]->locales = explode(",", $menuCategories[$key]->locales);

            for($i=0; $i<=count($languagesCount)+1; $i++) {
                $localeIndex = array_search($languages[$i]->locale, $menuCategories[$key]->locales);
                $menuCategories[$key]->namesWithLangs[$languages[$i]->locale] = $menuCategories[$key]->names[$localeIndex];
            }
        }

        $data = [
            'menuCategories' => $menuCategories,
            'languages' => $languages,
            'filterQuery' => $filterQuery,
            'orderBy' => $orderBy,
            'orderType' => $orderType,
        ];

        return view('admin.menu_categories.scroll', $data);
    }

    public function add(){

        $languages = DB::table("languages")->get();

        if(Request::isMethod('post')){
            $input = Request::except('_token');
            if(isset($input)) {

                $rules['name.*'] = "required|max:20";

                $validator = Validator::make($input, $rules);

                if ($validator->fails()) {
                    Session::flash('errors', $validator->errors()->all());
                } else {
                    $insertData = [];

                    $menu_id = DB::table("menu_categories")->insertGetId($insertData);

                    $insertData = array();
                    foreach ($languages as $language){
                        $insertData[] = [
                            'menu_category_id' => $menu_id,
                            'name' => $input['name'][$language->locale],
                            'locale' => $language->locale
                        ];
                    }

                    DB::table("menu_category_translations")->insert($insertData);

                    return redirect()->route('adminMenuCategoriesScroll');
                }
            }
        }

        $data = [
            'languages' => $languages
        ];

        return view('admin.menu_categories.add', $data);
    }

    public function edit($id){
        $languages = DB::table("languages")->get();

        $menuCategory = DB::table("menu_categories")
            ->where("menu_categories.id", $id)
            ->first();

        if($menuCategory) {

            $menuCategoryTransaltions = DB::table("menu_category_translations")->where(['menu_category_id' => $id])->get();

            $menuCategoryTransaltionsLite = [];
            foreach ($menuCategoryTransaltions as $menuCategoryTransaltion) {
                $menuCategoryTransaltionsLite['name'][$menuCategoryTransaltion->locale] = $menuCategoryTransaltion->name;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $rules['name.*'] = "required|max:20";

                    $validator = Validator::make($input, $rules);

                    if ($validator->fails()) {
                        Session::flash('errors', $validator->errors()->all());
                    } else {

                        foreach ($languages as $language) {
                            $updateData = [
                                'name' => $input['name'][$language->locale],
                            ];

                            $where = [
                                'menu_category_id' => $id,
                                'locale' => $language->locale
                            ];

                            DB::table("menu_category_translations")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminMenuCategoriesScroll');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'menusCategory' => $menuCategory,
                'menusCategoryTransaltionsLite' => $menuCategoryTransaltionsLite
            ];

            return view('admin.menu_categories.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }

    public function delete($id){

        $menuCategory = DB::table("menu_categories")->where("menu_categories.id", $id)->first();

        if($menuCategory) {
            $menu = DB::table("menu_dishes")
                ->where("menu_category_id", $id)
                ->get();

            if ($menu->isEmpty()) {

                DB::table("menu_categories")->where(['id' => $id])->delete();
                DB::table("menu_category_translations")->where(['menu_category_id' => $id])->delete();

                $messages = [
                    [
                        "status" => "success",
                        "text" => "Категория успешно удалена"
                    ]
                ];
            } else {
                $messages = [
                    [
                        "status" => "danger",
                        "text" => "Удалите сперва связанный с ним Блюда"
                    ]
                ];

            }

            Session::flash('messages', $messages);

            return redirect()->route('adminMenuCategoriesScroll');
        }
        else{
            return view('errors.404');
        }
    }
}
