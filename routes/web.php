<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanarController;
use App\Http\Controllers\TanuloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KerdesekController;
use App\Http\Controllers\KolisTanuloController;
use App\Http\Controllers\KulsoAdatokController;
use App\Http\Controllers\AktualiKitoltesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.kezdolap');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('pages.kezdolap');
})->name('kezdolap');

Route::get('felmeres', function () {
    return view('pages.felmeres');
})->name('felmeres');

Route::get('elerhetoseg', function () {
    return view('pages.elerhetoseg');
})->name('elerhetoseg');

Route::get('adatkezeles', function () {
    return view('pages.adatkezeles');
})->name('adatkezeles');

//fejlesztési oldalak
Route::get('fejlesztes', function(){
    return view('pages.fejlesztes');
})->name('fejlesztes');

// Különlegességek:
//kitöltött minden kérdést
Route::get('vege', function () {
    return view('pages.tanulok.vege');
})->name('vege');

//Nincs megadott OM-es és születési éves tanulo
Route::get('nincs', function () {
    return view('pages.tanulok.nincs');
})->name('nincs');

//anomalia a pontozasi adatokban(<0 vagy >4 vagy nem megfelelő lapon pontoz pl: módosit a linken vagy visszamutató nyilat alkalmaz és ismét rögziti az adatokat)
Route::get('anomalia', function () {
    return view('pages.tanulok.anomalia');
})->name('anomalia');


//---------------------------------------------------------------------------------------
//tanuloi routok
Route::get('tanulobejelentkezes', [TanuloController::class, 'bejelentkezes'])->name('tanulobejelentkezes');
Route::post('tajekoztato', [TanuloController::class, 'tajekoztato'])->name('tajekoztato');
Route::get('kerdoiv/{om}/{kerdesszam}', [TanuloController::class, 'kerdoiv'])->name('kerdoiv');
Route::post('kerdoiv/{om}/{kerdesszam}', [TanuloController::class, 'rogzites'])->name('rogzites');

//kolistanuloi routok
Route::get('kolitanulobejelentkezes', [KolisTanuloController::class, 'bejelentkezes'])->name('kolitanulobejelentkezes');
Route::post('kolitajekoztato', [KolisTanuloController::class, 'tajekoztato'])->name('kolitajekoztato');
Route::get('kolikerdoiv/{om}/{kerdesszam}', [KolisTanuloController::class, 'kerdoiv'])->name('kolikerdoiv');
Route::post('kolikerdoiv/{om}/{kerdesszam}', [KolisTanuloController::class, 'rogzites'])->name('kolirogzites');

//-------------------------------------------------


//az adatok megjelenitése
Route::get('tanarok2', [TanarController::class, 'tanaroklekerdezese'])->name('tanaroklekerdezese')->middleware(['auth', 'verified']);
Route::get('tanarok3', [TanarController::class, 'tanaroklekerdezese3'])->name('tanaroklekerdezese3')->middleware(['auth', 'verified']);
Route::post('tanarok/adatok3', [TanarController::class, 'adatok3'])->name('adatok3')->middleware(['auth', 'verified']);
Route::post('tanarok/adatok2', [TanarController::class, 'adatok2'])->name('adatok2')->middleware(['auth', 'verified']);
//Route::get('tanarok/adatok2', [TanarController::class, 'adatok2'])->name('adatok2pdf');
Route::post('tanarok/adatokkoli', [TanarController::class, 'adatokkoli'])->name('adatokkoli')->middleware(['auth', 'verified']);


//eredmenyek megjeleninése
Route::get('tanarok/aktualiskitoltes', [AktualiKitoltesController::class, 'index'])->name('aktualiskitoltes')->middleware(['auth', 'verified']);
Route::get('tanarok/aktualiskitoltes/osztaly', [AktualiKitoltesController::class, 'osztalyvalaszto'])->name('osztalyvalaszto')->middleware(['auth', 'verified']);
Route::post('tanarok/aktualiskitoltes/osztaly', [AktualiKitoltesController::class, 'osztalytagjai'])->name('osztalytagjai')->middleware(['auth', 'verified']);





//------------------------------------------------------------
//Kérdések szerkesztése
Route::get('/kerdesek', [KerdesekController::class, 'index'])->name('kerdesek')->middleware(['auth', 'verified']);
Route::get('/kerdesek/{id}/edit', [KerdesekController::class, 'edit'])->name('kerdesszerkesztes')->middleware(['auth', 'verified']);
Route::patch('/kerdesek/{id}', [KerdesekController::class, 'update'])->name('kerdesfelüliras')->middleware(['auth', 'verified']);


//--------------------------
//adatimportálás

Route::get('kulsoadatok', [KulsoAdatokController::class,'index'])->name('kulsoadatok')->middleware(['auth', 'verified']);;
Route::get('kulsoadatokexport', [KulsoAdatokController::class ,'export'])->name('kulsoadatokexport')->middleware(['auth', 'verified']);;
Route::post('kulsoadatok-import', [KulsoAdatokController::class, 'import'])->name('kulsoadatok.import')->middleware(['auth', 'verified']);;


//---------------------------------------------
//Adattábla (válaszok) tartalmának törlése
Route::get('adattorles', function (){
    DB::table('valaszok')->truncate();
    return view('pages.kezdolap');
})->name('adattorles')->middleware(['auth', 'verified']);
