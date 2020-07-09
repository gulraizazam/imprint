<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LoginController extends Controller
{
    public function processLogin(Request $request)
    {
        $response = ['status_code'=> '', 'message'=>'', 'data'=> []];
		$result = array();
        //check authentication of email and password
        $customerInfo = array("email" => $request->email, "password" => $request->password);

        if (auth()->guard('customer')->attempt($customerInfo)) { 
            $customer = auth()->guard('customer')->user();

            if($customer->verified == 0){
                $response['status_code'] = 200;
                $response['message'] = 'error:Please Verify Your Email';
                $response['data'] = '';
                return response($response);
               
              
            }else{
            	$token = sha1(time());
                
            	DB::table('users')->where('id', '=',$customer->id)->update(['api_token' => $token]);
            	$response['status_code'] = 200;
                $response['message'] = 'success:Logged In Successfully';
                $response['data'] = $token;
                return response($response);
            }
            
            
        } else {
            $response['status_code'] = 200;
            $response['message'] = 'error:Email or Password Incorrect.';
            $response['data'] = '';
            return response($response);
            
        }
        
    }
}
