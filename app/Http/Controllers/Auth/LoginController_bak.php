<?php

/*namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;

//use App\User; 
//use App\Model\User;
use Socialite;*/
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Guard;
use Socialite;

use Auth;

use Exception;

use App\Models\User as UserModel;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function redirectToProvider()
	{
		return Socialite::driver('google')->redirect();
	}
	
	
	public function handleProviderCallback()
    {
        
		try {

            $user = Socialite::driver('google')->user();

            $finduser = UserModel::where('google_id', $user->id)->first();
            if($finduser){
				//print_r($finduser); exit;
				//$login_array = array('email'=>$finduser,'password'=>'password');
				//auth()->login($finduser);
				//$this->guard()->login($finduser);
				//$request->session()->regenerate();

				//$this->clearLoginAttempts($request);

				//if ($response = $this->authenticated($request, $this->guard()->user())) {
				//	return $response;
				//}
				Auth::guard('web')->login($finduser);
                return  redirect('/home');

            }else{
				//echo '<pre>';
				//print_r($user);
				//print_r($user->name);
				//exit;
                $newUser = UserModel::table('users')->create([

                    'name' => $user->name,

                    'email' => $user->email,
					'password' => bcrypt('password'),
					'google_id'=> $user->id

                ]);	
				//$user=DB::table('users')->create(['name','email','google_id']);
                //Auth::login($newUser);
				//auth()->login($newUser);
				$this->guard()->login($newUser);
                return  redirect('/home');

            }

        } catch (Exception $e) {

            return redirect('login');

        }

    }
	
	 protected function guard()
    {
        return Auth::guard();
    }
	
	protected function authenticated(Request $request, $user)
    {
        //
    }
	
	
	protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt($this->credentials($request) );
    }
	
	




    
	
}
