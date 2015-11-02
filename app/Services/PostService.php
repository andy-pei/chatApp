<?php

namespace App\Services;

use App\Repositories\Contracts\PostServiceRepositoryInterface;

class PostService {

    public function __construct(PostServiceRepositoryInterface $postServiceRepository) {
        $this->postServiceRepository = $postServiceRepository;
    }

    /**
     * create new post
     * @param array $data
     * @return mixed
     */
    public function createPost($data=array()) {
        return $this->postServiceRepository->createPost($data);
    }

    /**
     * get post by id
     * @param $post_id
     * @return mixed
     */
    public function getPostById($post_id) {
        return $this->postServiceRepository->getPostById($post_id);
    }

    /**
     * get all posts with paginate
     * @return mixed
     */
    public function getAllPostsPaginated() {
        return $this->postServiceRepository->getAllPostsPaginated();
    }

    /**
     * delete post id
     * @param $id
     * @return mixed
     */
    public function deletePost($id) {
        return $this->postServiceRepository->deletePost($id);
    }

    /**
     * update post by id
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updatePost($id, $data) {
        return $this->postServiceRepository->updatePost($id, $data);
    }
}