<section class="pv__slide-main--homepage">
    <div class="slide-inner">
        @foreach ($sliders as $slider)
            <div class="item" style="background-image: url('{{ URL::asset('storage/' . $slider->pic) }}');">
                <div class="container content">
                    <div class="text">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
