<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getAllPosts()
    {
        return Post::all();
    }




    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    public function createPost($data)
    {
        return Post::create($data);
    }

    public function updatePost($id, array $data)
    {

        // return $post->update($data);
        $post = Post::findOrFail($id);
        if ($post) {
            $post->update($data);
        }
        return $post;
    }

    public function deletePost($id)
    {
        // return $post->delete();
        $post = Post::findOrFail($id);
        if ($post) {
            $post->delete();
        }
        return $post;
    }
}