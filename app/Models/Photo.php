<?php
/**
 * Created by PhpStorm.
 * User: azrap
 * Date: 2/16/2018
 * Time: 2:12 PM
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Photo
{
    public $id;
    public $alt;
    public $link;
    public $banner;
    public $url;
    public $user_id;

    public function save(){
        $id = DB::table('photo')
            ->insertGetId([
                'alt' => $this->alt,
                'link' => $this->link
            ]);
        return $id;
    }

    public function saveBanner(){
        $id = DB::table('ads')
            ->insertGetId([
                'banner' => $this->banner,
                'url' => $this->url,
                'user_id' => 1,
                'approved' => 1,
            ]);
        return $id;
    }
}