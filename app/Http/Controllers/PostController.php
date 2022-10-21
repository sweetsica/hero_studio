<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HashTag;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query();

        $categories = Category::all();
        $hashTags = HashTag::withCount('posts')
        ->orderBy('posts_count', 'desc')
        ->take(5)
        ->get();

        $posts = Post::query()->with('hashTags');
        if (isset($query['category-id'])) {
            $posts = $posts->where('category_id', '=', $query['category-id']);
        }
        if (isset($query['hash-tag-id'])) {
            $tagId = $query['hash-tag-id'];
            $posts = $posts->whereHas('hashTags', function ($q) use ($tagId) {
                $q->where('hash_tag_id', '=', $tagId);
            });
        }

        $posts = $posts->orderByDesc('updated_at')->paginate(5);

        return view('admin-template.page.post.index', compact('categories', 'hashTags', 'posts'));
    }

    public function detail(Request $request, $id) {
        $categories = Category::all();
        $post = Post::find($id);

        return view('admin-template.page.post.detail', compact('categories', 'post'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin-template.page.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $hashTags = explode(' ', $request->hash_tag);
        $listTags = HashTag::whereIn('name', $hashTags)->get();
        $listExistTag = $listTags->pluck('name');

        $unknownTag = collect($hashTags)->filter(function ($item) use ($listExistTag) {
            return !in_array($item, $listExistTag->toArray());
        });

        if ($unknownTag->count()) {
            $hashTagRecord = $unknownTag->map(function ($item) {
                return [
                    'name' => $item->trim(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            })->toArray();
            HashTag::insert($hashTagRecord);

            $listTags = HashTag::whereIn('name', $hashTags)->get();
        }

        $thumbnail = $request->file('thumbnail');
        $category = Category::find($request->category_id);

        $linkThumbnail = Storage::disk('public')->put("$category->name", $thumbnail);
        $validKey = ['subject', 'content', 'category_id', 'link_driver', 'link_video'];
        $postData = $request->only($validKey);
        $postData['thumbnail'] = $linkThumbnail;
        $postData['member_id'] = Auth::id();

        $post = Post::create($postData);
        $post->hashTags()->sync($listTags->pluck('id'));

        return redirect()->route('post');
    }
}
