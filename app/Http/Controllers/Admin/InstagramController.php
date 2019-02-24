<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;

class InstagramController extends AdminController{

    public function headerEdit(){
        $languages = DB::table("languages")->get();

        $instagramHeader = DB::table("instagram_feed_main")->get();

        if($instagramHeader) {

            $instagramHeaderTransaltionsLite = [];
            foreach ($instagramHeader as $instagramHeaderItem) {
                $instagramHeaderTransaltionsLite['heading'][$instagramHeaderItem->locale] = $instagramHeaderItem->heading;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $instagramHeaderValidation['heading.*'] = "required|max:50";

                    $validator = Validator::make($input, $instagramHeaderValidation);

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

                            DB::table("instagram_feed_main")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'instagramHeaderTransaltionsLite' => $instagramHeaderTransaltionsLite
            ];

            return view('admin.instagram_header.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }
}
