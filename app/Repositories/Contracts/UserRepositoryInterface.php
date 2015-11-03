<?php
/**
 * Created by PhpStorm.
 * User: Jialei Pei
 * Date: 3/11/2015
 * Time: 7:39 PM
 */

namespace App\Repositories\Contracts;


interface UserRepositoryInterface
{
    public function createUser();

    public function editUser($id, $data);

    public function deleteUser($id);
}