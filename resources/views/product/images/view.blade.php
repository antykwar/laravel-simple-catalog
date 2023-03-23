@php
    /* @var \App\Models\Product $product*/
@endphp

@foreach($product->images->chunk(3) as $chunk)
    <div class="row form-group">
        @foreach($chunk as $image)
            <div class="col-sm-4">
                <img
                    src="{{ asset('storage' . $product->getPathToImages() . $image->getSmallThumbName()) }}"
                    class="img-rounded"
                    alt="">
            </div>
        @endforeach
    </div>
@endforeach
