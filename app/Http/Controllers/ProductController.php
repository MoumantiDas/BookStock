<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_cat;


use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function prodfunct(){

            $prod=Product_Cat::all();//get data from table
            return view('productlist',compact('prod'));//sent data to view

        }

        public function findProductName(Request $request){


            //if our chosen id and products table prod_cat_id col match the get first 100 data

            //$request->id here is the id of our chosen option id
            $data=Product::select('productname','id')->where('product_cat_id',$request->id)->take(10)->get();
            return response()->json($data);//then sent this data to ajax success
        }


        public function findPrice(Request $request){

            //it will get price if its id match with product id
            $p=Product::select('price')->where('id',$request->id)->first();

            return response()->json($p);
        }

}
