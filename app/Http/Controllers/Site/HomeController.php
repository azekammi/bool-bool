<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Lang;
use DB;
use Session;
use Hash;

use App\Libraries\HelpFunctions;
use App\Libraries\Instagram;

class HomeController extends SiteController{

    function __construct(){

        parent::__construct();

    }

    public function index(){

        $metaTags = DB::table("meta_tags")
            ->where("locale", Lang::getLocale())
            ->first();

        $header = DB::table("header")
                    ->where("locale", Lang::getLocale())
                    ->first();

        $ourStoryMain = DB::table("our_story_main")
                    ->where("locale", Lang::getLocale())
                    ->first();

        $ourStoryImages = DB::table("our_story_images")
            ->get();

        $bookATable = DB::table("book_a_table")
            ->where("locale", Lang::getLocale())
            ->first();

        $menuMain = DB::table("menu_main")
            ->where("locale", Lang::getLocale())
            ->first();

        $instagramFeed = DB::table("instagram_feed_main")
            ->where("locale", Lang::getLocale())
            ->first();

        $momentsMain = DB::table("moments_main")
            ->where("locale", Lang::getLocale())
            ->first();

        $momentsImages = DB::table("moments_images")
            ->get();

        $contacts = DB::table("contacts")
            ->where("locale", Lang::getLocale())
            ->first();

        $settings = DB::table("settings")
            ->first();

        $menuCategories = DB::table("menu_categories")
                            ->join("menu_category_translations", "menu_category_translations.menu_category_id", "=", "menu_categories.id")
                            ->where("locale", Lang::getLocale())
                            ->select("id", "name")
                            ->get();

        $menuDishes = DB::table("menu_dishes")
            ->leftJoin("menu_dish_translations", "menu_dish_translations.menu_dish_id", "=", "menu_dishes.id")
            ->where("locale", Lang::getLocale())
            ->select("name", "description", "price", "menu_category_id")
            ->get();

        foreach ($menuCategories as $menuCategory){
            $menuCategory->dishes = [];
            foreach ($menuDishes as $menuDish) {
                if($menuDish->menu_category_id == $menuCategory->id) $menuCategory->dishes[] = $menuDish;
            }
        }

        $instagram = new Instagram();
        $instagram->prepareData($settings->instagram_page_name);

        $instagramImages = isset($instagram->userData->edge_owner_to_timeline_media->edges) ? $instagram->userData->edge_owner_to_timeline_media->edges : [];
        array_splice($instagramImages, $settings->instagram_feed_count_of_lasts, count($instagramImages) - $settings->instagram_feed_count_of_lasts + 1);

        $data = [
            "metaTags" => $metaTags,
            "header" => $header,
            "ourStoryMain" => $ourStoryMain,
            "ourStoryImages" => $ourStoryImages,
            "bookATable" => $bookATable,
            "menuMain" => $menuMain,
            "menuCategories" => $menuCategories,
            "instagramFeed" => $instagramFeed,
            "instagramImages" => $instagramImages,
            "momentsMain" => $momentsMain,
            "momentsImages" => $momentsImages,
            "contacts" => $contacts,
            "settings" => $settings
        ];

        return view('site.home.index', $data);
    }
}
