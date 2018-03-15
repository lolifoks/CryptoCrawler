<?php
/**
 * Created by PhpStorm.
 * User: azrap
 * Date: 1/24/2018
 * Time: 9:01 PM
 */

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;


class FrontendController extends Controller{
private $data = [];

    public function __construct()
    {
        $meni = new Menu();
        $this->data['menus'] = $meni->getAll();
        $ad = new Post();
        $this->data['ads'] = $ad->getAd();
    }

    public function index(){

        return view('pages.home', $this->data);
    }

    public function blog(){
        $post = new Post();
        $this->data['posts'] = $post->getAll();
        return view('pages.blog', $this->data);
    }
    public function getPost($id){

        $postModel = new Post();
        $post = $postModel->get($id);
        if (!$post) {
            abort(404);
        }

        $commentsModel = new Comment();
        $post->comments = $commentsModel->getPostComments($id);
        $this->data['singlePost'] = $post;

        return view("pages.post", $this->data);
    }



}