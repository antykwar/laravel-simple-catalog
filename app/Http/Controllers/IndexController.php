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
//  - отображать картинки на страницах редактирования и просмотра (thumbnails)
//  - сделать удаление картинок на странице редактирования
//  - (после всего) сделать множественную загрузку картинок
