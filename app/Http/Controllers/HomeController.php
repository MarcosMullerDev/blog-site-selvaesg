<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Str;
use App\Models\TeamMember;
use App\Models\About;
use App\Models\Banner;
use App\Models\Post;
use App\Models\Attachment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $members = TeamMember::where('active', true)
        ->get();

        $about = About::where('active', true)
            ->first();

        $posts = Post::latest()
            ->take(3)
            ->get();

        $banners = Banner::where('active', true)

            ->where(function ($query) {

                $query->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', now());

            })

            ->where(function ($query) {

                $query->whereNull('ends_at')
                    ->orWhere('ends_at', '>=', now());

            })

            ->get();

        return view('home', compact(
            'posts',
            'banners',
            'about',
            'members'
        ));
    }

    public function create()
    {
        return view('create-post');
    }

    public function store(Request $request)
    {
        $coverImage = null;

        if ($request->hasFile('cover_image')) {

            $coverImage = $request->file('cover_image')
                ->store('covers', 'public');
        }

        $post = Post::create([
            'title' => $request->title,

            'slug' => Str::slug($request->title . '-' . time()),

            'subtitle' => $request->subtitle,

            'content' => $request->content,

            'cover_image' => $coverImage,

            'author' => $request->author,

            'category' => $request->category,

            'tags' => $request->tags,

            'status' => 'published',

            'featured' => $request->featured ? true : false
        ]);

        if ($request->hasFile('attachments')) {

            foreach ($request->file('attachments') as $file) {

                $path = $file->store('attachments', 'public');

                Attachment::create([
                    'post_id' => $post->id,
                    'file' => $path
                ]);
            }
        }

        return redirect('/');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('/');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->firstOrFail();

        $comments = $post->comments()
            ->where('approved', true)
            ->latest()
            ->get();

        $relatedPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('post-details', compact(
            'post',
            'relatedPosts',
            'comments'
        ));
    }

    public function like($id)
    {
        $post = Post::findOrFail($id);

        $post->increment('likes');

        return response()->json([
            'likes' => $post->likes
        ]);
    }

    public function comment(Request $request, $id)
    {
        $post = Post::findOrFail($id);


        $post->comments()->create([

            'name' => $request->name,

            'comment' => $request->comment,

            'approved' => false

        ]);

        return redirect()
            ->back()
            ->with('message', 'Comentário enviado para aprovação.');
    }

    public function comments()
    {
        $comments = Comment::latest()->get();

        return view('comments', compact('comments'));
    }

    public function approveComment($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->approved = true;

        $comment->save();

        return back();
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return back();
    }

    public function blog(Request $request)
    {
        $query = Post::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('subtitle', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%')
                    ->orWhere('category', 'like', '%' . $request->search . '%')
                    ->orWhere('tags', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Post::whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('blog', compact(
            'posts',
            'categories'
        ));
    }
}