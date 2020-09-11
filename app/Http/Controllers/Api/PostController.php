<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Api\StorePostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        // Tagを取得する
        foreach($posts as $post){
            $post->tags; 
        }
        return ['posts' => $posts];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post->tags()->sync($request->tags);

        return response()->json(Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'is_draft' => $request->is_draft,
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // 紐づいたタグを取得できる
        $post->tags; 
        return ['post' => $post];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post->tags()->sync($request->tags);

        return response()->json(Post::find($id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'is_draft' => $request->is_draft
        ]));
    }

    /**
     * Validate the request for update.
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse|true
     */
    private function validateUpdate(Request $request)
    {
        // Validates basic fields to create the entry
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'post' => 'required|max:1000000',
        ]);

        if ($validator->fails()) {
            return $this->respondValidatorFailed($validator);
        }

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('api/posts');
    }
}
