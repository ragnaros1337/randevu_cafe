<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Good;
use App\Models\Man;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $man_count = Man::count();
        $order_count = Order::count();
        $good_count = Good::count();
        $category_count = Category::count();
        return view('main.index', compact(['category_count', 'man_count', 'order_count', 'good_count']));
    }
}
