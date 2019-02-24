<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use Lang;
use Hash;
use DB;
use Session;
use Mail;
use Config;

class AuthController extends AdminController {

    function __construct(){

    }

    public function login(){

        if(Request::isMethod('post')){
            $input = Request::except('_token');
            if(isset($input)) {
                $rules['username'] = "required";
                $rules['password'] = "required";

                $validator = Validator::make($input, $rules);

                //$botCheck = (isset($input["g-recaptcha-response"]) ? (new reCaptcha())->botCheck($input["g-recaptcha-response"]) : false);

                if (!$validator->fails()) {

                    $user = DB::table("users")
                        ->where(["username" => $input["username"]])
                        ->first();

                    if($user){
                        if(Hash::check($input["password"], $user->password)){

                            Session::put("admin", [
                                "username" => $input["username"]
                            ]);

                            return redirect()->route('adminDashboard');
                        }

                        return redirect()->route('adminLogin')
                            ->withInput()
                            ->with("message", ["status" => "red", "text" => Lang::get("site.password_error")])
                            ->withErrors($validator);
                    }
                }

                return redirect()->route('adminLogin')
                    ->withInput()
                    ->with("message", ["status" => "red", "text" => Lang::get("site.password_error")])
                    ->withErrors($validator);

            }
        }

        $data = [
            'mainDivClasses' => "main login-page"
        ];

        return view('auth.login', $data);
    }

    public function logout(){
        if(Session::has("admin")){
            Session::forget("admin");
        }

        return redirect()->route('adminLogin');
    }

}
