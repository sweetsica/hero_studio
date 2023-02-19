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
        $searchKey = $request->query('search');
        if ($searchKey) {
            $posts = $posts->where('subject', 'like', '%' . $searchKey . '%');
        }

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

    public function detail(Request $request, $id)
    {
        $categories = Category::all();
        $post = Post::find($id);

        $postSameCategory = Post::query()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $id)
            ->take(5)->orderBy('created_at', 'desc')->get();


        $postHashTagIds = $post->hashTags->pluck('id');

        $postHaveSameTags = Post::query()
            ->whereHas('hashTags', function ($query)  use ($postHashTagIds){
                $query->whereIn('hash_tag_id', $postHashTagIds);
            })
            ->where('id', '!=', $id)
            ->take(5)->orderBy('created_at', 'desc')
            ->get();

        return view('admin-template.page.post.detail', compact('categories', 'post', 'postSameCategory', 'postHaveSameTags'));
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        $post->hash_tags = implode(' ', $post->hashTags->pluck('name')->toArray());

        if (Auth::id() !== $post->member_id) return redirect()->back();
        $categories = Category::all();
        $postSameCategory = Post::query()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $id)
            ->take(5)->orderBy('created_at', 'desc')->get();

        $postHashTagIds = $post->hashTags->pluck('id');
        $postHaveSameTags = Post::query()
            ->whereHas('hashTags', function ($query)  use ($postHashTagIds){
                $query->whereIn('hash_tag_id', $postHashTagIds);
            })
            ->where('id', '!=', $id)
            ->take(5)->orderBy('created_at', 'desc')
            ->get();

        return view('admin-template.page.post.edit', compact('categories', 'post', 'postSameCategory', 'postHaveSameTags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (Auth::id() !== $post->member_id) return redirect()->route('post');

        $validKey = ['subject', 'content', 'category_id', 'link_driver', 'link_video'];
        $postData = $request->only($validKey);
        $hashTags = explode(' ', $request->hash_tag);
        $listTags = HashTag::whereIn('name', $hashTags)->get();
        $listExistTag = $listTags->pluck('name');

        $unknownTag = collect($hashTags)->filter(function ($item) use ($listExistTag) {
            return !in_array($item, $listExistTag->toArray());
        });

        if ($unknownTag->count()) {
            $hashTagRecord = $unknownTag->map(function ($item) {
                return [
                    'name' => trim($item),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            })->toArray();
            HashTag::insert($hashTagRecord);

            $listTags = HashTag::whereIn('name', $hashTags)->get();
        }

        $thumbnail = $request->file('thumbnail');
        $category = Category::find($request->category_id);

        if (isset($request->thumbnail)) {
            $linkThumbnail = Storage::disk('public')->put("$category->name", $thumbnail);
            $postData['thumbnail'] = $linkThumbnail;
        }

        $post->update($postData);
        $post->hashTags()->sync($listTags->pluck('id'));

        return redirect()->route('post');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin-template.page.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validKey = ['subject', 'content', 'category_id', 'link_driver', 'link_video'];
        $postData = $request->only($validKey);
        $hashTags = explode(' ', $request->hash_tag);
        $listTags = HashTag::whereIn('name', $hashTags)->get();
        $listExistTag = $listTags->pluck('name');

        $unknownTag = collect($hashTags)->filter(function ($item) use ($listExistTag) {
            return !in_array($item, $listExistTag->toArray());
        });

        if ($unknownTag->count()) {
            $hashTagRecord = $unknownTag->map(function ($item) {
                return [
                    'name' => trim($item),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            })->toArray();
            HashTag::insert($hashTagRecord);

            $listTags = HashTag::whereIn('name', $hashTags)->get();
        }

        $thumbnail = $request->file('thumbnail');
        $category = Category::find($request->category_id);

        if (isset($request->thumbnail)) {
            $linkThumbnail = Storage::disk('public')->put("$category->name", $thumbnail);
            $postData['thumbnail'] = $linkThumbnail;
        }
        $postData['member_id'] = Auth::id();

        $post = Post::create($postData);
        $post->hashTags()->sync($listTags->pluck('id'));

        return redirect()->route('post');
    }
}
