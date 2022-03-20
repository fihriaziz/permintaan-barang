<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function permintaan(Request $request)
    {
        // dd($request->kuantiti[0]);
        foreach($request->barang as $key => $barang){
            // dd($barang);
            $data = Barang::find($barang);
            $data->stok = $data->stok - $request->kuantiti[$key];
            $data->save();

            Permintaan::create([
                'user_id' => $request->nik,
                'barang_id' => $barang,
                'kuantiti' => $request->kuantiti[$key],
                'tgl_permintaan' => $request->tanggal
            ]);
        }

        return to_route('list');
    }

    public function addPermintaan()
    {
        $users = User::all();
        return view('barang.add-permintaan', compact('users'));
    }

    public function listPermintaan()
    {

        $permintaans = Permintaan::with(['user','barang'])->paginate(10);
        return view('barang.list-permintaan', compact('permintaans'));
    }
}
