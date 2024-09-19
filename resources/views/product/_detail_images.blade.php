<div class="detail-gallery">
    {{--<span class="zoom-icon"><i class="fi-sr-search"></i></span>--}}
    <span class="zoom-icon"><i class="fi-sr-cursor"></i></span>
    <div class="product-image-slider">
        <a href="{{ adminUrl('assets/images/products-img/' . $product->thumbnail) }}" target="_blank">
            <figure class="border-radius-10">
                <img src="{{ adminUrl('assets/images/products-img/' . $product->thumbnail) }}" class="custom-image" alt="product image" />
            </figure>
        </a>
        @foreach ($thumbnails as $thumb)
            <a href="{{ adminUrl('assets/images/products-img/' . $thumb) }}" target="_blank">
                <figure class="border-radius-10">
                    <img src="{{ adminUrl('assets/images/products-img/' . $thumb) }}" alt="product image" />
                </figure>
            </a>
        @endforeach
    </div>
    <div class="slider-nav-thumbnails">
        <div>
            <img src="{{ adminUrl('assets/images/products-img/' . $product->thumbnail) }}" alt="product image" />
        </div>
        @foreach ($thumbnails as $thumb)
            <div>
                <img src="{{ adminUrl('assets/images/products-img/' . $thumb) }}" alt="product image" />
            </div>
        @endforeach
    </div>
</div>
