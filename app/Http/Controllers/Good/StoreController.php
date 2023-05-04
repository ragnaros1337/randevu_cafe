<?php

namespace App\Http\Controllers\Good;

use App\Http\Controllers\Controller;
use App\Http\Requests\Good\StoreRequest;
use App\Models\Good;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = \Storage::disk('public')->put('/images', $data['preview_image']);

        //TODO: Здесь надо добавить правила уникальности имени, что все в порядке было
        $good = Good::firstOrCreate([
            'title' => $data['title']
                            ], $data);


        return redirect()->route('good.index');

    }
}
