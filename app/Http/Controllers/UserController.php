<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Comment;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::orderBy('created_at','desc')->get();
        $data['commentnya'] =  Comment::groupBy('pid')->count();
        $data['users'] = User::where('id','!=',Auth::user()->id);
        return view('/user/dashboard_user',$data);
    }
}
