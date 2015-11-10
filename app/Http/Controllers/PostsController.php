<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\PostService;
use App\Services\PostTypeService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PostsController extends Controller
{
    public function __construct(PostService $postService,
                                PostTypeService $postTypeService,
                                CommentService $commentService) {
        $this->middleware('auth');
        $this->postService = $postService;
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
        $user_id = Auth::user()->id;
        $posts = $this->postService->getAllUserPostsPaginated($user_id);

        //get last comment for each post
        foreach($posts as $post) {
            $last_comment = $this->commentService->getLastComment($post->id);
            $post->last_comment = $last_comment;
        }

        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post_types = $this->postTypeService->getAllTypesForSelect();
        return view('post.create')->with('post_types', $post_types);
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
            'title' => 'required | max:255',
            'body' => 'required',
            'type_id' => 'required'
        ]);

        $data = array_except(Input::all(), '_token');
        $data['user_id'] = Auth::user()->id;

        $post = $this->postService->createPost($data);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postService->getPostById($id);
        $comments = $this->commentService->getPostComments($id);

        return view('post.view')->with(['post' => $post,
                                        'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postService->getPostById($id);
        $post_types = $this->postTypeService->getAllTypesForSelect();
        return view('post.edit')->with(['post' => $post,
                                        'post_types' => $post_types]);
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
        $this->validate($request, [
            'title' => 'required | max:255',
            'body' => 'required',
            'type_id' => 'required'
        ]);

        $data = array_except(Input::all(), '_token');
//        dd(nl2br(Input::get('body')));
        $data['body'] = nl2br($data['body']);
        $this->postService->updatePost($id, $data);

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postService->deletePost($id);

        return redirect('posts');
    }

    /**
     * get all posts in all types
     * @return $this
     */
    public function getAllPosts() {
        $posts = $this->postService->getAllPosts();

        //get last comment for each post
        foreach($posts as $post) {
            $last_comment = $this->commentService->getLastComment($post->id);
            $post->last_comment = $last_comment;
        }
        return view('post.index')->with(['posts' => $posts]);
    }

    /**
     * search posts by title
     * @return \Illuminate\Http\RedirectResponse
     */
    public function searchPosts() {
        $title = Input::get('title');

        $posts = $this->postService->searchPosts($title);

        return  view('post.index')->with(['posts' => $posts]);
    }
}
