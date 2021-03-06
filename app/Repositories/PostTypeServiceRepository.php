<?php

namespace App\Repositories;


use App\Models\PostTypeModel;
use App\Repositories\Contracts\PostTypeServiceRepositoryInterface;

class PostTypeServiceRepository implements PostTypeServiceRepositoryInterface
{
    public function __construct(PostTypeModel $postTypeModel) {
        $this->postTypeModel = $postTypeModel;
    }

    /**
     * create new post type
     * @param array $data
     * @return static
     */
    public function createType($data = array()) {
        return $this->postTypeModel->create($data);
    }

    /**
     * get type by type id
     * @param $type_id
     * @return mixed
     */
    public function getTypeById($type_id) {
        return $this->postTypeModel->where('id', $type_id)
                                   ->first();
    }

    /**
     * get all post types with paginate
     * @return mixed
     */
    public function getAllType() {
        return $this->postTypeModel->all();
    }

    /**
     * get posts within a post type
     * @param $type_id
     * @return mixed
     */
    public function getPostsByType($type_id) {
        $type = $this->postTypeModel->where('id', $type_id)->first();
        $posts = $type->posts;
        return $posts;
    }
}
