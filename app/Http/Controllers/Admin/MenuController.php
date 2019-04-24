<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;

class MenuController extends AdminController{

    public function headerEdit(){
        $languages = DB::table("languages")->get();

        $menu = DB::table("menu_main")->get();

        if($menu) {

            $menuTransaltionsLite = [];
            foreach ($menu as $menuItem) {
                $menuTransaltionsLite['heading'][$menuItem->locale] = $menuItem->heading;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $menuValidation['heading.*'] = "required|max:30";

                    $validator = Validator::make($input, $menuValidation);

                    if ($validator->fails()) {
                        Session::flash('errors', $validator->errors()->all());
                    } else {

                        foreach ($languages as $language) {
                            $updateData = [
                                'heading' => $input['heading'][$language->locale]
                            ];

                            $where = [
                                'locale' => $language->locale
                            ];

                            DB::table("menu_main")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'menuTransaltionsLite' => $menuTransaltionsLite
            ];

            return view('admin.menu.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }

    public function scroll($page = 1){

        $menuDishes = DB::table("menu_dishes")
            ->join("menu_dish_translations", "menu_dish_translations.menu_dish_id", "=", "menu_dishes.id")
            ->join("menu_category_translations", "menu_category_translations.menu_category_id", "=", "menu_dishes.menu_category_id")
            ->where("menu_dish_translations.locale", "ru")
            ->where("menu_category_translations.locale", "ru")
            ->selectRaw("menu_dishes.id, menu_dish_translations.name as dish_name, description, price, menu_category_translations.name as category_name");

        //ORDER START
        $allowedOrderBy =           ["id", "name", "locale"];
        $allowedOriginalOrderBy =   ["menu_dishes.id", "menu_dish_translations.name", "locale"];

        $allowedOrderType = ["asc", "desc"];

        $originalOrderByIndex = array_search(Request::input("order_by"), $allowedOrderBy);
        if($originalOrderByIndex !== false){

            $orderBy = $allowedOrderBy[$originalOrderByIndex];
            $orderType = $allowedOrderType[array_search(Request::input("order_type"), $allowedOrderType)];

            $menuDishes = $menuDishes->orderBy($allowedOriginalOrderBy[$originalOrderByIndex], $allowedOrderType[array_search(Request::input("order_type"), $allowedOrderType)]);
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

                $menuDishesFiltered = (clone $menuDishes);

                if(!empty($input['name'])) {
                    $menuDishes = $menuDishes->where("menu_dish_translations.name", "LIKE", "%".$input['name']."%");
//                    $menuDishesFiltered = $menuDishesFiltered->having("names", "LIKE", "%".$input['name']."%");
                }

                $menuDishes = $menuDishes->paginate(10, ['*'], null, $page);
                $menuDishesFiltered = $menuDishesFiltered->get();

                for($i=0; $i<$menuDishes->count();$i++)
                    $menuDishes[$i] = $menuDishesFiltered[$i];
            }
            else{
                $menuDishes = $menuDishes->paginate(10, ['*'], null, $page);
            }
        }
        else{
            $menuDishes = $menuDishes->paginate(10, ['*'], null, $page);
        }
        //WHERE END

        $filterQuery = [];
        foreach ($input as $key=>$value){
            if(!in_array($key, ["order_by", "order_type"])) {
                $filterQuery[] = $key . "=" . $value;
            }
        }
        $filterQuery = implode("&", $filterQuery);

        $languages = DB::table("languages")->get();

        $data = [
            'menuDishes' => $menuDishes,
            'languages' => $languages,
            'filterQuery' => $filterQuery,
            'orderBy' => $orderBy,
            'orderType' => $orderType,
        ];

        return view('admin.menu.scroll', $data);
    }

    public function add(){

        $languages = DB::table("languages")->get();

        $menuCategories = DB::table("menu_categories")
            ->join("menu_category_translations", "menu_category_translations.menu_category_id", "=", "menu_categories.id")
            ->where("locale", "ru")
           ->get();

        if(Request::isMethod('post')){
            $input = Request::except('_token');
            if(isset($input)) {

                $rules['name.*'] = "required|max:500";
                $rules['description.*'] = "required|max:500";
                $rules['price'] = "required|numeric";

                $validator = Validator::make($input, $rules);

                if ($validator->fails()) {
                    Session::flash('errors', $validator->errors()->all());
                } else {
                    $insertData = [
                        'price' => $input['price'] * 100,
                        'menu_category_id' => $input['menu_category_id']
                    ];

                    $menu_id = DB::table("menu_dishes")->insertGetId($insertData);

                    $insertData = array();
                    foreach ($languages as $language){
                        $insertData[] = [
                            'menu_dish_id' => $menu_id,
                            'name' => $input['name'][$language->locale],
                            'description' => $input['description'][$language->locale],
                            'locale' => $language->locale
                        ];
                    }

                    DB::table("menu_dish_translations")->insert($insertData);

                    return redirect()->route('adminMenuDishesScroll');
                }
            }
        }

        $data = [
            'languages' => $languages,
            'menuCategories' => $menuCategories
        ];

        return view('admin.menu.add', $data);
    }

    public function edit($id){
        $languages = DB::table("languages")->get();

        $menuDish = DB::table("menu_dishes")
            ->where("menu_dishes.id", $id)
            ->first();

        $menuCategories = DB::table("menu_categories")
            ->join("menu_category_translations", "menu_category_translations.menu_category_id", "=", "menu_categories.id")
            ->where("locale", "ru")
            ->get();

        if($menuDish) {

            $menuDishTransaltions = DB::table("menu_dish_translations")->where(['menu_dish_id' => $id])->get();

            $menuDishTransaltionsLite = [];
            foreach ($menuDishTransaltions as $menuDishTransaltion) {
                $menuDishTransaltionsLite['name'][$menuDishTransaltion->locale] = $menuDishTransaltion->name;
                $menuDishTransaltionsLite['description'][$menuDishTransaltion->locale] = $menuDishTransaltion->description;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $rules['name.*'] = "required|max:500";
                    $rules['description.*'] = "required|max:500";
                    $rules['price'] = "required|numeric";

                    $validator = Validator::make($input, $rules);

                    if ($validator->fails()) {
                        Session::flash('errors', $validator->errors()->all());
                    } else {

                        $updateData = [
                            'price' => $input['price'] * 100,
                            'menu_category_id' => $input['menu_category_id']
                        ];

                        DB::table("menu_dishes")->where("id", $id)->update($updateData);

                        foreach ($languages as $language) {
                            $updateData = [
                                'name' => $input['name'][$language->locale],
                                'description' => $input['description'][$language->locale]
                            ];

                            $where = [
                                'menu_dish_id' => $id,
                                'locale' => $language->locale
                            ];

                            DB::table("menu_dish_translations")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminMenuDishesScroll');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'menuDish' => $menuDish,
                'menuDishTransaltionsLite' => $menuDishTransaltionsLite,
                'menuCategories' => $menuCategories
            ];

            return view('admin.menu.edit_dish', $data);
        }
        else{
            return view('errors.404');
        }
    }

    public function delete($id){

        $menuDish = DB::table("menu_dishes")->where("menu_dishes.id", $id)->first();

        if($menuDish) {

            DB::table("menu_dishes")->where(['id' => $id])->delete();
            DB::table("menu_dish_translations")->where(['menu_dish_id' => $id])->delete();

            $messages = [
                [
                    "status" => "success",
                    "text" => "Категория успешно удалена"
                ]
            ];

            Session::flash('messages', $messages);

            return redirect()->route('adminMenuDishesScroll');
        }
        else{
            return view('errors.404');
        }
    }
}
