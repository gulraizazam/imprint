<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
class EmailVerifyController extends Controller
{
    public function verifyUser(Request $request)
    {
    	$response = ['status_code'=> '', 'message'=>'', 'data'=> []];
        if($request->email !=null){
            $getUser = User::where('email',$request->email)->first();
            if(isset($getUser)){
                $getToken = DB::table('verify_users')->where('user_id',$getUser->id)->first();
            }else{
                $response['status_code'] = 200;
                $response['message'] = 'error:Email Does Not Exist';
                $response['data'] = '';
                return response($response);
            }
            if(isset($request->token)){
                if($getToken->token == $request->token){
                    $getUser->verified = 1;
                    $getUser->update();
                    $response['status_code'] = 200;
                    $response['message'] = 'success:Your Email is Verified. Now You Can Log In';
                    $response['data'] = '';
                    return response($response);
                }else{
                    $response['status_code'] = 200;
                    $response['message'] = 'error:Email Or Verification Code Incorrect!';
                    $response['data'] = '';
                    return response($response);
                }
            }else{
                $response['status_code'] = 200;
                $response['message'] = 'error:Invalid Token!';
                $response['data'] = '';
                return response($response);
            }
        }elseif($request->phonenumber !=null){
            $getUser = User::where('phone',$request->phonenumber)->first();
            if(isset($getUser)){
                $getToken = DB::table('verify_users')->where('user_id',$getUser->id)->first();
            }else{
                $response['status_code'] = 200;
                $response['message'] = 'error:Phone Number Does Not Exist';
                $response['data'] = '';
                return response($response);
            }
            if(isset($request->token)){
                if($getToken->token == $request->token){
                    $getUser->verified = 1;
                    $getUser->update();
                    $response['status_code'] = 200;
                    $response['message'] = 'success:Your Phone Number is Verified.';
                    $response['data'] = '';
                    return response($response);
                }else{
                    $response['status_code'] = 200;
                    $response['message'] = 'error:Phone Number Or Verification Code Incorrect!';
                    $response['data'] = '';
                    return response($response);
                }
            }else{
                $response['status_code'] = 200;
                $response['message'] = 'error:Invalid Token!';
                $response['data'] = '';
                return response($response);
            }
		} 
    }
}
