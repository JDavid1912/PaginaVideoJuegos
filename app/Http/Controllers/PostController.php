<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Post;
use Illuminate\Support\Str;



class PostController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('views.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:posts,slug',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',

        ]);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        auth()->user()->posts()->create($data);

        return redirect()->route('posts.index2')->with('success', 'Post created successfully.');
    }   


    public function show(Post $post)
    {
      $this->authorize('view', $post);
      return view('posts.show', compact('post'));
    }

 
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {   
        $this->authorize('update', $post);
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:posts,slug,' . $post->id,
            'content' => 'required|string',
            'status' => 'required|in:draft,published',

        ]);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        $post->update($data);
        return redirect()->route('posts.index')->with('OK', 'Post updated successfully.');

    }

  
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('OK', 'Post deleted successfully.');
    }
}
