<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\{Categorie, User,Produit};

use Session;
// Use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function singup (Request $req){
        $this->validate($req, [
            'pseudo' => 'required',
            'email' => 'required | email',
            'pwd' => 'required',
            'pwdConf' => 'required',
            "pdp" => "required | mimes:jpg,png,gif",




        ]);

        if($req->hasFile("pdp")){
            $image = $req->file("pdp");
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('imageUser',$imagename,"public");
            // storeage/public/imageUser/02022024.jpg
        }

        $pwd = $req->input("pwd");
        $pwdConf = $req->input("pwdConf");

        $user = new User();

        if ($pwd === $pwdConf) {
            $user->name = $req->input("pseudo");
            $user->email = $req->input('email');
            $user->password = password_hash($req->input("pwd"),PASSWORD_DEFAULT);
            $user->statut = 'user';
            $user->pdp = $imagename;
            $user->save();
            return redirect()->Route('connexion');
        }else{
            $error = "Mot de passe non identique";
            return back()->with("error",$error);
        }

    }

    // public function login(Request $request) {
    //     $this->validate($request, [
    //         'email' => 'required',
    //         'pwd' => 'required',
    //     ]);
    //     $user = User::where("email",$request->input("email"))->first();

    //     if($user){
    //         if (password_verify($request->input("pwd"),$user->password)) {
    //             Session::put('user',$user);
    //             Auth::login($user);

    //             if ($user->statut === "user") {
    //                 return redirect()->route("home")->with('success','Bienvenue sur Grossiste Store');
    //             }elseif($user->statut === "admin"){
    //                 return redirect()->route("dashboard")->with('success', 'Bienvenue sur votre tableau de bord');
    //             }
    //         }else{
    //             return back()->with("errors","mot de passe inccorecte");
    //         }
    //     }else{
    //         return back()->with("errors","vous n'avez pas une compte");
    //     }

    // }

    public function login(Request $request) {
        // Validation des champs
        $request->validate([
            'email' => 'required|email', // Valider que l'email est requis et a un format correct
            'pwd' => 'required' // Valider que le mot de passe est requis
        ]);

        // Récupérer l'utilisateur par email
        $user = User::where("email", $request->input("email"))->first();

        // Vérifier si l'utilisateur existe
        if ($user) {
            // Vérifier si le mot de passe est correct
            if (password_verify($request->input("pwd"), $user->password)) {
                // Connecter l'utilisateur et démarrer la session
                Session::put('user', $user);
                Auth::login($user);

                // Rediriger l'utilisateur en fonction de son statut
                if ($user->statut === "user") {
                    return redirect()->route("home")->with('success', 'Bienvenue sur Grossiste Store');
                } elseif ($user->statut === "admin") {
                    return redirect()->route("dashboard")->with('success', 'Bienvenue sur votre tableau de bord');
                }
            } else {
                // Mot de passe incorrect
                return back()->withErrors(['error' => 'Mot de passe incorrect.']);
            }
        } else {
            // L'utilisateur n'existe pas
            return back()->withErrors(['error' => "Vous n'avez pas de compte avec cet email."]);
        }
    }



    public function logout(){
        Session::forget("user");
        Session::forget('cart');
        Auth::logout();
        return redirect()->Route("connexion");
    }

    public function deleteUser($id) {
        $user = User::FindOrFail($id);
        // dd($user);

        $user->delete();
        return back()->with('success', "L'utilisateur  à été effacer");
    }

    public function sendMail(Request $request ) {
        $this->validate($request, [
            "email" => 'required | email',
            "message" => 'required'
        ]);

        // Vérifier si l'utilisateur est authentifié
        // if (auth()->check()) {
        //     // $user = auth()->user();
        //     // $pseudo = $user->name; // ou $user->pseudo, en fonction du champ dans votre modèle User
        //     $userName = Session::get('user')->name;
        //     dd($userName);
        // } else {
            //     $userName = 'Utilisateur non authentifié';
            // }
        $userName = Session::get('user')->name;
        // dd($userName);

        $to = "tokyrandria36@gmail.com";
        $titre = 'Nouveau message';
        $content = 'Message de ' . $userName;
        $message = $request->input('message');
        // dd($message);
        Mail::to($to)->send(new SendMail($titre,$content,$message));

        return back()->with('success', 'votre message à été envoyer');

    }

    public function modificationUser(Request $request, $id){
        $this->validate($request, [
            ''
        ]);
    }

    public function recherche(Request $request) {
        $this->validate($request, [
            'recherche' => 'required',
        ]);
        $categories = Categorie::get();
        $cart = Session::get('cart');
        // dd($cart);

        $key = $request->input('recherche');

        $produits = Produit::whereAny(
            ['id', 'nom', 'prixPromotion' ], "LIKE", "%{$key}%")->get();

        return view("produits", compact('produits', 'categories', 'cart'));


    }
}
