<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class MenuController extends Controller
{   
function index()
{
    // $menus = Menu::all();
    // return view('menu.index',['menus'=>$menus]);
    // Retrieve paginated menu items from the database
    $menus = Menu::orderBy('created_at','desc')->paginate(7); // Retrieve 7 menu items per page
    
    // Pass the paginated menu items to the view
    return view('menu.index', compact('menus'));
}

function create()
{
    return view('menu.create');
}

function store(Request $request)
{
    $menu = new Menu;  //データベースに保存
    // $pre_image = request()->file('pre_image')->getClientOriginalName();
    // request()->file('pre_image')->storeAs('storage/img',$pre_image);
    if ($request->hasFile('pre_image')) {
        $image = $request->file('pre_image');
        $imageName = $image->getClientOriginalName();
        // $image->storeAs('images', $imageName, 'public/img');
        $image->storeAs('public/img', $imageName);
        $menu -> pre_image = $imageName;
    }

    $menu -> date = $request -> date;
    $menu -> title = $request -> title;
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
    // Validate the request data
    $request->validate([
        'date' => 'required',
        'title' => 'required',
        'content' => 'required',
    ]);

    // Find the menu entry by its ID
    $menu = Menu::findOrFail($id);

    // Update the menu entry with the new data
    $menu->date = $request->date;
    $menu->title = $request->title;
    $menu->content = $request->content;
    $menu->user_id = Auth::id();

    // Check if a new image file is uploaded
    if ($request->hasFile('pre_image')) {
        $image = $request->file('pre_image');
        $imageName = $image->getClientOriginalName();
        $image->storeAs('public/img', $imageName);
        $menu->pre_image = $imageName;
    }

    // Save the updated menu entry
    $menu->save();

    // Redirect the user to the menu show page
    return redirect()->route('menu.show', ['id' => $menu->id]);
}

function destroy($id)
{
    $menu = Menu::find($id);

    $menu -> delete();

    return redirect()->route('menu.index');
}
}