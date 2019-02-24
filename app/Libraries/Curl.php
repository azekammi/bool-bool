<?php

namespace App\Libraries;

class Curl{

    public function execute($link, $method='GET', $leads=[]){

        /* Нам необходимо инициировать запрос к серверу. Воспользуемся библиотекой cURL (поставляется в составе PHP). Подробнее о
        работе с этой
        библиотекой Вы можете прочитать в мануале. */
        $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36');
        curl_setopt($curl,CURLOPT_URL, $link);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $method);
        if($method == "POST"){
            curl_setopt($curl, CURLOPT_POST, true);
        }
        else{
            curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-type: text/plain'));
        }
        if(!empty($leads)) {
            curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($leads));
        }

        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
        $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную

        return $out;
    }
}