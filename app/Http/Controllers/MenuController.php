<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class MenuController extends Controller
{
    //
public function showMenuPage()
{
    $menus = Menu::latest()->get();
    dd($menus);

    return view('menu', ['menu' => $menus]);
}

public function destroy($id)
{
    dd($id);
    $menu = Menu::find($id);
    dd($menu);
    $menu->delete();

    return redirect()->route('menu');
}
}
