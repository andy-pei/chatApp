<?php

namespace App\Repositories;


use App\Models\PostModel;
use App\Repositories\Contracts\PostServiceRepositoryInterface;

class PostServiceRepository implements PostServiceRepositoryInterface
{
    public function __construct(PostModel $postModel) {
        $this->postModel = $postModel;
    }

    /**
     * create new post
     * @param array $data
     * @return static
     */
    public function createPost($data=array()) {
        return $this->postModel->create($data);
    }

    /**
     * get post by id
     * @param $post_id
     * @return mixed
     */
    public function getPostById($post_id) {
        return $this->postModel->where('id', $post_id)
                               ->first();
    }

    /**
     * get all posts with paginate
     * @return mixed
     */
    public function getAllUserPostsPaginated($user_id) {
        return $this->postModel->where('user_id', $user_id)
                               ->paginate();
    }

    /**
     * delete post by id
     * @param $id
     * @return mixed
     */
    public function deletePost($id) {
        return $this->postModel->where('id', $id)
                    ->delete();
    }

    /**
     * update post by id
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updatePost($id, $data) {
        return $this->postModel->where('id', $id)
                               ->update($data);
    }

    /**
     * get all posts
     * @return mixed
     */
    public function getAllPostsPaginate() {
        return $this->postModel->paginate();
    }

    /**
     * search posts by title
     * @param $title
     * @return mixed
     */
    public function searchPosts($title) {
        return $this->postModel->where('title', 'LIKE', "%$title%")
                                ->paginate();
    }
}
