<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class MenuController extends Controller
{
    function index()
    {
        $menus = Menu::all();
        return view('menu.index',['menus'=>$menus]);
    }

    function create()
    {
        return view('menu.create');
    }

    function store(Request $request)
    {
        $pre_image = request()->file('pre_image')->getClientOriginalName();
        request()->file('pre_image')->storeAs('public/img',$pre_image);

        $menu = new Menu;  //データベースに保存
        $menu -> date = $request -> date;
        $menu -> title = $request -> title;
        $menu -> pre_image = $request -> pre_image;
        $menu -> content = $request -> content;
        $menu -> user_id = Auth::id();

        $menu -> save();

        return redirect()->route('menu.index');
    }
















    //
public function showMenulinePage()
{
    $menus = Menu::latest()->get();
    dd($menus);

    return view()('menu', ['menu' => $menus]);
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
