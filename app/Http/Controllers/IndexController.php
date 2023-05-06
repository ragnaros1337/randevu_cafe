<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //главная страница
    public function __invoke()
    {
        $categories = Category::all();
        //отправляем список всех категорий из базы для создания фильтров в хэдере
        return view('index', compact(['categories']));
    }
    //Сюда отправляется запрос с фильтров в хэдере или со страниц в пагинации
    public function getFilteredDatabase(Request $request){
        //декодируем результат из json
        $data = json_decode($request->filter);
        //параметр paginate указывает по сколько карточек должно быть размещено на одной странице
        //последний параметр - номер страницы на которую перешли
        if($data !== 'Все'){
            $filter = Category::where('title', $data)->value('id');
            $goods = Good::where('category_id', $filter)->orderBy('title', 'asc')->paginate(3, ['*'], 'page', $request->next_page);
        }
        else{
            //фильтруем по присланной категории кроме "все"
            $goods = Good::orderBy('title', 'asc')->paginate(3, ['*'], 'page', $request->next_page);
        }
        return response()->json(['good' => $goods]);
    }

    //проверяет валидность количества каждого товара в заказе на случай если двое одновременно делают заказ
    //одних и тех же позиций и кто-то сделал заказ раньше
    public function checkCountInOrders(Request $request){

    }
}
