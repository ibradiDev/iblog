<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(5);

        return $categories;
    }
}
