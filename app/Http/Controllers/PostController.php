<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {

        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //references getAllPosts method from post service class
        $posts = $this->postService->getAllPosts();

        $name = "john";
        dd($posts->toArray());
        return response()->json($posts);
        // return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(["message" => "Create a post form "]);
        // return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = $this->postService->createPost($request->all());
        return response()->json($post);
        // return redirect()->route('posts.index')->with('success', 'Post created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $post = $this->postService->getPostById($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Post not available'], 404);
        }

        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Show form for editing post";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $post = $this->postService->updatePost($id, $request->all());
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Post not Found to Update'], 404);
        }

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */

     public function twoposts($parameter1, $parameter2){
        // "Parameter 1 is : ". $parameter1 . "";
     }
    public function destroy(string $id)
    {

        try {
            $post = $this->postService->deletePost($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Post not Found'], 404);
        }

        return response()->json($post);
    }
}