<?php

namespace App\Services;

use App\Models\User;
class UserService{
    public function getAll(){
        return User::all();
    }

    public function createUser(array $data){
        return User::create($data);
    }

    public function getUserById(int $id){
        return User::findOrFail($id);
    }

    public function updateUser(User $user, array $data){
        $user->update($data);
        return $user;
    }


    public function deleteUser(User $user){
        return $user->delete();
    }
}