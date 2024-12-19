<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function redirectToProvider(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::query()->where('gauth_id', $user->id)->first();
            $existUser = User::query()->where('email', $user->email)->first();

            if (!$finduser && $existUser){
                $existUser->update([
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',
                ]);
            }

            if ($finduser || $existUser) {
                $user = $finduser ?? $existUser;
                Auth::login($user);
            } else {
                $role = Role::query()->where('nama', 'User')->firstOrFail();

                $newUser = User::query()->create([
                    'name' => $user->name,
                    'username' => str_replace(' ', '', $user->name) . Str::random(3),
                    'email' => $user->email,
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',
                    'password' => encrypt('admin@123'),
                    'alamat' => 'Indonesia',
                    'role_id' => $role->id,
                    'paket_id' => 1
                ]);

                Auth::login($newUser);
            }
            return redirect('/');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
