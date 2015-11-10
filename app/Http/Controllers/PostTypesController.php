<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\PostTypeService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PostTypesController extends Controller
{

    public function __construct(PostTypeService $postTypeService,
                                CommentService $commentService) {
        $this->middleware('auth');
        $this->postTypeService = $postTypeService;
        $this->commentService = $commentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_types = $this->postTypeService->getAllType();

        return view('post.post_type.index')->with('post_types', $post_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.post_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | max:255'
        ]);

        $data = array_except(Input::all(), '_token');
        $post_type = $this->postTypeService->createType($data);
        return redirect('post-types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPostsByType($type_id) {
        $posts = $this->postTypeService->getPostsByType($type_id);

        //get last comment for each post
        foreach($posts as $post) {
            $last_comment = $this->commentService->getLastComment($post->id);
            $post->last_comment = $last_comment;
        }
        return view('post.index')->with(['posts' => $posts]);
    }
}
