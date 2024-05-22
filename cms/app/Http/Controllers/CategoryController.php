<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllCategoriesResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category as Cat;
use App\Models\SubCategory as Sub;

class CategoryController extends Controller
{
    public function onlyCategories() {
        return CategoryResource::collection(Cat::all());
    }



    public function getAll() {
        return AllCategoriesResource::collection(Cat::all());
    }

    public function getOneCategory($id) {
        return new AllCategoriesResource(Cat::find($id));
    }
}
