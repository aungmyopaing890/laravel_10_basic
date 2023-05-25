<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{

    public function __construct()
    {
        // $this->middleware('cat')->only(["store", "update", "delete"]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // if (!request()->has('token')) {
        //     return response()->json(["message" => 'Api Token is required!'], 401);
        // } else if (request()->token !== 'test') {
        //     return response()->json(["message" => 'Api Token is required!'], 401);
        // }
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

        // return response()->json(["message" => 'Success', "data" => $items], 200);
        return ItemResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'name' => 'required|min:3|max:50|unique:item,name',
        //     'price' => 'required|numeric|gte:50',
        //     'stock' => 'required|numeric|gt:3',
        // ]);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50|unique:item,name',
            'price' => 'required|numeric|gte:50',
            'stock' => 'required|numeric|gt:3',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $item = Item::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
        ]);
        return new ItemResource($item);
        // return response()->json(["message" => 'Item created Successfully! ', "data" => $item], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => 'Not Found', "data" => []], 404);
        }
        // return response()->json(["message" => 'Success', "data" => $item], 200);
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required|min:3|max:50|unique:item,name,$id",
            "price" => "required|numeric|gte:50",
            "stock" => "required|numeric|gt:3",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => 'Not Found', "data" => []], 404);
        }
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();
        return new ItemResource($item);

        // return response()->json(["message" => 'Item Updated Successfully! ', "data" => $item], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => 'Not Found'], 404);
        }
        $item->delete();
        return response()->json(["message" => 'Deleted Success'], 204);
    }
}
