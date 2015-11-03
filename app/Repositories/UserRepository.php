<?php
/**
 * Created by PhpStorm.
 * User: Jialei Pei
 * Date: 3/11/2015
 * Time: 7:41 PM
 */

namespace App\Repositories;


use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }
    public function createUser() {

    }

    /**
     * edit user by id
     * @param $id
     * @param $data
     * @return mixed
     */
    public function editUser($id, $data) {
        return $this->userModel->where('id', $id)
                               ->update($data);
    }

    /**
     * delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUser($id) {
        return $this->userModel->where('id', $id)
                               ->delete();
    }

}