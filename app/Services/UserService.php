<?php
/**
 * Created by PhpStorm.
 * User: Jialei Pei
 * Date: 3/11/2015
 * Time: 7:45 PM
 */

namespace App\Services;


use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * edit user
     * @param $id
     * @param $data
     * @return mixed
     */
    public function editUser($id, $data) {
        return $this->userRepository->editUser($id, $data);
    }
}