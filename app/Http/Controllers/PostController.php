<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $incomingData = $request->validate([
            'title' =>['required','min:3','max:100']
            ,'body' => ['required','min:3','max:1000']
        ]);
        //remove html tags from the title and body,malicious code
        //and prevent XSS attacks
        $incomingData['title'] = strip_tags($incomingData['title']);
        $incomingData['body'] = strip_tags($incomingData['body']);
        $incomingData['user_id'] = auth()->id();
        Post::create($incomingData);
         return redirect('/');
    }
}
