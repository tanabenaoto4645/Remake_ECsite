<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Instagram;


class CategoryController extends Controller
{
    //カテゴリごとの一覧表示
    public function index(Category $category, Instagram $instagramItems, Request $request){
        return view('index')->with(['products' => $category->getByCategory(), 'instagramItems' => $instagramItems->getPosts(), 'categories' => $category->get()]);
    }
}
