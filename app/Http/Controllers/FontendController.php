<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function index(){

  $products=Product::where('status',1)->latest()->get();
  $categorys=Category::where('status',1)->latest()->get();
  return view('pages.index',compact('products','categorys'));

    }
}
