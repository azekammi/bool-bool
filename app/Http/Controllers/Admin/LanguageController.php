<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Image;
use File;

class LanguageController extends AdminController{

    public function scroll($page = 1){

        $languagesAll = DB::table("languages")->get();

        $languages = DB::table("languages")
        ->select("id", "locale", "image");

        //ORDER START
        $allowedOrderBy =           ["id", "locale", "image"];
        $allowedOriginalOrderBy =   ["id", "locale", "image"];

        $allowedOrderType = ["asc", "desc"];

        $originalOrderByIndex = array_search(Request::input("order_by"), $allowedOrderBy);
        if($originalOrderByIndex !== false){

            $orderBy = $allowedOrderBy[$originalOrderByIndex];
            $orderType = $allowedOrderType[array_search(Request::input("order_type"), $allowedOrderType)];

            $languages = $languages->orderBy($allowedOriginalOrderBy[$originalOrderByIndex], $allowedOrderType[array_search(Request::input("order_type"), $allowedOrderType)]);
        }
        else{
            $orderBy = null;
            $orderType = null;
        }
        //ORDER END

        //WHERE START
        $input = Request::all();

        $rules['locale'] = "size:2";

        $validator = Validator::make($input, $rules);

        if (!$validator->fails()) {

            if(!empty($input['locale'])) $languages = $languages->where("locale", "LIKE", "%".$input['locale']."%");
        }
        //WHERE END

        $languages = $languages->paginate(10, ['*'], null, $page);

        $filterQuery = [];
        foreach ($input as $key=>$value){
            if(!in_array($key, ["order_by", "order_type"])) {
                $filterQuery[] = $key . "=" . $value;
            }
        }
        $filterQuery = implode("&", $filterQuery);

        $data = [
            'languages' => $languages,
            'languagesAll' => $languagesAll,
            'filterQuery' => $filterQuery,
            'orderBy' => $orderBy,
            'orderType' => $orderType,
        ];

        return view('admin.languages.scroll', $data);
    }

    public function add(){

        $languages = DB::table("languages")->get();

        if(Request::isMethod('post')){
            $input = Request::except('_token');
            if(isset($input)) {

                $rules['locale'] = "required|size:2";
                $rules['image'] = "required|image";

                $validator = Validator::make($input, $rules);

                if ($validator->fails()) {
                    return redirect()->route('adminLanguageAdd')
                        ->withInput()
                        ->withErrors($validator);
                } else {

                    $file = $input['image'];
                    $input['image'] = $file->getClientOriginalName();

                    $invImage = Image::make($file);

                    $invImage->fit(16, 11)->save(public_path() . '/assets/site/img/flags/' . $input['image']);

                    $insertData = [
                        'locale' => $input['locale'],
                        'image' => $input['image']
                    ];

                    DB::table("languages")->insert($insertData);

                    return redirect()->route('adminLanguagesScroll');
                }
            }
        }

        $data = [
            'languages' => $languages
        ];

        return view('admin.languages.add', $data);
    }

    public function edit($id){

        $language = DB::table("languages")
                    ->where("id", $id)
                    ->first();

        if($language) {

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $rules['locale'] = "required|size:2";
                    $rules['image'] = "image";

                    $validator = Validator::make($input, $rules);

                    if ($validator->fails()) {
                        return redirect()->route('adminLanguageEdit', ['id' => $id])
                            ->withInput()
                            ->withErrors($validator);
                    } else {

                        $updateData = [
                            'locale' => $input['locale']
                        ];

                        if($input['image']){
                            $file = $input['image'];
                            $input['image'] = $file->getClientOriginalName();

                            $invImage = Image::make($file);

                            File::delete(public_path() . '/assets/site/img/flags/' . $language->image);

                            $invImage->fit(16, 11)->save(public_path() . '/assets/site/img/flags/' . $input['image']);

                            $updateData = [
                                'image' => $input['image']
                            ];
                        }

                        DB::table("languages")->where("id", $id)->update($updateData);

                        return redirect()->route('adminLanguagesScroll');
                    }
                }
            }

            $data = [
                'language' => $language,
            ];

            return view('admin.languages.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }

    public function delete($id){

        DB::table("languages")->where(['id' => $id])->delete();

        $messages = [
            [
                "status" => "success",
                "text" => "Язык успешно удален"
            ]
        ];

            return redirect()->route('adminLanguagesScroll')->with("messages", $messages);

    }
}
