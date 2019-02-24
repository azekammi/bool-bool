<?php

namespace App\Libraries;

use Config;

use App\Libraries\Curl;

class Instagram{

    public $mainData;

    public $userData;

    public $neededData;

    function __construct(){

    }

    public function prepareData($username){
        $this->mainData = null;
        $this->userData = null;
        $this->neededData = null;

        $curl = new Curl();

        $link = "https://www.instagram.com/$username/";
        $out = $curl->execute($link);

        $matches = [];
        preg_match('~window._sharedData = (.*?);</script>~iu', $out, $matches);
        //preg_match('~window._sharedData = [{](.*?);[}]</script>~iu', $out, $matches);

        if(count($matches)>1) {
            $this->mainData = json_decode($matches[1]);

            if (!isset($this->mainData)) {
                //Instagram changes vars
            } elseif (!isset($this->mainData->entry_data->ProfilePage)) {
                //user is absent
            } else {
                $this->userData = $this->mainData->entry_data->ProfilePage[0]->graphql->user;
                $this->neededData = [
                    'account_id' => $this->userData->id,
                    'username' => $this->userData->username,
                    'biography' => $this->userData->biography,
                    'followers' => $this->userData->edge_followed_by->count,
                    'follows' => $this->userData->edge_follow->count,
                    'publishes_count' => $this->userData->edge_owner_to_timeline_media->count,
                    'full_name' => $this->userData->full_name,
                    'profile_pic_link' => $this->userData->profile_pic_url_hd,
                    'is_private' => $this->userData->is_private,
                ];
            }
        }
        else{
            //Instagram changes vars
        }
    }

    public function getLastPublishes(){
        if(isset($this->userData) && !$this->userData->is_private){
            $edges = $this->userData->edge_owner_to_timeline_media->edges;

            $likesCountSum = 0;
            foreach ($edges as $edge){
                $likesCountSum += $edge->node->edge_liked_by->count;
            }

            if(count($edges) > 0){
                $middleValue = $likesCountSum / count($edges);

                $efficCoeff = ($this->userData->edge_followed_by->count ? number_format($middleValue * 100 / $this->userData->edge_followed_by->count, 2, '.', '') : 0);

                $efficCoeff *= 10;
            }
            else{
                $efficCoeff = 0;
            }
        }
        else{
            $efficCoeff = -1;
        }

        return $efficCoeff;
    }

    public function comparePublishItems($compareText){
        if(isset($this->userData)) {
            if (!$this->userData->is_private) {
                $edges = $this->userData->edge_owner_to_timeline_media->edges;

                foreach ($edges as $edge) {
                    $caption = $edge->node->edge_media_to_caption->edges[0]->node->text;

                    similar_text($compareText, $caption, $perc);

                    if ($perc >= Config::get("my_config.enable_pers_for_compare_texts")) {
                        //find close pers
                        return 1;
                    }
                }
                //not find close pers
                return 0;
            } else {
                //report about profile private
                return -2;
            }
        }

        //problem with instagram vars
        return -1;
    }

    public function getAccountInfo(){
        return $this->neededData;
    }
}