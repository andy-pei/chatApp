<?php

namespace App\Services;

use App\Repositories\Contracts\PostTypeServiceRepositoryInterface;

class PostTypeService {

    public function __construct(PostTypeServiceRepositoryInterface $postTypeServiceRepositoryInterface) {
        $this->postTypeServiceRepository = $postTypeServiceRepositoryInterface;
    }

    /**
     * create post type
     * @param array $data
     * @return mixed
     */
    public function createType($data = array()) {
        return $this->postTypeServiceRepository->createType($data);
    }

    /**
     * get post type by id
     * @param $type_id
     * @return mixed
     */
    public function getTypeById($type_id) {
        return $this->postTypeServiceRepository->getTypeById($type_id);
    }

    /**
     *  get all post types with paginate
     * @return mixed
     */
    public function getAllType() {
        return $this->postTypeServiceRepository->getAllType();
    }

    /**
     * get all post types for select box
     * @return mixed
     */
    public function getAllTypesForSelect() {
        $post_types = $this->postTypeServiceRepository->getAllType();
        $data = array();
        foreach($post_types as $type) {
            $data[$type->id] = $type->name;
        }
        return $data;
    }

}