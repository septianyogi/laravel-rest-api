<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getUser(){
        try {
            $users = $this->userService->getAll();
            return $this->responseOk($users, 'Users retrieved successfully');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage(), $th->getCode(), null); 
        }
        
    }

    public function createUser(StoreUserRequest $request){
        try {
            $data = $request->validated();
            $user = $this->userService->createUser($data);
        return $this->responseOk($user, 'User created successfully', 201);
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage(), $th->getCode(), null);
        }
        
    }

    public function getUserById($id){
        try {
            $user = $this->userService->getUserById($id);
            return $this->responseOk($user, 'User retrieved successfully');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage(), $th->getCode(), null);
        }
        
    }

    public function updateUser(UpdateUserRequest $request, $id){
        try {
            $data = $request->validated();
            $user = $this->userService->getUserById($id);
            $user = $this->userService->updateUser($user, $data);
            return $this->responseOk($user, 'User updated successfully');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage(), $th->getCode(), null);
        }
        
    }

    public function deleteUser($id){
        try {
            $user = $this->userService->getUserById($id);
            $this->userService->deleteUser($user);
            return $this->responseOk(null, 'User deleted successfully');
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage(), $th->getCode(), null);
        }
        
    }
}
