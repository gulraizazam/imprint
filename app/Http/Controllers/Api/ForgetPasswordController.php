<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Lang;
use App\Http\Controllers\Web\AlertController;
use App\Http\Controllers\Api\UserClass\ForgetPassword;
class ForgetPasswordController extends Controller
{
     public function processPassword(Request $request)
    {	
    	$response = ['status_code'=> '', 'message'=>'', 'data'=> []];
        $title = array('pageTitle' => Lang::get("website.Forgot Password"));
        $forgetpass = new ForgetPassword();
        $password = $forgetpass->createRandomPassword();

        $email = $request->email;
        $postData = array();

        //check email exist
        $existUser = $forgetpass->ExistUser($email);
        if (count($existUser) > 0) {
            $forgetpass->UpdateExistUser($email, $password);

            $existUser[0]->password = $password;

           
            \Mail::send('/mail/recoverPassword', ['existUser' => $existUser], function($m) use ($existUser){
				$m->to($existUser[0]->email)
				
				->subject("Forget Password");
				
			});
			$response['status_code'] = 200;
       		$response['message'] = 'success:Password has been sent to your email address';
        	$response['data'] = '';
        	return response($response);             
			
           
        } else {
        	$response['status_code'] = 200;
       		$response['message'] = 'error:Email address does not exist';
        	$response['data'] = '';
        	return response($response);
        	
            
        }

    }
}
