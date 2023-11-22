<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodstawowyKontroler;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [PodstawowyKontroler::class,'zwrocStroneDomowa']);
Route::get('/ksiazki', [PodstawowyKontroler::class,'zwrocListeKsiazek']);
Route::get('/kategorie', [PodstawowyKontroler::class,'zwrocListeKategorii']);
Route::get('/wydawnictwa', [PodstawowyKontroler::class,'zwrocListeWydawnictw']);

Route::get('/dodaj_ksiazke', [PodstawowyKontroler::class,'zwrocDodajKsiazke']);
Route::post('/dodaj_ksiazke', [PodstawowyKontroler::class,'dodajKsiazke']);

Route::get('/dodaj_kategorie', [PodstawowyKontroler::class,'zwrocDodajKategorie']);
Route::post('/dodaj_kategorie', [PodstawowyKontroler::class,'dodajKategorie']);

Route::get('/dodaj_wydawnictwo', [PodstawowyKontroler::class,'zwrocDodajWydawnictwo']);
Route::post('/dodaj_wydawnictwo', [PodstawowyKontroler::class,'dodajWydawnictwo']);

Route::get('/usun_ksiazke', [PodstawowyKontroler::class,'zwrocUsunKsiazke']);
Route::post('/usun_ksiazke', [PodstawowyKontroler::class,'usunKsiazke']);

Route::get('/usun_kategorie', [PodstawowyKontroler::class,'zwrocUsunKategorie']);
Route::post('/usun_kategorie', [PodstawowyKontroler::class,'usunKategorie']);

Route::get('/usun_wydawnictwo', [PodstawowyKontroler::class,'zwrocUsunWydawnictwo']);
Route::post('/usun_wydawnictwo', [PodstawowyKontroler::class,'usunWydawnictwo']);
