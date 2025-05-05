<?php

namespace App\Services;
use App\Repositories\PostRepository;
use App\DTOs\PostDTO;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        try {
            $posts = $this->postRepository->getAll();
            return PostDTO::transform($posts);
        } catch (\Exception $e) {
            throw new \Exception("Error fetching posts: " . $e->getMessage());
        }
    }

    public function store(array $data)
    {
        try {
            $post = $this->postRepository->store($data);
            return PostDTO::transformSingle($post);
        } catch (\Exception $e) {
            throw new \Exception("Error storing post: " . $e->getMessage());
        }
    }

    public function update($id, array $data)
    {
        try {
            $post = $this->postRepository->update($id, $data);
            return PostDTO::transformSingle($post);
        } catch (\Exception $e) {
            throw new \Exception("Error updating post: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->postRepository->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("Error deleting post: " . $e->getMessage());
        }
    }
}