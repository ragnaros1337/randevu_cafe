<?php

namespace App\Http\Controllers\Good;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Good $good)
    {
        $categories = Category::where('id',$good->category_id)->get();
        return view('good.show', compact(['good', 'categories']));
    }
}
