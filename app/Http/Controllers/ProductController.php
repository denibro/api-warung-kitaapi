<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

// WEB
    function post(Request $request)
    {
        
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity  = $request->quantity;
        $product->active  = $request->active;
        $product->desctiption  = $request->desctiption;

        $product->save();
        return redirect('/product');
        return response()->json(
            [
                "message" => "inputan suskses",
                "data" => $product
            ]
        );
    }


    function get()
    {
        $data = \App\Product::all();
        return view('barang.index',['data' => $data]);

    }

    function getbyid($id)
    {
        $data = Product::where('id', $id)->get();
        return response()->json([
            'message' => 'Get Method Success loh',
            "data" => $data
        ]);
    }

    function edit ($id){

        $data = Product::find($id);
        return view('barang.edit',['data' => $data]);
    }

    function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect('/product')->with('sukses','data berhasil diupdate');

            
    }

    function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product')->with('sukses','data berhasil didelete');

    }


// API

    function getapi()
    {
        $data = \App\Product::all();
        return response()->json([
            'message' => 'Get Method Success loh',
            "data" => $data
        ]);
    }

    function getbyidapi($id)
    {
        $data = Product::where('id', $id)->get();
        return response()->json([
            'message' => 'Get Method Success loh',
            "data" => $data
        ]);
    }

    function postapi(Request $request)
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

    function deleteapi($id)
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