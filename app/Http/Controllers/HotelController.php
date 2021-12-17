<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function show(Hotel $hotel){
        return view('hotel',[
            'data' => $hotel,
            'images' => json_decode($hotel->images),
            'rooms' => DB::table('rooms')->where('hotel_id', $hotel->id)->get(),
            'reviews' =>DB::table('reviews')->where('hotel_id', $hotel->id)
                        ->join('users', 'users.id', '=', 'reviews.author_id')
                        ->get(),
            'myHotelRating' => DB::table('reviews')
                        ->select(DB::raw('avg(rate) as rating, count(*) as banyak'))
                        ->where('hotel_id', '=', $hotel->id)
                        ->get(),            
        ]);
    }

    public function addReview(Hotel $hotel, Request $request){
        $validated = $request->validate([
            'rate' => 'required|integer',
            'review' => 'required',           
        ]);

        DB::table('reviews')
            ->updateOrInsert(
                [   'hotel_id' => $hotel->id, 
                    'author_id'=> Auth::id()
                ],
                [   'rate' => $validated['rate'],
                    'text' => $validated['review'],
                ]
            );
        

            return back()->with('success','Tambah Data Berhasil !');
    }

}
