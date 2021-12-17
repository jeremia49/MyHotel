<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Room;


class Admin extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function gaddkota(Request $request){
        return view('admin.tambahkota');
    }

    public function paddkota(Request $request){

        $validated = $request->validate([
            'kota' => 'required|unique:App\Models\City,nama|max:255',
        ]);

        $city = new City;
        $city->nama = $validated['kota'];
        $city->save();
        return back()->with('success','Tambah Data Berhasil !');
    }

    public function gaddhotel(Request $request){
        return view('admin.tambahhotel',[
            'cities' => City::all(),
        ]);
    }

    public function paddhotel(Request $request){
        $validated = $request->validate([
            'kota_id' => 'required|exists:App\Models\City,id',
            'nama' => 'required',
            'bintang' => 'required',
            'lokasi' => 'required',
            'telp' => 'required',
            'gmaplink' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',      
            'images' => 'required',
        ]);

        $temp = explode(',', $validated['fasilitas'] );
        $validated['fasilitas'] = json_encode($temp);
        unset($temp);

        $temp = explode(',', $validated['images'] );
        $validated['images'] = json_encode($temp);
        unset($temp);

        $hotel = Hotel::create($validated);
        if($hotel){
            return back()->with('success','Tambah Data Berhasil !');
        }

        return redirect()->back()->with('error','Something went wrong');
    }

    public function gaddroom(Request $request){
        return view('admin.tambahroom',[
            'hotels' => Hotel::all(),
        ]);
    }

    public function paddroom(Request $request){

        $validated = $request->validate([
            'hotel_id' => 'required|exists:App\Models\Hotel,id',
            'nama' => 'required',
            'max_capacity' => 'required',
            'price' => 'required',
            'tamu' => 'required',
            'luas' => 'required',
            'fasilitas' => 'required',
        ]);

        $temp = explode(',', $validated['fasilitas'] );
        $validated['fasilitas'] = json_encode($temp);
        unset($temp);

        $room = Room::create($validated);
        if($room){
            return back()->with('success','Tambah Data Berhasil !');
        }

        return redirect()->back()->with('error','Something went wrong');
    }


}
