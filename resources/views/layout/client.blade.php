<section class="clients-section style-two">
    <div class="auto-container">
        <div class="sponsors-outer">
            @foreach ($reference as $reference)
                <ul class="clients-carousel owl-carousel owl-theme">
                    <li class="slide-item">
                        <a href="{{ $reference->url }}"><img src="{{ $reference->image_url }}" alt=""></a>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
</section>
