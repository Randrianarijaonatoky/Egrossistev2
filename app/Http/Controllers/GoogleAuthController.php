<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


use GuzzleHttp\Client as GuzzleClient;

class GoogleAuthController extends Controller
{
    //

    // public function redirectGoogle()
    // {
    //     // return Socialite::driver('google')->with(['verify' => false])->redirect();



    //     // Configure Socialite pour utiliser un client HTTP personnalisé
    //     $client = new GuzzleClient(['verify' => false]);

    //     // Redirige l'utilisateur vers Google pour l'authentification en utilisant le client personnalisé
    //     return Socialite::driver('google')->setHttpClient($client)->redirect();
    // }

    public function redirectGoogle()
    {
        // Configure Socialite pour utiliser un client HTTP personnalisé avec la désactivation de la vérification SSL
        $client = new GuzzleClient(['verify' => false]);

        // Redirige l'utilisateur vers Google pour l'authentification en utilisant le client personnalisé
        return Socialite::driver('google')->setHttpClient($client)->redirect();


    }


    public function callBackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'statut' => 'user'

                ]);
                Auth::login($new_user);

                return redirect()->route('home');
            } else {
                Auth::login($user);
                return redirect()->route('home');
            }
        } catch (\Throwable $th) {
            //throw $th;

            dd('Il y a une erreur sur ' . $th->getMessage());
        }
    }
}
