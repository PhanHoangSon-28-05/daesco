<section class="pv__slide-main--homepage">
    {{-- <div class="slide-inner">
        @foreach ($sliders as $slider)
            <div class="item" style="background-image: url('{{ URL::asset('storages/' . $slider->pic) }}');">
                <div class="container content">
                    <div class="text">
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
    <div id="sildercarousel" class="carousel slide" data-ride="carousel" style="height:80vh;overflow:hidden">
        <ol class="carousel-indicators">
            @for ($count = 0; $count < $sliders->count(); $count++)
            <li data-target="#sildercarousel" data-slide-to="{{ $count }}" 
            class="{{ $count == 0 ? 'active' : '' }}"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img class="d-block w-100" src="{{ asset('storages/' . $slider->pic) }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('script')
<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>
@endpush
