<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;

class ContactsController extends AdminController{

    public function edit(){
        $languages = DB::table("languages")->get();

        $contacts = DB::table("contacts")->get();

        if($contacts) {

            $contactsTransaltionsLite = [];
            foreach ($contacts as $contactsItem) {
                $contactsTransaltionsLite['heading'][$contactsItem->locale] = $contactsItem->heading;
                $contactsTransaltionsLite['description'][$contactsItem->locale] = $contactsItem->description;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $contactsValidation['heading.*'] = "required|max:50";
                    $contactsValidation['description.*'] = "required|max:500";

                    $validator = Validator::make($input, $contactsValidation);

                    if ($validator->fails()) {
                        Session::flash('errors', $validator->errors()->all());
                    } else {

                        foreach ($languages as $language) {
                            $updateData = [
                                'heading' => $input['heading'][$language->locale],
                                'description' => $input['description'][$language->locale]
                            ];

                            $where = [
                                'locale' => $language->locale
                            ];

                            DB::table("contacts")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'contactsTransaltionsLite' => $contactsTransaltionsLite
            ];

            return view('admin.contacts.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }
}
