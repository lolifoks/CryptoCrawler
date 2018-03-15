<?php
/**
 * Created by PhpStorm.
 * User: azrap
 * Date: 2/16/2018
 * Time: 3:41 PM
 */

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    private $data =[];

    public function __construct(){
        $menu = new Menu();
        $this->data['menus'] = $menu->getAll();

        $ad = new Post();
        $this->data['ads'] = $ad->getAd();
        $this->middleware('auth', ['only'=>'createAd']);


    }

    public function createAd(){

        return view('pages.advertise', $this->data);
    }



    public  function insertAd(Request $request){

        $rules = [
            'banner' => 'required|mimes:jpg,jpeg,png,gif|max:3000', 'url' => 'required'];
        $custom_messages = [
            'required' => 'Url cannot be empty!',
            'max' => 'Max size of banner :max KB.',
            'mimes' => 'Banned format must be: :values.'
        ];
        $request->validate($rules, $custom_messages);

        $banner = $request->file('banner');
        $extension = $banner->getClientOriginalExtension();
        $tmp_path = $banner->getPathName();

        $folder = 'img/banners/';
        $file_name = time().".".$extension;
        $new_path = public_path($folder).$file_name;

        try {


            File::move($tmp_path, $new_path);



            $photo = new Photo();
            $photo->url = trim($request->get('url'));
            $photo->banner = 'img/banners/'.$file_name;
            $banner_id = 0;
            $banner_id = $photo->saveBanner();



            return redirect('/advertise')->with('success','Banner succesfully added!');
        }

        catch(\Symfony\Component\HttpFoundation\File\Exception\FileException $ex) { // greske sa fajlom
            \Log::error('Problem with file!!! '.$ex->getMessage());
            return redirect()->back()->with('error','Error!');
        }
        catch(\ErrorException $ex) {
            \Log::error('Problem with file!!! '.$ex->getMessage());
            return redirect()->back()->with('error','Error with file.');
        }
    }


}