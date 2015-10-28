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
}