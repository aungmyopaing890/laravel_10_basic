<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $items = Item::where("id", "<", 50)->where("price", "<", 500)->get();
        // $items = Item::where("stock", "<", 10)->get();
        // $items = Item::where("stock", "<", 10)->orWhere("price", ">", 900)->get();
        // $items = Item::whereIn("id", [15, 10, 20, 25])->get();
        // $items = Item::whereBetween("price", [700, 900])->get();

        // $items = Item::paginate(15);
        // dd($items);
        // return $items;
        $items = Item::when(request()->has("keyword"), function ($query) {
            $keyword = request()->keyword;
            $query->where("name", "like", "%" . $keyword . "%");
            $query->orWhere("price", "like", "%" . $keyword . "%");
            $query->orWhere("stock", "like", "%" . $keyword . "%");
        })->when(request()->has("name"), function ($query) {
            $sortType = request()->name ?? 'asc';
            $query->orderBy("name", $sortType);
        })
            ->paginate(10)->WithQueryString();
        return view('inventory.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->all());
        return redirect()->route('item.index')->with("status", "New Item has been Created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('inventory.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('inventory.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return redirect()->route('item.index')->with("status", "$request->name has been Updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with("status", "$item->name has been deleted.");
    }
}
