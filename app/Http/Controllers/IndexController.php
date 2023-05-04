<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('index', compact(['categories']));
    }

    public function getFilteredDatabase(Request $request)
    {
        $data = json_decode($request->filter);
        if($data !== 'Все'){
            $filter = Category::where('title', $data)->value('id');
            $goods = Good::where('category_id', $filter)->orderBy('title', 'asc')->paginate(3, ['*'], 'page', $request->next_page);
        }
        else{
            $goods = Good::orderBy('title', 'asc')->paginate(3, ['*'], 'page', $request->next_page);
        }
        return response()->json(['good' => $goods]);
    }
}
