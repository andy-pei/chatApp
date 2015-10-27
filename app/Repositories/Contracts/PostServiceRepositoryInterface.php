<?php

namespace App\Repositories\Contracts;


interface PostServiceRepositoryInterface
{
    public function createPost($data=array());
    public function getPostById($post_id);
    public function getAllPostsPaginated();
}
