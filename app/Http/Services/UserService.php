<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Validation\UnauthorizedException;

class UserService {

    /**
     * Retrieve a paginated list of users.
     *
     * @return \Illuminate\Http\JsonResponse JSON response containing the paginated users.
     */
    public function show(){
        $users = User::paginate(); // 15 by default
        return response()->json(['users' => $users], 200);
    }

    /**
     * Add a new user with the provided data.
     *
     * @param array $data The user data including 'name', 'email', and 'password'.
     * @return \Illuminate\Http\JsonResponse JSON response with the result of the user creation.
     */
    public function addUser(array $data){
        try {
            $user = User::create($data);
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        } catch (UnauthorizedException $e) {
            return response()->json([
                'message' => 'User does not have the right roles'
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating User',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Retrieve a specific user by ID.
     *
     * @param int $id The ID of the user to retrieve.
     * @return \Illuminate\Http\JsonResponse JSON response containing the user data or an error message.
     */
    public function showUser($id){
        if (!$id) {
            return response()->json(['message' => 'User Not Exist'], 404);
        }
        $user = User::findOrFail($id);
        return response()->json(['user' => $user], 200);
    }

    /**
     * Update the specified user with the provided data.
     *
     * @param array $data The data to update the user with.
     * @param User $user The user instance to update.
     * @return \Illuminate\Http\JsonResponse JSON response with the result of the update.
     */
    public function updateUser(array $data, User $user){
        if (!$user) {
            return response()->json(['message' => 'User Not Exist'], 404);
        }
        try {
            $user->update($data);
            return response()->json([
                'message' => 'User Info Updated Successfully',
                'user' => $user
            ], 200);
        } catch (UnauthorizedException $e) {
            return response()->json([
                'message' => 'User does not have the right roles'
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred during the update process',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete the specified user.
     *
     * @param User $user The user instance to delete.
     * @return \Illuminate\Http\JsonResponse JSON response with the result of the deletion.
     */
    public function delete(User $user){
        if (!$user) {
            return response()->json(['message' => 'User Not Exist'], 404);
        }
        try {
            $user->delete();
            return response()->json(['message' => 'User Deleted Successfully'], 200);
        } catch (UnauthorizedException $e) {
            return response()->json([
                'message' => 'User does not have the right roles'
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred during the delete process',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
