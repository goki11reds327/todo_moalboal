<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buy;

class BuyController extends Controller
{
    //
    function index()
{
    $buys = Buy::all();
    return view('buy.index',['buys'=>$buys]);
}

    public function store(Request $request)
    {
        $buy = new Buy;
        $validator = $request->validate([
            'ingredient' => ['required', 'string', 'max:30'],
            'amount' => ['required', 'string', 'max:10'],
            'place' => ['required', 'string', 'max:30'],
            'who_buy' => ['required', 'string', 'max:10']
            // 'item_image' => ['string']
            
        ]);

        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = $image->getClientOriginalName();
            // $image->storeAs('images', $imageName, 'public/img');
            $image->storeAs('public/img', $imageName);
            $buy -> item_image = $imageName;
        }
        // dd($request);
        // Buy::create([
        //     'ingredient' => $request->ingredient, 
        //     'amount' => $request->amount,
        //     'place' => $request->place,
        //     'who_buy' => $request->who_buy,
        //     'item_image' => $request->item_image
        // ]);

        $buy -> ingredient = $request -> ingredient;
        $buy -> amount = $request -> amount;
        $buy -> place = $request -> place;
        $buy -> who_buy = $request -> who_buy;

        $buy -> save();


        return redirect()->route('buy.index');
    }

    public function destroy($id)
    {
        // dd($id);
        $buy = Buy::find($id);
        // dd($tweet);
        $buy->delete();

        return redirect()->route('buy.index');
    }
}
