<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
// use App\Http\Requests\Product as ProductRequest;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('product.index',compact('products'));
    }

    public function create(){
    	return view('product.create');
    }
    public function store(Request $r){
        $this->save($r);
        return redirect('/product');
    }


    public function edit($id){
        $product = Product::findOrFail($id);
    	return view('product.edit',compact('product'));
    }

    public function update(Request $r){
        $this->save($r);
        return redirect('/product');
    }

    public function save(Request $r){
        // dd($r->file('product_image'));
        try{
            DB::beginTransaction();
            $validator = Validator::make(
                $r->all(),
                [
                    "product_name" => "required|max:255",
                    "product_price" => "required"
                ]
            );
            if($validator->fails()){
                return redirect()->back()->withErrors($validator->errors())->withInput($r->all());
            }

            if($r->id){
                $product = Product::findOrFail($r->id);
            }
            else{
                $product = new Product;
            }
            
            $product->product_name = $r->product_name;
            $product->product_price = $r->product_price;
            //$product->product_image = $r->product_image;
            if ($r->has('product_image')) {
                //dd($r->file('product_image'));
                $image = $r->file('product_image');
                $name = $r->input('name').'_'.time();
                $folder = 'upload/image/';
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                $image->move($folder,$filePath);
                $product->product_image = $filePath;

            }
            $product->save();
            DB::commit();

            return true;
        } catch(\Exception $e){
            dd($e);
            DB::rollBack();
            return false;
        } 
    }

    public function delete($id){
        $product =Product::findOrFail($id);
        $product->delete();

        return redirect('/product')->with('sucesss','Product is sucessfully deleted');

    }

}
