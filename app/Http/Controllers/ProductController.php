<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function post(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity  = $request->quantity;
        $product->active  = $request->active;
        $product->desctiption  = $request->desctiption;

        $product->save();
        return response()->json(
            [
                "message" => "inputan suskses",
                "data" => $product
            ]
        );
    }

    function get()
    {
        $data = Product::all();
        return response()->json([
            'message' => 'Get Method Success loh',
            "data" => $data
        ]);
    }

    function getbyid($id)
    {
        $data = Product::where('id', $id)->get();
        return response()->json([
            'message' => 'Get Method Success loh',
            "data" => $data
        ]);
    }

    function put(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price;
            $product->quantity  = $request->quantity ? $request->quantity : $product->quantity;
            $product->active  = $request->active ?  $request->active : $product->active;
            $product->desctiption  = $request->desctiption ? $request->desctiption : $product->desctiption;

            $product->save();
            return response()->json([
                'message' => 'Put Method Success loh',
                'data' => $product
            ]);
        }
        return response()->json([
            'message' => 'Put Method gagal id dengan' . ' ' . $id . ' ' . 'tidak ada'
        ], 400);
    }


    function delete($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            $product->delete();
            return response()->json([
                'message' => 'Delete Method Success loh' . ' ' . $id
            ]);
        }
        return response()->json([
            'message' => 'Delete Method gagal loh' . ' ' . $id
        ], 400);
    }
}
