<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageDeleteRequest;
use Illuminate\Support\Facades\Session;

class ProductImagesController extends Controller
{
    public function imageDelete(ProductImageDeleteRequest $request): void
    {
        Session::flash('error', 'Image was not found!');
        Session::flash('success', 'Image successfully removed!');
    }
}
