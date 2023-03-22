<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function home()
    {
        return view('index.home');
    }

    public function about()
    {
        return view('index.about');
    }
}

// todo:
//  - добавить таблицу Images, связать её с продуктами
//  - отображать картинки на страницах редактирования и просмотра
//  - сделать удаление картинок на странице редактирования
//  - (после всего) сделать множественную загрузку картинок
