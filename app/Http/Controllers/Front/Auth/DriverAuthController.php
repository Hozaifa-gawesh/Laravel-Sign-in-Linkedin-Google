<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class DriverAuthController extends GeneralController
{

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    /**
     * Check If Driver Existing
     * @param $driver
     * @return bool
     */
    private function checkDriver($driver)
    {
        return in_array($driver, $this->model->drivers) ? true : false;
    }


    /**
     * Send request to driver
     * @param $driver
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function sendRequestDriver($driver)
    {
        // Check if driver existing in an array
        if (!$this->checkDriver($driver)) return back()->withErrors('The driver does not exist.');
        // Send request to driver
        return Socialite::driver($driver)->redirect();
    }


    /**
     * Login Or Register User
     * @param $driver
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleCallback($driver)
    {
        // Check if driver existing in an array
        if (!$this->checkDriver($driver)) return redirect(route('login'))->withErrors('The driver does not exist.');
        try {
            $user = Socialite::driver($driver)->user();
            // Find User By Social ID
            $findUser = $this->model->where('email', $user->email)->orWhere('social_id', $user->id)->first();
            // If user Returned
            if ($findUser) {
                // Login User By Returned Data
                Auth::login($findUser);
                return redirect($this->redirectTo);

            } else {
                // Login User By New User Data
                Auth::login($this->newUser($user, $driver));
                return redirect($this->redirectTo);
            }
        } catch (\Exception $e) {
            return redirect(route('login'))->withErrors($e->getMessage());
        }
    }


    /**
     * Store User in DB
     * @param $user
     * @param $driver
     * @return mixed
     */
    private function newUser($user, $driver) {
        $userInfo = [
            'email' => $user->email,
            'password' => bcrypt(mt_rand(100000, 999999)),
            'social_id'=> $user->id,
            'social_type'=> $driver,
            'first_name' => $user->first_name ?? null,
            'last_name' => $user->last_name ?? null,
        ];
        // Set First Name & Last Name When Driver Equal Google
        if($driver == 'google') {
            $userInfo['first_name'] = $user->user['given_name'];
            $userInfo['last_name'] = $user->user['family_name'];
        }
        // Create a New User
        return $this->model->create($userInfo);
    }

}
