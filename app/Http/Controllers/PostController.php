<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Post;
use Illuminate\Http\Request;
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
    {   return view('posts.create');  }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:150',
            'slug'    => 'nullable|string|max:150|unique:posts,slug',
            'content' => 'required|string',
            'status'  => 'required|in:draft,published',
        ]);
        if (empty($data['slug']))
            $data['slug'] = Str::slug($data['title']); // auto-slug
        auth()->user()->posts()->create($data);
        return redirect()->route('posts.index')->with('ok','Creada.');
    }

    public function show(Post $post)  // Route Model Binding
    {   $this->authorize('view', $post);  return view('posts.show', compact('post'));  }

    public function edit(Post $post)
    {   $this->authorize('update', $post);  return view('posts.edit', compact('post'));  }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $data = $request->validate([
            'slug' => 'nullable|string|max:150|unique:posts,slug,' . $post->id,
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'status'  => 'required|in:draft,published',
        ]);
        if (empty($data['slug'])) $data['slug'] = Str::slug($data['title']);
        $post->update($data);
        return redirect()->route('posts.index')->with('ok','Actualizada.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);  $post->delete();
        return redirect()->route('posts.index')->with('ok','Eliminada.');
    }
}