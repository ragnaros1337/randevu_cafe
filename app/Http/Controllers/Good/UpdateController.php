<?php

namespace App\Http\Controllers\Good;

use App\Http\Controllers\Controller;
use App\Http\Requests\Good\UpdateRequest;
use App\Models\Good;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Good $good)
    {
        //валидация перед обновлением данных (из папки request). Если не прошла, то ничего не сохранится
        $data = $request->validated();
        $good->update($data);
        return view('good.show', compact('good'));
    }
}
