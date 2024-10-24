<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController, GetController, ProduitController, StripeController, CommandeController, HeureLivraisonController, CompteuserController, ChatController, GoogleAuthController};

use App\Models\HeureLivraisons;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Nav bar

Route::get('/', [GetController::class, 'home'])->name('home');
Route::get('/produits', [GetController::class, 'produits'])->name('produits');
Route::get('/connexion', [GetController::class, 'connexion'])->name('connexion');
Route::get('/inscription', [GetController::class, 'inscription'])->name('inscription');
Route::get('/contact', [GetController::class, 'contact'])->name('contact');
Route::get('/checkout', [GetController::class, 'checkout'])->name('checkout');

//amdin
Route::controller(GetController::class)->group(function () {



    //panier
    Route::post('/addPanier/{id}', 'addPanier')->name('addPanier');
    Route::delete('/deletePanier/{id}', 'deletePanier')->name('deletePanier');
    Route::get('/ajoutHeure', 'ajoutHeure')->name('ajoutHeure');
});

//UserDashboard
Route::controller(CompteuserController::class)->group(function () {
    Route::get('/dashboardUser', 'dashboardUser')->middleware('auth')->name('dashboardUser');
    Route::get('/commandeUser', 'commandeUser')->middleware('auth')->name('commandeUser');
    Route::get('/userModif', 'userModif')->middleware('auth')->name('userModif');
    Route::get('/coupons', 'showCoupons')->middleware('auth')->name('coupons');
    Route::get('/showNotifUser', 'showNotifUser')->middleware('auth')->name('showNotifUser');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [GetController::class, 'dashboard'])->name('dashboard');
    Route::get('/fiche', [GetController::class, 'fiche'])->name('fiche');
    Route::get('/ajout', [GetController::class, 'ajoutProduit'])->name('ajout');
    Route::get('/payement', [GetController::class, 'payement'])->name('payement');
    Route::get('/ajoutCategorie', [GetController::class, 'ajoutCategorie'])->name('ajoutCategorie');
    Route::get('/lesProduits', [GetController::class, 'lesProduits'])->name('lesProduits');
    Route::get('/utilisateur', [GetController::class, 'utilisateur'])->name('utilisateur');
    Route::get('/modification/{id}', [GetController::class, 'modification'])->name('modification');
    Route::get('/promotion/{id}', [GetController::class, 'promotion'])->name('promotion');
    Route::get('/showCommande/admin', [GetController::class, 'showCommandeAdmin'])->name('showCommandeAdmin');
    Route::get('/notificationAdmin', [GetController::class, 'notificationAdmin'])->name('notificationAdmin');
});



//google
Route::controller(GoogleAuthController::class)->group(function () {
    Route::get('auth/gooogle', 'redirectGoogle')->name('google.auth');
    Route::get('auth/google/call-back', 'callBackGoogle');
});




//connexion et insciption , sendMail , recherche
Route::post('/login', [PostController::class, 'login'])->name('login');
Route::post('/singup', [PostController::class, 'singup'])->name('singup');
Route::get("/logout", [PostController::class, "logout"])->name("logout");

Route::post('/sendMail', [PostController::class, 'SendMail'])->name('SendMail');
Route::get('/recherche', [PostController::class, 'recherche'])->name('recherche');
Route::post('/detail/{id}', [GetController::class, 'detail'])->name('detail');



//ajout categorie et produit , promotion
Route::post('/addCategorie', [ProduitController::class, 'addCategorie'])->name('addCategorie');
Route::post('/addProduit', [ProduitController::class, 'addProduit'])->name('addProduit');

Route::post('/addPromotion', [ProduitController::class, 'addPromotion'])->name('addPromotion');

//delete categorie et produit , user , promotion
Route::delete('/deleteCategorie/{id}', [ProduitController::class, 'deleteCategorie'])->name('deleteCategorie');

Route::delete('/deleteProduit/{id}', [ProduitController::class, 'deleteProduit'])->name('deleteProduit');

Route::delete('/deleteUser/{id}', [PostController::class, 'deleteUser'])->name('deleteUser');

Route::delete('/deletePromotion/{id}', [ProduitController::class, 'deletePromotion'])->name('deletePromotion');


//update produit
Route::put('/updateProduit/{id}', [ProduitController::class, 'update'])->name('updateProduit');

//payer
// Route::post('payer', [StripeController::class, 'payer'])->name('payer');
Route::controller(StripeController::class)->group(function () {

    route::post('payer', 'payer')->name('payer');
    route::get('/invoice/{id}', 'generateInvoice')->name('invoice');
});


Route::get('/facture', [GetController::class, 'facture'])->name('facture');

//affichage facture et download
Route::get('/invoice/{id}', [StripeController::class, 'showInvoice'])->name('invoice');
Route::get('/download-invoice/{id}', [StripeController::class, 'generateInvoice'])->name('generateInvoice');

//heure de livraison

Route::controller(HeureLivraisonController::class)->group(function () {
    route::post('/addTime', 'addTime')->name('addTime');
    route::get('/showHeure', 'showHeure')->name('showHeure');
    route::delete('/deleteHeure/{id}', 'deleteHeure')->name('deleteHeure');
});



// Route::post('/addTime', [HeureLivraisonController::class, 'addTime'])->name('addTime');

//commande
Route::controller(CommandeController::class)->group(function () {
    route::get('/showCommande', 'showCommande');
    route::post('/addCommande', 'addCommande')->name('addCommande');
    Route::post('/annulationCommande/{id}', 'annulationCommande')->name('annulationCommande');

    Route::post('/validerAnnulation/{id}', 'validerAnnulation')->name('validerAnnulation');

    Route::post('/refuserAnnulation/{id}', 'refuserAnnulation')->name('refuserAnnulation');
});




//chat


Route::middleware(['auth'])->group(function () {
    Route::get('/chat/{userId}', [ChatController::class, 'showChat'])->name('showChat');
    // Route::post('/chat/message', [ChatController::class, 'newChat'])->name('newChat');
    Route::post('/chat/{conversationId}/message', [ChatController::class, 'newChat'])->name('newChat');

    Route::post('/chat/start', [ChatController::class, 'startConversation'])->name('startChat');
});
