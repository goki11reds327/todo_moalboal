<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ToBuy;

class ToBuyController extends Controller
{
    //
    public function showToBuyPage()
    {
        $toBuys = ToBuy::latest()->get();
        dd($toBuys);

        return view('toBuy', ['toBuys' => $toBuys]);
    }

    public function postToBuy(Request $request)
    {
        $validator = $request->validate([
            'ingredient' => ['required', 'string', 'max:30'],
            'amount' => ['required', 'string', 'max:3'],
            'place' => ['required', 'string', 'max:30'],
            'item_image' => ['string']
            
        ]);
        // dd($request);
        ToBuy::create([
            'ingredient' => $request->ingredient, 
            'amount' => $request->amount,
            'place' => $request->place,
            'item_image' => $request->item_image
        ]);

        return back();
    }

    public function destroy($id)
    {
        // dd($id);
        $toBuy = ToBuy::find($id);
        // dd($tweet);
        $toBuy->delete();

        return redirect()->route('toBuy');
    }
}
