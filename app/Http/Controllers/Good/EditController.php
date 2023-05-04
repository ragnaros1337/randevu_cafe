<?php

namespace App\Http\Controllers\Good;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Good $good)
    {
        $categories = Category::all();
        return view('good.edit', compact(['good', 'categories']));
    }
}
