<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

      //admin Login check then login
      public function login(Request $request){
        $request->validate([
           'email'=> 'required|email|exists:sellers,email',
           'password'=>'required|min:8'
        ]);

        $admin = Seller::where('email', $request->email)->first();

        if(Hash::check($request->password, $admin->password)){
            if(Auth::guard('seller')->attempt(['email'=>$request->email, 'password'=>$request->password])){

                // $token = $admin->createToken('Token Name')->accessToken;
                // session(['admin_token' => $token]);
                //dd($token);
               return   redirect()->route(getenv('SELLER_BASE_NAME').'.dashboard')->with('success', 'welcome! login success');
            }else{
                return   redirect()->back()->with('error', 'Something went wrong!. try again ');
            }
        }else{
           return   redirect()->back()->with('error', 'This password is incorrect!');
        }

    }

    //admin logout
    public function logout()
    {
       Auth::guard('seller')->logout();
        return redirect()->route( getenv('SELLER_BASE_NAME'). '.login');
    }

     //api auth
     public function api_login(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'email'=>'required|email|exists:sellers,email',
             'password'=>'required|min:8'
         ]);

         if ($validator->fails()) {
             return response()->json(['error'=>$validator->errors()],422);
         }


         $admin  = Seller::where('email', $request->email)->first();

         if(Hash::check($request->password, $admin->password)){
             if(Auth::guard('seller')->attempt(['email'=>$request->email, 'password'=>$request->password])){

                 $user = Auth::guard('seller')->user();

                 $token = $user->createToken('MyApp', ['seller'])->accessToken;

                 return response()->json(['status'=>200,'token'=>$token],200);
             }else{
                 return response()->json(['status'=>500,'error'=>'somthing went wrong. try agin'],500);
             }
         }else{
             return response()->json(['status'=>403,'error'=>'This password is incorrect!'],403);
         }


     }


     //admin dtl
     public function api_admin_dtl(){
              // dd('attempt ok');

              if(Auth::guard('seller-api')->check()){
                 $user = Auth::user();
                 return response()->json(['status'=>200,'user'=>$user],200);
             }
             return response()->json(['status'=>403,'user'=>'Unathorazed'],403);
     }

}
