<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;

class HeaderController extends AdminController{

    public function edit(){
        $languages = DB::table("languages")->get();

        $header = DB::table("header")->get();

        if($header) {

            $headerTransaltionsLite = [];
            foreach ($header as $headerItem) {
                $headerTransaltionsLite['heading'][$headerItem->locale] = $headerItem->heading;
                $headerTransaltionsLite['description'][$headerItem->locale] = $headerItem->description;
                $headerTransaltionsLite['button_text'][$headerItem->locale] = $headerItem->button_text;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $headerValidation['heading.*'] = "required|max:70";
                    $headerValidation['description.*'] = "required|max:500";
                    $headerValidation['button_text.*'] = "required|max:30";

                    $validator = Validator::make($input, $headerValidation);

                    if ($validator->fails()) {
                        Session::flash('errors', $validator->errors()->all());
                    } else {

                        foreach ($languages as $language) {
                            $updateData = [
                                'heading' => $input['heading'][$language->locale],
                                'description' => $input['description'][$language->locale],
                                'button_text' => $input['button_text'][$language->locale]
                            ];

                            $where = [
                                'locale' => $language->locale
                            ];

                            DB::table("header")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'headerTransaltionsLite' => $headerTransaltionsLite
            ];

            return view('admin.header.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }
}
