<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $fields = $request->validate([
            'content' => 'required|max:255'
        ]);

        $fields['user_id'] = Auth::id();
        $fields['post_id'] = $postId;
        Comment::create($fields);
        
        return redirect()->back();
    }
}
