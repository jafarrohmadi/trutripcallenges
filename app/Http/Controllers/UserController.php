<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Resources\UserResource;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * @param  LoginRequest  $request
     * @return ResponseFactory|Response
     */
    public function login(LoginRequest $request)
    {
        try {
            if (Auth::attempt([
                'email'    => $request->email,
                'password' => $request->password,
            ])) {
                me()->last_login_at = Carbon::now()->toDateTimeString();
                me()->save();

                $success['token'] = me()->createToken('authToken')->plainTextToken;
                return $this->returnSuccess($success);
            }

        } catch (\Throwable $th) {
            return $this->returnFalse("Something went wrong", $th->getMessage());
        }

        return $this->returnFalse('Unauthorised');
    }

    /**
     * @return Response|ResponseFactory
     */
    public function profile()
    {
        return Cache::remember("user".me()->id,600, function () {
           return $this->returnSuccess(new UserResource(me()));
        });
    }

    /**
     * @return ResponseFactory
     */
    public function logout()
    {
        if ($user = me()->currentAccessToken()->delete()) {
            return $this->returnSuccess('Success Logout');
        }

        return $this->returnFalse('Unauthorised');
    }
}
