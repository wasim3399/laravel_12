<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    public function getAll()
    {
        return Post::all();
    }

    public function store(array $data)
    {
        return Post::create($data);
    }

    public function update($id, array $data)
    {
        $post = Post::find($id);
        if ($post) {
            $post->update($data);
            return $post;
        }
        throw new \Exception("Post not found.");
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return true;
        }
        throw new \Exception("Post not found.");
    }
}