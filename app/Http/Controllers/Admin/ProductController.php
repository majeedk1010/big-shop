<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show(){
        return view('admin.products.index');
    }

  //create product
    public function create(){
        return view('admin.products.create');
    }
}
