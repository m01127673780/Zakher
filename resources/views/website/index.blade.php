@extends('layouts.website.app')

@section('title')
@Lang('site.home')
@endsection


@section('content')

<section class="slide1 " name="slide">
    <div class="wrap-slick1">
        <div class="slick1">

            @foreach ($slides as $slide)
            <div class="item-slick1 item1-slick1" style="background-image: url({{ $slide->image_path }});">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-245 p-b-100">
                    <h2 class="caption2-slide1 xl-text1 t-center m-b-37 " data-appear="lightSpeedIn"> {{$slide->title}}
                    </h2> <span class="caption1-slide1 m-text1 t-center m-b-15" data-appear="fadeInDown">
                        {{ $slide->description }} </span>

                    @if ($slide->url != null)
                    <div class="wrap-btn-slide1 w-size1 " data-appear="zoomIn"> <a href="{{ $slide->url }}"
                            class="flex-c-m size2 bg4 bo-rad-3 hov1 m-text3 trans-0-4 btn-primary"> @Lang('site.explore') </a>
                    </div>
                    @endif

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


@endsection