<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/menu/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_image' => ['required', 'image', 'max:1024'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user_image = request()->file('user_image')->getClientOriginalName();
        request()->file('user_image')->storeAs('public/img', $user_image);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_image' => $user_image,
            'password' => Hash::make($data['password']),
        ]);
        // $user = new User;
        // if ($data['user_image']) {
        //     $image = $data['user_image'];
        //     $imageName = $image->getClientOriginalName();
        //     $image->storeAs('images', $imageName, 'public/img');
        //     $image->storeAs('public/img', $imageName);
        //     $user -> user_image = $imageName;
        // }
        // $user -> name = $data['name'];
        // $user -> email = $data['email'];
        // $user -> password = $data['password'];

    }
    


}
