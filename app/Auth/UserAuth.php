<?php
namespace App\Auth;

use App\Mail\RecoverPassword;
use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserAuth
{


	public function recoverPassword(){

	    Validator::make(request()->all(), ['email' => 'required|email|exists:users'])->validate();

	    try
        {

            $user = User::byEmail(request()->email);

            Mail::to($user->email)->send(new RecoverPassword($user));

            return ['result' => true];
        }
        catch(\Exception $ex)
        {

            return ['result' => false, 'msg' => $ex->getMessage()];
        }
    }

	public function register()
	{

        Validator::make(request()->all(),[
            'first_name' => 'required',
            'surname' => 'required',
            'entity' => 'required',
            'address_1' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'country' => 'required',
			'email' => 'required|unique:users',
			'password' => 'required',
			'newsletter' => 'required',
            'language' => 'required',
			])->validate();

        try
		{
			$user = new User();
			$user->first_name = request()->first_name;
			$user->surname = request()->surname;
			$user->birth_date = request()->birth_date;
			$user->entity = request()->entity;
			$user->company_name = request()->company_name;
			$user->company_size = request()->company_size;
			$user->address_1 = request()->address_1;
			$user->address_2 = request()->address_2;
			$user->postal_code = request()->postal_code;
			$user->language = request()->language;
			$user->city = request()->city;
			$user->country = request()->country;
			$user->email = request()->email;
			$user->password =  bcrypt(request()->password);
			$user->active = false;
			$user->user_type_id = 2;
			$user->newsletter_consent = request()->newsletter;

            $user->setToken();
            $user->save();

            auth()->login($user);
            Mail::to($user->email)->send(new Welcome($user));

			return ["result" => true];
		}
		catch(\Exception $ex)
		{
			return ["result" => false, "msg" => $ex->getMessage()];
		}

	}

	public function login()
	{
		Validator::make(request()->all(),[
			'email' => 'required|exists:users',
			'password' => 'required'
			])->validate();

		if(!Auth::attempt(['email' => request()->email, 'password' => request()->password]))
			return ['result' => false, 'msg' => 'Bad Credentials'];
		else
			return ["result" =>true, "role" => Auth::user()->user_type_id];

	}

	public function logout(){
        request()->session()->flush();
		Auth::logout();
		return redirect()->route('home');
	}
}
