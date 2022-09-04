<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //カテゴリごとの一覧表示
    public function index(Category $category){
        return view('index')->with(['products' => $category->getByCategory()]);
    }
}
