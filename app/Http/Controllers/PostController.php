<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Request $request) {
        $fields = $request->validate([
            'content' => 'required|max:255'
        ]);

        Post::create($fields);
        return redirect()->route('home');
    }
}
