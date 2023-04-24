<?php

namespace App\Http\Controllers;

use App\Actions\Product\DeleteProductAction;
use App\Actions\Product\UpdateProductAction;
use App\Http\Requests\ProductsUpdateRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Response;

class ProductImagesController extends Controller
{
    public function imageDelete(): JsonResponse
    {
        return Response::json();
    }
}
