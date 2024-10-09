<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(6);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $user = Auth::user();

        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        $image = $request->file('image');
        $imagePath = time() . '.' . $image->getClientOriginalExtension();
        $uploadedImage = $image->storeAs('images', $imagePath, 'public');
        $post->image()->create([
            'url' => $uploadedImage,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        if($user->id != $post->user_id){
            return redirect()->route('posts.index');
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $user = Auth::user();
        $post = Post::with('image')->findOrFail($id);

        if ($user->id != $post->user_id) {
            return redirect()->route('posts.index');
        }

        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();
        if ($request->hasFile('image')) {
            if ($post->image && $post->image->url) {
                @unlink(storage_path('app/public/' . $post->image->url));
            }
            $image = $request->file('image');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $uploadedImage = $image->storeAs('images', $imagePath, 'public');
            $post->image()->update([
                'url' => $uploadedImage,
            ]);
        }
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        if ($user->id != $post->user_id) {
            return redirect()->route('posts.index');
        }
        $this->deleteImage($post->image);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function uploadImage($image)
    {
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $uploadImage = $image->storeAs('images', $fileName, 'public');
        return $uploadImage;
    }
    public function deleteImage($image)
    {
        @unlink(storage_path('app/public/' . $image));
    }
}
