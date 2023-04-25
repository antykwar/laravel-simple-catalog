<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsImages\DeleteRequest;
use Illuminate\Support\Facades\Session;

class ProductImagesController extends Controller
{
    public function imageDelete(DeleteRequest $request): void
    {
        if (!$request->hasValidData()) {
            Session::flash('error', 'Image was not found!');
            return;
        }

        Session::flash('success', 'Image successfully removed!');
    }
}
