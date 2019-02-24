<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;

class BookATableController extends AdminController{

    public function edit(){
        $languages = DB::table("languages")->get();

        $bookATable = DB::table("book_a_table")->get();

        if($bookATable) {

            $bookATableTransaltionsLite = [];
            foreach ($bookATable as $bookATableItem) {
                $bookATableTransaltionsLite['heading'][$bookATableItem->locale] = $bookATableItem->heading;
                $bookATableTransaltionsLite['description'][$bookATableItem->locale] = $bookATableItem->description;

            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $bookATableValidation['heading.*'] = "required|max:50";
                    $bookATableValidation['description.*'] = "required|max:500";

                    $validator = Validator::make($input, $bookATableValidation);

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

                            DB::table("book_a_table")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'bookATableTransaltionsLite' => $bookATableTransaltionsLite
            ];

            return view('admin.book_a_table.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }
}
