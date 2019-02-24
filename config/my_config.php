<?php

return [

    "company_phone" => "+994 (50) 555-55-55",
    "company_email" => "info@socialhub.az",

    "home_add_to_all_blogs_count" => 3,
    "home_add_to_all_followers_count" => 2,
    "home_add_to_all_balance_count" => 10,

    "accounts_statuses_classes" => [
        "0" => "status__declined",
        "1" => "status__placed",
        "2" => "status__waiting",
        "3" => "status__waiting",
        "4" => "status__inactive",
        "5" => "status__declined"
    ],

    "orders_statuses_classes" => [
        "0" => "status__declined",
        "1" => "status__created",
        "2" => "status__created",
        "3" => "status__created",
        "4" => "status__created",
        "5" => "status__placed",
        "6" => "status__declined",
        "7" => "status__declined"
    ],

    "default_profile_pic" => "profile.png",

    "profile_pic_max_size" => 1024,
    "post_image_max_size" => 2048,

    "vip_count_in_catalog" => 4,

    "vip" => [
        "durability" => 3,
        "price" => 300
    ],

    "random_confirm_code_length" => 20,
    "random_privacy_code_length" => 6,
    "random_new_password_length" => 10,
    "random_socket_key_length" => 15,

    "reCaptcha" => [
        "key" => "6Leo9TAUAAAAACjpPYA01cxEvwLWb9Bb_tIU_N8S",
        "secret_key" => "6Leo9TAUAAAAAFIfsl9B_VvObVop2AnuhFrDEZmY",

        "check_link" => "https://www.google.com/recaptcha/api/siteverify"
    ],

    "balance_transactions_types" => [
        "1" => "main balance",
        "2" => "reserved balance",
    ],

    "cron_updateAccountInfo_per" => 10,
    "enable_pers_for_compare_texts" => 85

];
