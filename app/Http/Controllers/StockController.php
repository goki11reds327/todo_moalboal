<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $stocks = Stock::all();
    return view('stock.index',['stocks'=>$stocks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->category);
        $stock = new Stock;  //データベースに保存
        $stock -> あまりもの = $request->title;
        if($request->category == 1) {
            $stock->is_meat = true;
        } else {
            $stock->is_fruit = true;
        }
        $stock   -> save();

        return redirect()->route('stock.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete(); // レコードを削除
        return response()->json(['message' => 'Stock item deleted successfully.']);
    }
}
