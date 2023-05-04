<?php

namespace App\Http\Controllers\Good;

use App\Http\Controllers\Controller;
use App\Models\Good;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Good $good)
    {
        $good->delete();
        return redirect()->route('good.index');
    }
}
