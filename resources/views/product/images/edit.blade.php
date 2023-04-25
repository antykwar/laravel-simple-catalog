@php
    /* @var \App\Models\Product $product*/
@endphp

@foreach($product->images->chunk(3) as $chunk)
    @php
        $isLastLoop = $loop->last;
    @endphp
    @if ($loop->last)
        <div class="row">
    @else
        <div class="row form-group">
    @endif
    @foreach($chunk as $image)
        <div class="col-sm-4">
            <img
                src="{{ asset('storage' . $product->getPathToImages() . $image->getSmallThumbName()) }}"
                class="img-rounded img-product"
                alt=""
                data-id="{{ $image->id }}"
                data-url="{{ route('product-image-delete', absolute: false) }}">
        </div>
    @endforeach
    </div>
@endforeach
