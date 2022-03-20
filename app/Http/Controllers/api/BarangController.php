<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function getDataNik(Request $request)
    {
        $data = User::find($request->id);
        return response($data);
    }

    public function getBarangs()
    {
        $barangs = Barang::all();
        return response($barangs);
    }

    public function getBarangById(Request $req)
    {
        $barang = Barang::find($req->id);
        return response($barang);
    }
}
