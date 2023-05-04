<?php

namespace App\Http\Controllers\Good;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Good;

class IndexController extends Controller
{
    public function __invoke()
    {
        $goods = Good::all();
        return view('good.index', compact(['goods']));
    }
}
