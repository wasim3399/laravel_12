<?php

namespace App\DTOs;

class PostDTO
{
    public static function transform($posts)
    {
        return $posts->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'status' => $post->status
            ];
        });
    }

    public static function transformSingle($post)
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'status' => $post->status
        ];
    }
}