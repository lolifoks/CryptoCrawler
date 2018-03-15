<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Menu;
use App\Models\User;

class AuthController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $meni = new Menu();
        $this->data['menus'] = $meni->getAll();
        $ad = new Post();
        $this->data['ads'] = $ad->getAd();
    }

    public function registerShow()
    {
        return view('auth.register', $this->data);
    }
    public function loginShow()
    {
        return view('auth.login', $this->data);
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $validator->validate();

        $userModel = new User();

        foreach($userModel as $key=>$value)
        {
            $userModel->$key = $request->get($key);
        }

        try {
            $userModel->save();
            return redirect()->back()->with("success", "Successful registration");
        } catch(\Illuminate\Database\QueryException $e)
        {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "Server error");
        }
    }
    public function login(Request $request)
    {
        $userModel = new User();
        $userModel->username = $request->get("username");
        $userModel->password = $request->get("password");
        $user = $userModel->login();
        if ($user) {
            $request->session()->put('user', $user);
            return $user->role == "admin" ? redirect(route("users.index")) : redirect(route("home"));
        } else {
            return redirect()->back()->with("warning", "Wrong username or password.");
        }
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }


    public function admin (){

        return view('admin.pages.users');
    }
}
