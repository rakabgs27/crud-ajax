<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

class ApiCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return  CategoryResource::collection($categories);
    }

}
