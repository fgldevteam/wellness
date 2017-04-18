<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Exception\HttpResponseException;  
// use JWTAuth;   
use Tymon\JWTAuth\Exceptions\JWTException;  
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;  
use Illuminate\Http\Response as IlluminateResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Hash;

class AuthController extends Controller {

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        try
        {
            $this->validate($request, [
                'email' => 'required|email|max:255', 'password' => 'required',
            ]);
        }
        catch (HttpResponseException $e)
        {
            return response()->json([
                'error' => [
                    'message'     => 'Invalid auth',
                    'status_code' => IlluminateResponse::HTTP_BAD_REQUEST
                ]],
                IlluminateResponse::HTTP_BAD_REQUEST,
                $headers = []
            );
        }

        $credentials = $this->getCredentials($request);

        try
        {
            // attempt to verify the credentials and create a token for the user
            if ( ! $token = JWTAuth::attempt($credentials))
            {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        }
        catch (JWTException $e)
        {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        // $request->session()->push('token', $token);
        return response()->json(compact('token'));
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    public function getLogin()
    {
        // dd("hello");
        return view('auth.login');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        User::create([
            'firstname' => $request->get('firstname'),
            'lastname'  => $request->get('lastname'),
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password'))
            ]);
    }
}