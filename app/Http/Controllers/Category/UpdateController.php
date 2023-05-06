<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        //валидация перед обновлением данных (из папки request). Если не прошла, то ничего не сохранится
        $data = $request->validated();
        $category->update($data);
        return view('category.show', compact('category'));
    }
}
