<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
       
        $comment = new Comment;
        $comment->cid   = $request->cid;
        $comment->id    = Auth::user()->id;
        $comment->pid   = $request->pid != '' ? $request->pid:NULL;
        $comment->comments = $request->comments;

        if ($comment->save()){
            return redirect()->back();
        }
        else{
            return redirect('/user/post');
        }
    }
}
