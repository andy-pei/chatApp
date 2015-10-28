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
    public function getAllPostsPaginated() {
        return $this->postModel->paginate();
    }
}
