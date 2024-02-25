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
    // $pre_image = request()->file('pre_image')->getClientOriginalName();
    // request()->file('pre_image')->storeAs('store/img',$pre_image);

    $menu = new Menu;  //データベースに保存
    $menu -> date = $request -> date;
    $menu -> title = $request -> title;
    $menu -> pre_image = $request -> pre_image;
    $menu -> content = $request -> content;
    $menu -> user_id = Auth::id();

    $menu -> save();

    return redirect()->route('menu.index');
}

function show($id)
{
    $menu = Menu::find($id);

    return view('menu.show',['menu'=>$menu]);
}

function edit($id)
{
    $menu = Menu::find($id);

    return view('menu.edit',['menu'=>$menu]);
}

function update(Request $request,$id) //どのIDを紐づけているのか$idで指定
{
    $menu = Menu::find($id);

    $menu -> date = $request -> date;
    $menu -> title = $request -> title;
    $menu -> pre_image = $request -> pre_image;
    $menu -> content = $request -> content;
    $menu -> save();

    return view('menu.show',['menu'=>$menu]);
}

function destroy($id)
{
    $menu = Menu::find($id);

    $menu -> delete();

    return redirect()->route('menu.index');
}
}