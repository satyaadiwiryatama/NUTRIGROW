<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function beranda()
    {
        return view('beranda', ['cards' => config('edukasi.cards'), 'goals' => config('edukasi.goals')]);
    }

    public function hamil()
    {
        return view('plate', ['d' => config('edukasi.hamil'), 'title' => 'Isi Piringku Ibu Hamil', 'img' => 'hamil.jpg']);
    }

    public function menyusui()
    {
        return view('plate', ['d' => config('edukasi.menyusui'), 'title' => 'Isi Piringku Ibu Menyusui', 'img' => 'susu.jpg']);
    }

    public function mpasi(string $usia = '6-8')
    {
        $all = config('edukasi.mpasi');
        abort_unless(isset($all[$usia]), 404);

        return view('mpasi', ['all' => $all, 'usia' => $usia, 'm' => $all[$usia]]);
    }

    public function about()
    {
        return view('about', ['people' => config('edukasi.people')]);
    }
}
