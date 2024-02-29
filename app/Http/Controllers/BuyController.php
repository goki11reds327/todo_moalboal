<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buy;
use App\Models\Menu;
use App\Models\Stock;


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

    // public function store(Request $request)
    // {
    //     $buy = new Buy;
    //     $validator = $request->validate([
    //         'ingredient' => ['required', 'string', 'max:30'],
    //         'amount' => ['required', 'string', 'max:10'],
    //         'place' => ['required', 'string', 'max:30'],
    //         'who_buy' => ['required', 'string', 'max:10']
    //         // 'item_image' => ['string']
            
    //     ]);

    //     if ($request->hasFile('item_image')) {
    //         $image = $request->file('item_image');
    //         $imageName = $image->getClientOriginalName();
    //         // $image->storeAs('images', $imageName, 'public/img');
    //         $image->storeAs('public/img', $imageName);
    //         $buy -> item_image = $imageName;
    //     }
    //     $ingredient = $request->input('ingredient');
    //      $existingStock = Stock::where('あまりもの', $ingredient)->first();

    //      $existingBuy = Buy::where('ingredient', $ingredient)->first();
 
    //      if ($existingStock || $existingBuy) {
    //          $confirmationMessage = 'This ingredient already exists. Are you sure you want to buy more?';
    //          return redirect()->back()->with('confirmation', $confirmationMessage);
    //      }

    //     $userConfirmation = $request->input('user_confirmation');
    //     if ($userConfirmation === 'yes') {
    //         $buy -> ingredient = $ingredient;
    //             $buy -> amount = $request -> amount;
    //             $buy -> place = $request -> place;
    //             $buy -> who_buy = $request -> who_buy;


            
            
    
    //         $buy -> save();
    //         $successMessage = 'Ingredient added successfully.';
    //         return redirect()->route('buy.index')->with('success', $successMessage);
    //     }
    //     return redirect()->back();
    // }

    public function store(Request $request)
{
    // dd('test');
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
        $image->storeAs('public/img', $imageName);
        $buy->item_image = $imageName;
    }

    $ingredient = $request->input('ingredient');
    // $existingStock = Stock::where('あまりもの', $ingredient)->first();
    // $existingBuy = Buy::where('ingredient', $ingredient)->first();

    // if ($existingStock || $existingBuy) {
    //     $confirmationMessage = 'This ingredient already exists. Are you sure you want to buy more?';
    //     return redirect()->back()->with([
    //         'confirmation' => $confirmationMessage,
    //         'ingredient' => $ingredient,  // Pass the ingredient back to the form
    //     ]);
    // }

    // $userConfirmation = $request->input('user_confirmation');
    // if ($userConfirmation === 'yes') {
        // Retrieve the ingredient from the session
        // $ingredientFromSession = session('ingredient');

        // if ($ingredientFromSession === $ingredient) {
            $buy->ingredient = $ingredient;
            $buy->amount = $request->amount;
            $buy->place = $request->place;
            $buy->who_buy = $request->who_buy;

            $buy->save();
    //         $successMessage = 'Ingredient added successfully.';
    //         return redirect()->route('buy.index')->with('success', $successMessage);
    //     }
    // }

    return redirect()->back();
}

    public function getIngredient(Request $request) {
        $value = null;
        $ingredient = $request->input('ingredient');
        $existingStock = Stock::where('あまりもの', $ingredient)->first();
        $existingBuy = Buy::where('ingredient', $ingredient)->first();


        if ($existingStock || $existingBuy) {
            $value = 1;
        } else $value = 0;

        return $value;

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

         return back();
        return redirect()->route('buy.index')->with('success','更新したで');
    }
}

// function store(Request $request)
// {
//     // Buyテーブルでの重複チェック
//     $existingBuy = Buy::where('ingredient', $request->ingredient)->first();
//     if ($existingBuy) {
//         return redirect()->route('buy.index')->with('error', '同じアイテムがすでに存在します。');
//     }

//     // Stockテーブルでの重複チェック
//     $existingStock = Stock::where('ingredient', $request->ingredient)->first();
//     if ($existingStock) {
//         return redirect()->route('buy.index')->with('error', '同じアイテムがStockに既に存在します。');
//     }

//     // 通常の処理を続行
//     // ...

//     return redirect()->route('buy.index')->with('success', 'アイテムが正常に追加されました。');
// }




