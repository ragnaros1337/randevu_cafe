<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        //валидация данных перед сохранением из папки request. Если не прошла, то ничего не сохранится.
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('category.index');

    }
}
