<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenProdukController extends Controller
{
    public function index()
    {
        return view('manajemen-produk'); 
    }
}
