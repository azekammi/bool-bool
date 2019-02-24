<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;

class MetaTagsController extends AdminController{

    public function edit(){
        $languages = DB::table("languages")->get();

        $metaTags = DB::table("meta_tags")->get();

        if($metaTags) {

            $metaTagsTransaltionsLite = [];
            foreach ($metaTags as $metaTag) {
                $metaTagsTransaltionsLite['title'][$metaTag->locale] = $metaTag->title;
                $metaTagsTransaltionsLite['description'][$metaTag->locale] = $metaTag->description;
                $metaTagsTransaltionsLite['keywords'][$metaTag->locale] = $metaTag->keywords;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $metaTagsValidation['title.*'] = "required|max:50";
                    $metaTagsValidation['description.*'] = "required|max:250";
                    $metaTagsValidation['keywords.*'] = "required|max:200";

                    $validator = Validator::make($input, $metaTagsValidation);

                    if ($validator->fails()) {
                        Session::flash('errors', $validator->errors()->all());
                    } else {

                        foreach ($languages as $language) {
                            $updateData = [
                                'title' => $input['title'][$language->locale],
                                'description' => $input['description'][$language->locale],
                                'keywords' => $input['keywords'][$language->locale]
                            ];

                            $where = [
                                'locale' => $language->locale
                            ];

                            DB::table("meta_tags")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'metaTagsTransaltionsLite' => $metaTagsTransaltionsLite
            ];

            return view('admin.meta_tags.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }
}
