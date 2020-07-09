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
class ForgetPassword 
{
    public function createRandomPassword()
    {
        $pass = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        return $pass;
    }
    public function ExistUser($email)
    {
        $existUser = DB::table('users')->where('role_id', 2)->where('email', $email)->get();
        return $existUser;
    }

    public function UpdateExistUser($email, $password)
    {
        DB::table('users')->where('email', $email)->update([
            'password' => Hash::make($password),
        ]);
    }
    
}