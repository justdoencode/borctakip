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
    return view('welcome');
});

Route::get('/home',[BorcController::class,'home'])->name('home');

Route::get('/borcluekle',[BorcController::class,'borcluEkle'])->name('borcluekle');



//VeritabaniController
Route::post('/borcluekle',[VeritabaniController::class,'borcluEkle'])->name('borcluekle');//Borçlu Ekle Sayfasında Borçlu Eklemek

Route::get('/borceklepage',[VeritabaniController::class,'borcEklePage'])->name('borceklepage');//Borç Ekle Sayfasına Borçluları Taşıyor

Route::post('/borcekle',[VeritabaniController::class,'borcEkle'])->name('borcekle');//Veritabanına Borç Ekleme İşlemi

Route::get('/borclarpage',[VeritabaniController::class,'borclarPage'])->name('borclarpage');//Veritabanından Borçları Çekerek Listeliyor

Route::get('/borcsil/{id}',[VeritabaniController::class,'borcSil'])->name('borcsil');//Borç Silmek İçin

Route::get('/borclularpage',[VeritabaniController::class,'borclularPage'])->name('borclularpage');//Borçlular Sayfasına Gitme ve Listeleme

Route::get('/borclusil/{id}',[VeritabaniController::class,'borcluSil'])->name('borclusil');//Borçlu Silmek İçin
