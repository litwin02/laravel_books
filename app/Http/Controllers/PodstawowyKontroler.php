<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PodstawowyKontroler extends Controller
{
    public function zwrocStroneDomowa()
    {
        return view('domowa');
    }
    public function zwrocListeKsiazek()
    {
        $ksiazkiZBazy = DB::table('ksiazka')->leftJoin('kategoria',
        'ksiazka.idkat', '=', 'kategoria.id') -> get();
        return view('lista_ksiazek', ['ksiazki' => $ksiazkiZBazy,]);
    }
    public function zwrocListeKategorii(){
        $kategorieZBazy = DB::table('kategoria')-> get();
        return view('lista_kategorii', ['kategorie' => $kategorieZBazy,]);
    }
    public function zwrocListeWydawnictw(){
        $wydawnictwaZBazy = DB::table('wydawnictwo')-> get();
        return view('lista_wydawnictw', ['wydawnictwa' => $wydawnictwaZBazy,]);
    }



    public function zwrocDodajKsiazke(){
        $kategorieZBazy = DB::table('kategoria')-> get();
        $wydawnictwaZBazy = DB::table('wydawnictwo')-> get();
        return view('dodaj_ksiazke', ['kategorie' => $kategorieZBazy, 'wydawnictwa' => $wydawnictwaZBazy,]);
    }
    public function dodajKsiazke(Request $request){
        $validated = $request->validate([
            'tytul' => 'required|min:3|max:50',
            'idkat' => 'required|integer',
            'idwyd' => 'required|integer',
        ]);
        if($validated){
            $tytulZFormularza = $request->tytul;
            $idKategoriiZFormularza = $request->idkat;
            $idWydawnictwaZFormularza = $request->idwyd;
            DB::table('ksiazka')->insert([
            'tytul' => $tytulZFormularza,
            'idkat' => intval($idKategoriiZFormularza),
            'idwyd' => intval($idWydawnictwaZFormularza),
            ]);
            return redirect('/ksiazki');
        }
        else{
            return redirect('/dodaj_ksiazke');
        }
    }

    public function zwrocDodajKategorie(){
        return view('dodaj_kategorie');
    }
    public function dodajKategorie(Request $request){
        $validated = $request->validate([
            'opis' => 'required|min:3|max:50',
        ]);
        if($validated){
            $nazwaZFormularza = $request->opis;
            DB::table('kategoria')->insert([
            'opis' => $nazwaZFormularza,
            ]);
            return redirect('/kategorie');
        }
        else{
            return redirect('/dodaj_kategorie');
        }
    }
    
    public function zwrocDodajWydawnictwo(){
        return view('dodaj_wydawnictwo');
    }
    public function dodajWydawnictwo(Request $request){
        $validated = $request->validate([
            'nazwa' => 'required|min:3|max:50',
            'adres' => 'required|min:3|max:50',
        ]);
        if($validated){
            $nazwaZFormularza = $request->nazwa;
            $adresZFormularza = $request->adres;
            DB::table('wydawnictwo')->insert([
            'nazwa' => $nazwaZFormularza,
            'adres' => $adresZFormularza,
            ]);
            return redirect('/wydawnictwa');
        }
        else{
            return redirect('/dodaj_wydawnictwo');
        }
    }



    public function zwrocUsunKsiazke(){
        $ksiazkiZBazy = DB::table('ksiazka')-> get();
        return view('/usun_ksiazke', ['ksiazki' => $ksiazkiZBazy,]);
    }
    public function usunKsiazke(Request $request){
        $idKsiazki = $request->idk;
        $deleted = DB::table('ksiazka')->where('id', $idKsiazki)->delete();
        if ($deleted) {
            return redirect('/ksiazki');
        }   
        else {  
            $errors = DB::table('ksiazka')->where('id', $idKsiazki)->delete();
            dd($errors);
        }
    }

    public function zwrocUsunKategorie(){
        $kategorieZBazy = DB::table('kategoria')-> get();
        return view('/usun_kategorie', ['kategorie' => $kategorieZBazy,]);
    }
    public function usunKategorie(Request $request){
        $idKategorii = $request->idkat;
        $deleted = DB::table('kategoria')->where('id', $idKategorii)->delete();
        if ($deleted) {
            return redirect('/kategorie');
        }   
        else {  
            $errors = DB::table('kategoria')->where('id', $idKategorii)->delete();
            dd($errors);
        }
    }

    public function zwrocUsunWydawnictwo(){
        $wydawnictwaZBazy = DB::table('wydawnictwo')-> get();
        return view('/usun_wydawnictwo', ['wydawnictwa' => $wydawnictwaZBazy,]);
    }
    public function usunWydawnictwo(Request $request){
        $idWydawnictwa = $request->idw;
        $deleted = DB::table('wydawnictwo')->where('id', $idWydawnictwa)->delete();
        if ($deleted) {
            return redirect('/wydawnictwa');
        }   
        else {  
            $errors = DB::table('wydawnictwo')->where('id', $idWydawnictwa)->delete();
            dd($errors);
        }
    }

    

    public function zmienStanUwierzytelnienia()
    {
        if(auth()->check()){
            $user = auth()->user();
            Auth::logout();
            return view('logout');
        }
        else{
            return redirect('/register');
        }
    }
}
