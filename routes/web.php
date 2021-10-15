<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorcController;
use App\Http\Controllers\VeritabaniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});



//BorcController
Route::get('/home',[BorcController::class,'home'])->name('home');

Route::get('/borclueklepage',[BorcController::class,'borcluEklePage'])->name('borclueklepage');

Route::get('/paraturueklepage',[BorcController::class,'paraTuruEklePage'])->name('paraturueklepage');





//VeritabaniController
Route::post('/borcluekle',[VeritabaniController::class,'borcluEkle'])->name('borcluekle');//Borçlu Ekle Sayfasında Borçlu Eklemek

Route::get('/borceklepage',[VeritabaniController::class,'borcEklePage'])->name('borceklepage');//Borç Ekle Sayfasına Borçluları Taşıyor

Route::post('/borcekle',[VeritabaniController::class,'borcEkle'])->name('borcekle');//Veritabanına Borç Ekleme İşlemi

Route::get('/borclarpage',[VeritabaniController::class,'borclarPage'])->name('borclarpage');//Veritabanından Borçları Çekerek Listeliyor

Route::get('/borcsil/{borc_id}',[VeritabaniController::class,'borcSil'])->name('borcsil');//Borç Silmek İçin

Route::get('/borclularpage',[VeritabaniController::class,'borclularPage'])->name('borclularpage');//Borçlular Sayfasına Gitme ve Listeleme

Route::post('/paraturuekle}',[VeritabaniController::class,'paraTuruEkle'])->name('paraturuekle');//Para Türü Eklemek İçin

Route::get('/borclusil/{borclu_id}}',[VeritabaniController::class,'borcluSil'])->name('borclusil');//Para Türü Eklemek İçin
