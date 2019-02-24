<?php

namespace App\Libraries;

use App\Libraries\Curl;
use Config;

class reCaptcha{

    public function botCheck($reCaptchaResponse){
        $curl = new Curl();
        $leads = [
            "secret" => Config::get("my_config.reCaptcha.secret_key"),
            "response" => $reCaptchaResponse,
            "remoteip" => $_SERVER["REMOTE_ADDR"]
        ];

        $botCheck = $curl->execute(Config::get("my_config.reCaptcha.check_link"), "POST", $leads);
        $botCheck = json_decode($botCheck);

        if($botCheck->success === true) $response = true;
        else $response = false;

        return $response;
    }
}