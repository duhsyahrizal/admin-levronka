<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Product;
use App\Models\Traffic;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('username', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('username', $request['username'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Hi '.$user->name.', welcome back!','access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

    public function token($username)
    {
        return User::where('username', $username)->first()->token();
    }

    public function userVisit(Request $request)
    {
        $agent = $request->header('user-agent');

        $visitor = Traffic::where([
            'user_ip'       => $request->ip(),
            'user_agent'    => $agent,
            'location'      => $request->location
        ])->whereDay('created_at', \Carbon\Carbon::now()->format('d'))->first();

        if($visitor === null) {
            Traffic::create([
                'user_ip'       => $request->ip(),
                'user_agent'    => $agent,
                'location'      => $request->location,
            ]);

            return response()->json([
                'success'   => true,
                'message'   => '200 OK'
            ]);
        }
    }

    public function productJson()
    {
        $products = Product::with('category')->get();

        return response()->json([
            'success'   => true,
            'data'      => [
                'newest'    => $products->whereNotNull('tag'),
                'products'  => $products
            ]
        ]);
    }
}
