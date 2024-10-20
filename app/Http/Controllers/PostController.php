<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{   
    public function store(Request $request) {
        $fields = $request->validate([
            'content' => 'required|max:255'
        ]);

        $fields['user_id'] = Auth::id();
        Post::create($fields);
        
        return redirect()->route('index');
    }
}
