<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validations;
use App\User;
use App\Models\Web\Customer;
use App\Http\Controllers\Api\UserClass\Register;
use App\VerifyUser;
use App\Mail\VerifyMail;
use DB;
use Hash;
require public_path().'/Twilio/autoload.php';
use Twilio\Rest\Client;
class RegisterController extends Controller
{
    public function signupProcess(Request $request)
    {
      $response = ['status_code'=> '', 'message'=>'', 'data'=> []];
    	$date = date('y-m-d h:i:s');
      $profile_photo = 'images/user.png';
      if($request->email !=null){
          $user_email = DB::table('users')->select('email','id')->where('role_id', 2)->where('email', $email)->get();
          if ($user_email != null) {
              $checkVerified = DB::table('users')->where('role_id', 2)->where('email', $user_email->email)->first();
              if($checkVerified->verified ==1){
                  $StoreUser = User::find($checkVerified->id);
                  $StoreUser->first_name = $request->firstName;
                  $StoreUser->last_name = $request->lastName;
                  $StoreUser->gender = $request->gender;
                  $StoreUser->password =  Hash::make($password);
                  $StoreUser->created_at = $date;
                  $StoreUser->updated_at = $date;
                  $StoreUser->update();
                  $response['status_code'] = 200;
                  $response['message'] = 'success:Registration Completed!';
                  $response['data'] = '';
                  return response($response);
              }else {
                $response['status_code'] = 200;
                $response['message'] = 'error:Please Verify Your Email First!';
                $response['data'] = '';
                return response($response);
              }
          }else{
            $response['status_code'] = 200;
            $response['message'] = 'error:User Does Not Exist!';
            $response['data'] = '';
            return response($response);
          }
      }
      if($request->phonenumber !=null){
          $user_phone = DB::table('users')->select('phone','id')->where('role_id', 2)->where('phone', $request->phonenumber)->first();
          if ($user_phone !=null) {
              $checkVerified = DB::table('users')->where('role_id', 2)->where('phone', $user_phone->phone)->first();
              if($checkVerified->verified ==1){
                  $StoreUser = User::find($checkVerified->id);
                  $StoreUser->first_name = $request->firstName;
                  $StoreUser->last_name = $request->lastName;
                  $StoreUser->gender = $request->customers_gender;
                  $StoreUser->password =  Hash::make($request->password);
                  $StoreUser->created_at = $date;
                  $StoreUser->updated_at = $date;
                  $StoreUser->update();
                  $response['status_code'] = 200;
                  $response['message'] = 'success:Registration Completed!';
                  $response['data'] = $StoreUser;
                  return response($response);
              }else {
                $response['status_code'] = 200;
                $response['message'] = 'error:Please Verify Your Phone Number First!';
                $response['data'] = '';
                return response($response);
              }
          }else{
            $response['status_code'] = 200;
            $response['message'] = 'error:User Does Not Exist!';
            $response['data'] = '';
            return response($response);
          }
      }
    }
    public function SendCode(Request $request)
    {
       $response = ['status_code'=> '', 'message'=>'', 'data'=> []];
        if($request->email !=null){

          $user_email = DB::table('users')->select('email','id')->where('role_id', 2)->where('email', $request->email)->first();
          if ($user_email !=null) {
            $verif = mt_rand(20000,90000);
            //email and notification
            $verifyUser = VerifyUser::where('user_id',$user_email->id)->update(['token' => $verif]);
            \Mail::to($user_email->email)->send(new VerifyMail($user_email, $verif));
            $response['status_code'] = 200;
            $response['message'] = 'success:Verification Code Sent To Your Email';
            $response['data'] = '';
            return response($response);
        }else{
          $user = new User();
          $user->email = $request->email;
          $user->role_id = 2;
          $user->save();
        
          $verif = mt_rand(20000,90000);
          //email and notification
           $verifyUser = VerifyUser::create([
              'user_id' =>$user->id,
              'token' =>   $verif
            ]);
          \Mail::to($user->email)->send(new VerifyMail($user, $verif));
            $response['status_code'] = 200;
            $response['message'] = 'success:Verification Code Sent To Your Email';
            $response['data'] = '';
            return response($response);
        }
         
    }elseif($request->phonenumber !=null){
        $user_phone = DB::table('users')->select('phone','id')->where('role_id', 2)->where('phone', $request->phonenumber)->first();
          if ($user_phone !=null) {
            $verif = mt_rand(20000,90000);
            //email and notification
            $verifyUser = VerifyUser::where('user_id',$user_phone->id)->update(['token' => $verif]);
            $sid    = "AC7523c27f8209f45e9a1824f0d0ba9b1c";
            $token  = "612041869cb75b3b5bdd75ec4d226d0a";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
            ->create("+923110022881", // to
                ["body" => $verif, "from" => "+17793244226"]
            );
            $response['status_code'] = 200;
            $response['message'] = 'success:Verification Code Sent To Your Phone Number';
            $response['data'] = '';
            return response($response);
        }else{
          $user = new User();
          $user->phone = $request->phonenumber;
          $user->role_id = 2;
          $user->save();
        
          $verif = mt_rand(20000,90000);
          //email and notification
           $verifyUser = VerifyUser::create([
              'user_id' =>$user->id,
              'token' =>   $verif
            ]);
          $sid    = "AC7523c27f8209f45e9a1824f0d0ba9b1c";
          $token  = "612041869cb75b3b5bdd75ec4d226d0a";
          $twilio = new Client($sid, $token);

          $message = $twilio->messages
          ->create("+923110022881", // to
              ["body" => $verif, "from" => "+17793244226"]
          );
            $response['status_code'] = 200;
            $response['message'] = 'success:Verification Code Sent To Your Phone Number';
            $response['data'] = '';
            return response($response);
        
        }
    }
  }
        
}
