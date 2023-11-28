<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $response            = [];
        $response['success'] = true;
        $response_code       = 201;
        $response['message'] = 'Registration successfully';
        $response['data'] = [];

        $data = $request->all();

        $rule = array(
            'name' => 'required|string|max:100',
            'email' => 'required|string|unique:users,email|email|max:100',
            'password' => 'required|min:8|confirmed',
        );

        $validator = Validator::make($data, $rule);

        if ($validator->fails()) {
            $response['success']            = false;
            $response['message']            = 'Registration failed';
            $response['errors'] = $validator->errors();
            $response_code                 = 422;
        }

        if ($response['success'] == true) {

            //User creation
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->input('password'))
            ]);

            //Send welcome mail
            $emailData = [
                'to' => [
                    'email' => $request->email,
                    'name'  => $request->name
                ],
                'subject' => 'Registration Successfull',
                'message' => 'Congratulations! Your registration is successfull'
            ];

            SendEmail::dispatch($emailData);

        }

        //Return json response
        return response()->json($response, $response_code);
    }

}
