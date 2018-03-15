<?php
/**
 * Created by PhpStorm.
 * User: azrap
 * Date: 2/15/2018
 * Time: 11:15 PM
 */

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Post
{
    public $id;
    public $title;
    public $content;
    public $user_id;
    public $photo_id;
    private $table = 'post';

    public function getAll()
    {
        $result = DB::table('post')
            ->select('*', 'post.id as postId')
            ->join('photo as ph', 'post.photo_id', '=', 'ph.id')
            ->join('users as u', 'post.user_id', '=', 'u.id')
            ->orderBy('post.created_at', 'desc')
            ->get();
        return $result;
    }

    public function get($id){
        $result =
            DB::table('post')
                ->select('*',
                    'post.id AS postId',
                    'users.name as postUser',
                    'u.name as commentUser')
                ->join('photo as ph', 'post.photo_id', '=', 'ph.id')
                ->join('users', 'post.user_id', '=', 'users.id')
                ->leftJoin('comment','post.id','=','comment.post_id')
                ->leftJoin('users AS u','u.id','=','comment.user_id')
                ->where('post.id','=',$id)
                ->get()->first();
        return $result;
    }

    public function getAd(){

        $result = DB::table('ads')->where('approved', '1')->get();
        return $result;

        }

    public function save()
    {
        return \DB::table($this->table)
            ->insertGetId([
                'title' => $this->title,
                'content' => $this->content,
                'user_id' => $this->user_id,
                'photo_id' => $this->photo_id,

            ]);
    }

}