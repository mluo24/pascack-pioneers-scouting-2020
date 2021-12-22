<?php

namespace App\Services;

use App\SocialGoogleAccount;
use App\User;
use TCG\Voyager\Models\Role as VoyagerRole;
use Laravel\Socialite\Contracts\User as ProviderUser;


class SocialGoogleAccountService {
    
    public function createOrGetUser(ProviderUser $providerUser) {
        
        $account = SocialGoogleAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();
            
        if ($account) {
            return $account->user;
        } 
        
        else {
            
            $account = new SocialGoogleAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);
                    
            $user = User::whereEmail($providerUser->getEmail())->first();
            
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);
                if (substr($user->email, strrpos($user->email, "@") + 1) == "pascack.org") {
                    $newRole = VoyagerRole::where('name', 'scouter')->first();
                    $user->role()->associate($newRole);
                    $user->save();
                  // $acl = 2;
                }
                else {
                    $newRole = VoyagerRole::where('name', 'viewer')->first();
                    $user->role()->associate($newRole);
                    $user->save();
                  // $acl = 3;
                }
                // make roles here
                // voyager probably sets their role automatically so override that here
            }
                        
            $account->user()->associate($user);
            $account->save();
            
                        
            return $user;
        
        }
        
    }

}