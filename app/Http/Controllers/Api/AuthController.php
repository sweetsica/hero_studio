<?php

namespace App\Http\Controllers\Api;

use App\Http\Traits\HasResponseApi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use const App\Http\Traits\exampleStatusCode;

class AuthController extends Controller
{
    use HasResponseApi;
    /**
     * Create User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Get current user role
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoleUser(Request $request)
    {
        try {
            $user = Auth::guard('sanctum')->user();
            $userRoles = $user->getRoleNames();

            return response()->json([
                'roles' => $userRoles,
            ]);
        } catch (\Exception $exception) {
            return $this->apiErrorResponse($exception->getMessage());
        }
    }

    /**
     * set user roles
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setRoleUser(Request $request)
    {
        try {
            $params = $request->only(['user_id', 'role_id']);

            $user = User::find($params['user_id']);
            $role = Role::find($params['role_id']);

            if (!$user || !$role) {
                $this->setApiStatusCode(exampleStatusCode['not_found']);
                throw new \Exception('Wrong user id or role');
            }

            // Đồng bộ lại role , xóa role cũ dùng role mới được truyền lên
            $user->syncRoles($role->name);

            return $this->apiResponse($user);
        } catch (\Exception $exception) {
            return $this->apiErrorResponse($exception->getMessage());
        }
    }
}
