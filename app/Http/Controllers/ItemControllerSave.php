<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('inventory.index', [
            "items" => Item::all()
        ]);
    }

    public function create()
    {
        return view('inventory.create');
    }


    public function store(Request $request)
    {
        // $item =new Item();
        // $item->name=$request->name;
        // $item->price=$request->price;
        // $item->stock=$request->stock;
        // $item->save();
        $item = Item::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
        ]);
        // $item=Item::create($request->all());

        // $item=Item::insert([
        //     "name"=>$request->name,
        //     "price"=>$request->price,
        //     "stock"=>$request->stock,
        // ]);
        return redirect()->route('item.index');
    }
    public function show($id)
    {
        // $item=Item::findOrFail($id);
        // if(is_null($item)){
        //     return abort(404);
        // }
        // return view('inventory.show',compact('item'));
        return view('inventory.show', ["item" => Item::findOrFail($id)]);
    }

    public function edit($id)
    {
        // $item=Item::findOrFail($id);
        // if(is_null($item)){
        //     return abort(404);
        // }
        // return view('inventory.show',compact('item'));
        return view('inventory.edit', ["item" => Item::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return redirect()->route('item.index');
    }

    public function destory($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
