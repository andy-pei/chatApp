<?php
/**
 * Created by PhpStorm.
 * User: Jialei Pei
 * Date: 8/11/2015
 * Time: 6:42 PM
 */

namespace App\Services;


use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentService
{
    public function __construct(CommentRepositoryInterface $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

    /**
     * create comment for a post
     * @param $data
     * @return mixed
     */
    public function createComment($data) {
        return $this->commentRepository->createComment($data);
    }

    /**
     * get comments of a post
     * @param $post_id
     * @return mixed
     */
    public function getPostComments($post_id) {
        return $this->commentRepository->getPostComments($post_id);
    }

    /**
     * get las comment for a post
     * @param $post_id
     * @return mixed
     */
    public function getLastComment($post_id) {
        return $this->commentRepository->getLastComment($post_id);
    }
}