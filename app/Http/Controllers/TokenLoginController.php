<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TokenModel;

class TokenLoginController extends Controller
{
    public function token_check(Request $request){
        // if ($request->isMethod('POST')) {
        //     $request->validate([
        //         'token'=> 'required|string|max:255',
        //     ]);
        //     $credentials = $request->only('token');
        //     dump($credentials);

        //     if (Auth::attempt($credentials)) {
        //         $request->session()->regenerate();
        //         //There must be token check
        //         return redirect()->intended(route('integration'));


        //     }
        // }
        // Check if the request method is POST
        // if ($request->isMethod('POST')) {
        //     // Validate the incoming request
        //     $request->validate([
        //         'user_token' => 'required|string|max:5', // Assuming the token is 5 digits
        //     ]);

        //     // Retrieve the token from the request
        //     $token = $request->input('user_token');

        //     // Check if the token exists in the database
        //     $user = DB::table('users')->where('user_token', $token)->first();

        //     // Check if the user exists
        //     if ($user) {
        //         // Log the user in
        //         Auth::loginUsingId($user->id);
        //         $request->session()->regenerate();

        //         // Redirect to the intended route
        //         return redirect()->intended(route('integration'));
        //     } else {
        //         // Token is invalid
        //         return response()->json(['error' => 'Invalid token'], 401);
        //     }
        // }

        // // If the request method is not POST, return a 405 Method Not Allowed response
        // return response()->json(['error' => 'Method not allowed'], 405);



    }
    // public function authenticate(Request $request){
    //     $request->validate([
    //         'token' => 'required|string|size:5',
    //     ]);
    //     $token = TokenModel::where('user_token', $request->token)->first();
    //     if ($token) {
    //         // Store token in session or generate a session-based key
    //         session(['user_token' => $token->user_token]);

    //         return redirect()->route('integration'); // Redirect to the authenticated area
    //     }
    //     return back()->withErrors(['token' => 'Invalid token.']);
    // }
    public function authenticate(Request $request)
    {
        // Validate the input
        $request->validate([
            'user_token' => 'required|string|size:5',
        ]);

        // Retrieve the token from the database
        $token = TokenModel::where('user_token', $request->user_token)->first();

        if ($token) {
            // Store token in session or generate a session-based key
            session(['user_token' => $token->user_token]);

            // Redirect to the authenticated area
            return redirect()->route('integration');
        }

        // If the token is invalid, return back with an error
        return back()->withErrors(['user_token' => 'Invalid token.']);
    }
}
