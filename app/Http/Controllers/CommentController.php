<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Comment;

class CommentController extends Controller
{


            
    public function comment()
    {
        // $comments = Comment::latest()->get();
        $comments = Comment::all();
        
        return view('buy/comment', ['comments' => $comments]);
    }

    public function postComment(Request $request)
    {   
        // dd('test');
        $validator = $request->validate([
            'comment' => ['required', 'string', 'max:280'],
        ]);
        Comment::create([
            'user_id' => Auth::user()->id,
            'menu_id' => $request->menu_id,
            'comment' => $request->comment,
        ]);
        return back();
    }

    public function destroyComment($id)
    {
            // dd($id);
            $comment = Comment::find($id);
            // dd($tweet);
            $comment->delete();
    
            return redirect()->route('comment');
    }


        // $comment = new Comment;
        // $comment ->user_id = Auth::id();
        // $comment ->comment = $request -> comment;
        // $comment -> save();



}
