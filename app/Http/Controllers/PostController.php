<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function insert()
    {
        return view('/user/insert_post');
    }
    public function store(Request $request)
    {
        $file = $request->file('image');

        $imagename = $file->getClientOriginalName();
        $thumb_img = Image::make($file->getRealPath())->resize(750, 500);
        $thumb_img->save(public_path()."/thum/".$imagename,80);

        
        $file->move(public_path()."/img/",$file->getClientOriginalName());        

        $post = new Post;
        $post->pid   = $request->pid;
        $post->id   = Auth::user()->id;
        $post->image = $file->getClientOriginalName();
        $post->caption = $request->caption;
        $post->like = 0;

        if ($post->save()){
            return redirect('/user/home')->with('success', 'item berhasil ditambahkan');
        }
        else{
            return redirect('/user/home')->with('error', 'item gagal ditambahkan');
        }
    }
    public function post($pid)
    {
        $post = Post::findOrFail($pid);
        $data['comments'] = Comment::where('pid',$pid)->get();
        $data['commentnya'] =  Comment::where('pid',$pid)->count();
        return view('user/post',$data)->with('post', $post);
    }
    public function like(Request $request, $pid)
    {
        $post = Post::findorFail($pid);
        $post->like += 1;
        if ($post->save())
            return redirect()->back();
    }
    
}