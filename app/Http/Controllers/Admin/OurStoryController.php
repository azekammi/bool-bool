<?php

namespace App\Http\Controllers\Admin;

use Request;
use Validator;
use DB;
use Session;
use InterventionImage;
use File;

class OurStoryController extends AdminController{

    public function headerEdit(){
        $languages = DB::table("languages")->get();

        $header = DB::table("our_story_main")->get();

        if($header) {

            $ourStoryTransaltionsLite = [];
            foreach ($header as $headerItem) {
                $ourStoryTransaltionsLite['heading'][$headerItem->locale] = $headerItem->heading;
                $ourStoryTransaltionsLite['text'][$headerItem->locale] = $headerItem->text;
            }

            if (Request::isMethod('post')) {
                $input = Request::except('_token');
                if (isset($input)) {

                    $headerValidation['heading.*'] = "required|max:30";
                    $headerValidation['text.*'] = "required|max:500";

                    $validator = Validator::make($input, $headerValidation);

                    if ($validator->fails()) {
                        Session::flash('errors', $validator->errors()->all());
                    } else {

                        foreach ($languages as $language) {
                            $updateData = [
                                'heading' => $input['heading'][$language->locale],
                                'text' => $input['text'][$language->locale],
                            ];

                            $where = [
                                'locale' => $language->locale
                            ];

                            DB::table("our_story_main")->where($where)->update($updateData);
                        }

                        return redirect()->route('adminDashboard');
                    }
                }
            }

            $data = [
                'languages' => $languages,
                'ourStoryTransaltionsLite' => $ourStoryTransaltionsLite
            ];

            return view('admin.our_story.edit', $data);
        }
        else{
            return view('errors.404');
        }
    }

    public function scroll(){

        $ourStoryImages = DB::table("our_story_images")
            ->get();

        $data = [
            'ourStoryImages' => $ourStoryImages
        ];

        return view('admin.our_story.scroll', $data);
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

                    $invImage->fit(298, 298)->save(public_path() . '/assets/site/images/'.$input['image']);

                    $insertData = [
                        'image_name' => $input['image']
                    ];

                    DB::table("our_story_images")->insert($insertData);

                    return redirect()->route('adminOurStoryImagesScroll');
                }
            }
        }

        $data = [
        ];

        return view('admin.our_story.add', $data);
    }

    public function edit($id){

        $ourStoryImage = DB::table("our_story_images")->where("id", $id)->first();

        if(Request::isMethod('post')){
            $input = Request::except('_token');
            if(isset($input)) {

                $rules['image'] = "required|image";

                $validator = Validator::make($input, $rules);

                if ($validator->fails()) {
                    Session::flash('errors', $validator->errors()->all());
                } else {

                    //Deleting images
                    File::delete(public_path() . '/assets/site/images/' . $ourStoryImage->image_name);

                    //Saving new image
                    $file = $input['image'];
                    $input['image'] = $file->getClientOriginalName();

                    $invImage = InterventionImage::make($file);

                    $invImage->fit(298, 298)->save(public_path() . '/assets/site/images/'.$input['image']);

                    $updateData['image_name'] = $input['image'];

                    DB::table("our_story_images")->where(['id'=>$id])->update($updateData);

                    return redirect()->route('adminOurStoryImagesScroll');
                }
            }
        }

        $data = [
            'ourStoryImage' => $ourStoryImage
        ];

        return view('admin.our_story.edit_image', $data);
    }

    public function delete($id){
        DB::table("our_story_images")->where(['id'=>$id])->delete();

        return redirect()->route('adminOurStoryImagesScroll');
    }
}
