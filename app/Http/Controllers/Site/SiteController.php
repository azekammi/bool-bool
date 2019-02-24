<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use Request;
use Lang;
use View;
use DB;
use Session;
use Cookie;

class SiteController extends Controller
{

    protected $contact;

    function __construct(){

        $this->setLocale();
    }

    private function setLocale(){
        $newLang = Request::segment(1);
        if($newLang && in_array($newLang, ["az", "ru", "en"])){
            Cookie::queue("lang", $newLang);
            Lang::setLocale($newLang);
        }
        else {
            $lang = Cookie::get("lang");

            if (in_array($lang, ["az", "ru", "en"])) {
                Lang::setLocale($lang);
            }
        }
    }
}
