<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function home()
    {
        return view('index.home');
    }
}

// todo:
//  - сделать удаление картинок на странице редактирования
//  - (после всего) сделать множественную загрузку картинок
