<?php

namespace App\Http\Controllers;

use App\Actions\Image\DeleteImageAction;
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

        if (!DeleteImageAction::execute($request->input('imageId'))) {
            Session::flash('error', 'Error while deleting image!');
            return;
        }

        Session::flash('success', 'Image successfully removed!');
    }
}
