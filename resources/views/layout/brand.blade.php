<div class="rts-trusted-client rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-area-client text-center">
                    <p class="client-title">Markalarımız</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="client-wrapper-one">
                @foreach ($brand as $brand)
                    <a href="{{ $brand->url }}"><img src="{{ $brand->getFirstMediaUrl('cover') }}"
                            alt="{{ $brand->title }}"></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
