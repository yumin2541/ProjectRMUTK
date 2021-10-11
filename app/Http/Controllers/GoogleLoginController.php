<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use App\Role;
 
class GoogleLoginController extends Controller
{
 
public function redirect($provider)
{
    return Socialite::driver($provider)->redirect();
}
 
public function callback($provider)
{
           
    $getInfo = Socialite::driver($provider)->user();
     
    $user = $this->createUser($getInfo,$provider);
 
    auth()->login($user);
 
    return redirect()->to('/home');
 
}
function createUser($getInfo,$provider)
{
 
    $user = User::where('provider_id', $getInfo->id)->first();
    
    if (!$user) {
        $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);

        $role = Role::select('id')->where('name','student')->first();
        $user->roles()->attach($role);

    }

    return $user;
}
}