<?php
namespace App\Http\Controllers\Api\UserClass;
use App\Http\Controllers\Web\AlertController;
use App\Models\Web\Index;
use App\Models\Web\Products;
use App\User;
use Auth;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Lang;
use Session;
use Socialite;
use App\Mail\VerifyMail;
use App\VerifyUser;

require public_path().'/Twilio/autoload.php';
use Twilio\Rest\Client;
class Register 
{
    public function signupProcess($request)
    {
        $res = array();
        
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $gender = $request->gender;
        $email = $request->email;
        $phone= $request->phonenumber;
        $password = $request->password;
        //$token = $request->token;
        $date = date('y-m-d h:i:s');
        $profile_photo = 'images/user.png';

       

        //check email already exit
        
            
            
              

                //check authentication of email and password
                if (auth()->guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    $res['auth'] = "true";
                    $customer = auth()->guard('customer')->user();

                    

                    $customers = DB::table('users')->where('id', $customer->id)->get();
                    
                    $result['customers'] = $customers;

                    $verif = mt_rand(20000,90000);
                    //email and notification
                     $verifyUser = VerifyUser::create([
                        'user_id' =>$customers[0]->id,
                        'token' =>   $verif
                      ]);
                     
                     
                    \Mail::to($customers[0]->email)->send(new VerifyMail($customers, $verif));
                     
                    $myVar = new AlertController();
                    $alertSetting = $myVar->createUserAlert($customers);
                    $res['result'] = $result;
                    return $res;
                } else {
                    $res['auth'] = "true";
                    return $res;
                }

            } else {
                $res['insert'] = "false";
                return $res;
            }
            }

        }elseif($request->phonenumber){
            $user_phone = DB::table('users')->select('phone','id')->where('role_id', 2)->where('phone', $phone)->get();

            if (count($user_phone) > 0) {
                $res['phone'] = "true";
                return $res;
            } else {
                $res['phone'] = "false";
                if (DB::table('users')->insert([
                    'first_name' => $request->firstName,
                    'last_name' => $request->lastName,
                    'gender' => $request->gender,
                    'role_id' => 2,
                    'phone' =>$request->phonenumber,
                    'email' => $request->email,
                    'password' => Hash::make($password),
                    'created_at' => $date,
                    'updated_at' => $date,
                ])
                ) 
                {
                    $res['insert'] = "true";
                    //check authentication of email and password
                    if (auth()->guard('customer')->attempt(['phone' => $request->phonenumber, 'password' => $request->password])) {
                        $res['auth'] = "true";
                        $customer = auth()->guard('customer')->user();

                        $customers = DB::table('users')->where('id', $customer->id)->get();
                    
                        $result['customers'] = $customers;
                        $verif = mt_rand(20000,90000);
                        //email and notification
                        $verifyUser = VerifyUser::create([
                            'user_id' =>$customers[0]->id,
                            'token' =>   $verif
                        ]);
                     
                     
                        $sid    = "AC7523c27f8209f45e9a1824f0d0ba9b1c";
                        $token  = "612041869cb75b3b5bdd75ec4d226d0a";
                        $twilio = new Client($sid, $token);

                        $message = $twilio->messages
                        ->create("+923110022881", // to
                            ["body" => $verif, "from" => "+17793244226"]
                        );
                     
                        
                        $res['result'] = $result;
                        return $res;
                    } else {
                        $res['auth'] = "true";
                        return $res;
                    }

                } else {
                    $res['insert'] = "false";
                    return $res;
                }
            }
        }
    }
}