<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;
use InterventionImage;
use File;

class MomentsController extends AdminController{

    public function headerEdit(){
        $languages = DB::table("languages")->get();

        $moments = DB::table("moments_main")->get();

        if($moments) {

            $momentsTransaltionsLite = [];
            foreach ($moments as $momentsItem) {
                $momentsTransaltionsLite['heading'][$momentsItem->locale] = $momentsItem->heading;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $momentsValidation['heading.*'] = "required|max:30";

                    $validator = Validator::make($input, $momentsValidation);

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

                            DB::table("moments_main")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'momentsTransaltionsLite' => $momentsTransaltionsLite
            ];

            return view('admin.moments.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }

    public function scroll(){

        $momentsImages = DB::table("moments_images")
            ->get();

        $data = [
            'momentsImages' => $momentsImages
        ];

        return view('admin.moments.scroll', $data);
    }

    public function add(){

        if(Request::isMethod('post')){
            $input = Request::except('_token');
            if(isset($input)) {

                $rules['image'] = "required|image";

                $validator = Validator::make($input, $rules);

                if ($validator->fails()) {
                    Session::flash('errors', $validator->errors()->all());
                } else {

                    $file = $input['image'];
                    $input['image'] = $file->getClientOriginalName();

                    $invImage = InterventionImage::make($file);

                    $invImage->save(public_path() . '/assets/site/images/'.$input['image']);

                    $insertData = [
                        'image_name' => $input['image']
                    ];

                    DB::table("moments_images")->insert($insertData);

                    return redirect()->route('adminMomentsImagesScroll');
                }
            }
        }

        $data = [
        ];

        return view('admin.moments.add', $data);
    }

    public function edit($id){

        $momentsImage = DB::table("moments_images")->where("id", $id)->first();

        if(Request::isMethod('post')){
            $input = Request::except('_token');
            if(isset($input)) {

                $rules['image'] = "required|image";

                $validator = Validator::make($input, $rules);

                if ($validator->fails()) {
                    Session::flash('errors', $validator->errors()->all());
                } else {

                    //Deleting images
                    File::delete(public_path() . '/assets/site/images/' . $momentsImage->image_name);

                    //Saving new image
                    $file = $input['image'];
                    $input['image'] = $file->getClientOriginalName();

                    $invImage = InterventionImage::make($file);

                    $invImage->save(public_path() . '/assets/site/images/'.$input['image']);

                    $updateData['image_name'] = $input['image'];

                    DB::table("moments_images")->where(['id'=>$id])->update($updateData);

                    return redirect()->route('adminMomentsImagesScroll');
                }
            }
        }

        $data = [
            'momentsImage' => $momentsImage
        ];

        return view('admin.moments.edit_image', $data);
    }

    public function delete($id){
        DB::table("moments_images")->where(['id'=>$id])->delete();

        return redirect()->route('adminMomentsImagesScroll');
    }
}
