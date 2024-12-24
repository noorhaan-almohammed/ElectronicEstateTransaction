<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\UserService;
use App\Http\Requests\UpdateUserForm;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * User service instance
     */
    protected $userService;

    /**
     * Constructor to inject UserService
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    /**
     * Show all users
     *
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->userService->show();
    }

    /**
     * Create a new user
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        // Validate the request
        $validated = $request->validated();

        // Call user service to add a new user
        return $this->userService->addUser($validated);
    }

    /**
     * Show a specific user by ID
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->userService->showUser($id);
    }

    /**
     * Update a user's information
     *
     * @param UpdateUserForm $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserForm $request, User $user)
    {
        // Validate the request
        $data = $request->validated();

        // Call user service to update the user's information
        return $this->userService->updateUser($data, $user);
    }

    /**
     * Delete a user
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        // Call user service to delete the user
        return $this->userService->delete($user);
    }
}
