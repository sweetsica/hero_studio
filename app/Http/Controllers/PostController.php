<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin-template.page.post.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $thumbnail = $request->file('thumbnail');
        $category = Category::find($request->category_id);

        $linkThumbnail = Storage::put("$category->name", $thumbnail);
        $validKey = ['subject', 'content', 'category_id', 'link_driver', 'link_video'];
        $postData = $request->only($validKey);
        $postData['thumbnail'] = $linkThumbnail;
        $postData['member_id'] = Auth::id();

        Post::create($postData);

        return redirect()->back();
    }
}
