<?php

namespace App\Repositories\Contracts;


interface PostTypeServiceRepositoryInterface
{
    public function createType($data = array());
    public function getTypeById($type_id);
    public function getAllTypePaginate();
}
