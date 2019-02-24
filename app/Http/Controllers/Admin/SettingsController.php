<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;

class SettingsController extends AdminController{

    public function edit(){
        $languages = DB::table("languages")->get();

        $settings = DB::table("settings")->first();

        if($settings) {

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $settingsValidation['phone'] = "required|max:30";
                    $settingsValidation['address'] = "required|max:100";
                    $settingsValidation['facebook_link'] = "required|max:150";
                    $settingsValidation['instagram_page_name'] = "required|max:150";
                    $settingsValidation['whatsapp_link'] = "required|max:150";

                    $settingsValidation['map_latitude'] = "required";
                    $settingsValidation['map_longitude'] = "required";
                    $settingsValidation['map_zoom'] = "required|integer|max:99999";
                    $settingsValidation['instagram_feed_count_of_lasts'] = "required|integer|max:12";

                    $validator = Validator::make($input, $settingsValidation);

                    if ($validator->fails()) {
                        Session::flash('errors', $validator->errors()->all());
                    } else {

                        $updateData = [
                            'phone' => $input['phone'],
                            'address' => $input['address'],
                            'facebook_link' => $input['facebook_link'],
                            'instagram_page_name' => $input['instagram_page_name'],
                            'whatsapp_link' => $input['whatsapp_link'],
                            'map_latitude' => $input['map_latitude'],
                            'map_longitude' => $input['map_longitude'],
                            'map_zoom' => $input['map_zoom'],
                            'instagram_feed_count_of_lasts' => $input['instagram_feed_count_of_lasts'],
                        ];

                        DB::table("settings")->update($updateData);

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'settings' => $settings
            ];

            return view('admin.settings.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }
}
