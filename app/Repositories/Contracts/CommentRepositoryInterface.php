<?php
/**
 * Created by PhpStorm.
 * User: Jialei Pei
 * Date: 8/11/2015
 * Time: 6:38 PM
 */

namespace App\Repositories\Contracts;


interface CommentRepositoryInterface
{
    public function createComment($data);
    public function getPostComments($post_id);
    public function getLastComment($post_id);
}