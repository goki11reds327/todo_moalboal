<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buy;
use App\Models\Menu;

class BuyController extends Controller
{
    //
    function index($menu_id)
{
    // dd($menu_id);
    $buys = Buy::where('menu_id', $menu_id)->get();
    $menu = Menu::where('id', $menu_id)->first();
    // dd($menu);
    return view('buy.index',['buys'=>$buys, 'menu' => $menu]);
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'edited_ingredient' => 'required|string|max:30',
            'edited_amount' => 'required|string|max:10',
            'edited_place' => 'required|string|max:30',
            'edited_who_buy' => 'required|string|max:10',
        ]);

        $buy = Buy::findOrFail($id);
        $buy->update([
            'ingredient' => $request->input('edited_ingredient'),
            'amount' => $request->input('edited_amount'),
            'place' => $request->input('edited_place'),
            'who_buy' => $request->input('edited_who_buy'),
        ]);

        return redirect()->route('buy.index')->with('success','更新したで');
    }
}
