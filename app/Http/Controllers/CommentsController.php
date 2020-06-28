<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'comment_value' => 'required',
        ]);


        $comment = new Comment();
        $comment->comment_value = $request->input('comment_value');
        $comment->announcement_id = $request->input('announcements_id');
        $comment->user_id = $request->input('user_id');
        $comment->save();

        $announcement_id = $request->input('announcements_id');


        return redirect()->back();
    }
}
