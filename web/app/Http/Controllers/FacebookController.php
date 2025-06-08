<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use Socialite;
use App\SocialAccount;
use Exception;
use Auth;
use Validator,Redirect,Response,File;

class FacebookController extends Controller
{
    public function redirectToFacebook($provider)
    {  
        return Socialite::driver($provider)->redirect();
    }
    
    // public function handleFacebookCallback($provider)
    // {
    //     try {
    //         $user = Socialite::driver($provider)->user();

    //         $create['name'] = $user->getName(); 

    //         $create['email'] = $user->getEmail();

    //         $create['facebook_id'] = $user->getId();

    //         $userModel = new users;

    //         $createdUser = $userModel->addNew($create);

    //         Auth::loginUsingId($createdUser->id);
    //         return redirect('/');

    //     } catch (Exception $e) {
    //         return redirect('auth/facebook');
    //     }
    // }

    public function handleFacebookCallback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
         
        $user = $this->createUser($getInfo,$provider);
 
        auth()->login($user);
 
        return redirect()->to('/');
    }

   function createUser($getInfo,$provider){
 
     $user = users::where('provider_id', $getInfo->id)->first();
 
     if (!$user) {
         $user = users::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);
      }
      return $user;
   }






    // public function handleFacebookCallback(Request $request)
    //  {
         
   
     
    //        if($request->has('code')) {
            
    //            $getInfo =  Socialite::driver('facebook')->user(); 
    //        $user = $this->createUser($getInfo,'facebook'); 
    //        auth()->login($user); 
    //        return redirect('/');
    //     }
    //  }
     
     
    //  function createUser($getInfo,$provider){
    //      $user = users::where('facebook_id', $getInfo->id)->first();
    //      if (!$user) {
    //           $user = users::create([
    //              'name'     => $getInfo->name,
    //              'email'    => $getInfo->email,
    //              'provider' => $provider,
    //              'facebook_id' => $getInfo->id
    //          ]);
    //        }
    //        return $user;
    //  }
    


}
