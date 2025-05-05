<?php

namespace App\Http\Controllers;
use App\Services\PostService;
use App\Helpers\ResponseHandler;
use App\Enums\HttpStatusCode;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

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
        try {
            $posts = $this->postService->getAll();
            return ResponseHandler::success('Data fetched successfully', $posts, HttpStatusCode::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseHandler::error('Failed to fetch data', HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR, ['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $post = $this->postService->store($request->validated());
            return ResponseHandler::success('Post created successfully', $post, HttpStatusCode::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseHandler::error('Failed to create post', HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR, ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $post = $this->postService->update($id, $request->validated());
            return ResponseHandler::success('Post updated successfully', $post, HttpStatusCode::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseHandler::error('Failed to update post', HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR, ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->postService->delete($id);
            return ResponseHandler::success('Post deleted successfully', [], HttpStatusCode::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseHandler::error('Failed to delete post', HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR, ['error' => $e->getMessage()]);
        }
    }
}
