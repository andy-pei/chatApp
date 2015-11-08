<?php
/**
 * Created by PhpStorm.
 * User: Jialei Pei
 * Date: 8/11/2015
 * Time: 6:38 PM
 */

namespace App\Repositories;


use App\Models\CommentModel;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function __construct(CommentModel $commentModel)
    {
        $this->commentModel = $commentModel;
    }

    /**s
     * create comment for a post
     * @param $data
     * @return mixed
     */
    public function createComment($data)
    {
        return $this->commentModel->create($data);
    }

    /**
     * get comments of a post
     * @param $post_id
     * @return mixed
     */
    public function getPostComments($post_id) {
        return $this->commentModel->where('post_id', $post_id)
                                  ->get();
    }
}