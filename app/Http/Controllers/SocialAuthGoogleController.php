<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialGoogleAccountService;
use Illuminate\Support\Facades\DB;

class SocialAuthGoogleController extends Controller
{
    /**
   * Create a redirect method to google api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callback(SocialGoogleAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user());
        auth()->login($user);
        session(['event' => DB::table('events')->where('active', 1)->first()->id]);
        session(['alliance' => 'red']);
        session(['inputtype' => 'field']);
        session(['orientation' => 'redright']);
        return redirect()->to('/home');
    }
}
