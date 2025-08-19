<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BelajarController extends Controller
{
     public function index()
     {
        $users = User::orderBy('id', 'desc')->get();
        return view('belajar', compact('users'));
     }


     public function getCallName()
     {
        return $this->callName();
     }


public function tambah()
    {
        return view('tambah');
    }
public function kurang()
    {
        return view('kurang');
    }
public function bagi()
    {
        return view('bagi');
    }
public function kali()
    {
        return view('kali');
    }

public function storeTambah(Request $request)
    {
        $angka1 = $request->angka1;
        // $angka2 = $request->angka2;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 + $angka2;
        // $data['jumlah'] = $jumlah;
        // return view('tambah', $data);
        return view('tambah', compact('jumlah'));
    }
public function storeKurang(Request $request)
    {
        $angka1 = $request->angka1;
        // $angka2 = $request->angka2;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 - $angka2;
        // $data['jumlah'] = $jumlah;
        // return view('tambah', $data);

        return view('kurang', compact('jumlah'));

    }
public function storeBagi(Request $request)
    {
        $angka1 = $request->angka1;
        // $angka2 = $request->angka2;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 / $angka2;
        // $data['jumlah'] = $jumlah;
        // return view('tambah', $data);

        return view('bagi', compact('jumlah'));

    }
public function storeKali(Request $request)
    {
        $angka1 = $request->angka1;
        // $angka2 = $request->angka2;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 * $angka2;
        // $data['jumlah'] = $jumlah;
        // return view('tambah', $data);

        return view('kali', compact('jumlah'));
    }
}


