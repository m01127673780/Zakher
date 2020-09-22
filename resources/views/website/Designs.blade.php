@extends('layouts.website.app')

@section('title')
{{$design_department->name}}
@endsection


@section('content')

<section class="newproduct bgwhite p-b-40 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12  ">

                <h3 class="title-sec"> {{$design_department->name}} </h3>
            </div>
        </div>
        <div class="wrap-slick3rd">
            <div class="  slick3rd">
                @foreach ($sub_departments as $sub)
                <div class="item-slick2 p-l-15 p-r-15 text-center catg-block">
                    <a class="" href="#">
                        <!-- Block2 -->
                        <div class=" product-one">
                            <div class="">
                                <img src="{{ $sub->image_path }}" alt="{{$sub->name}}" class="img-fluid">
                            </div>
                            <div class=" product-one-name ">
                                <p>
                                    {{$sub->name}}
                                </p>

                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<div class="photos_ideas bg-gray" style="padding: 20px 0 60px;">
    <div class="container">
        <div class="row bgwhite" style="border: 1px solid #ddd; padding: 30px;">
            <!-- <div class="photo_block">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <img src="images/22.webp" alt="Idea" title="Idea" class="img-responsive">
                    <h3></h3>
                </div>
            </div> -->

            @foreach ($designs_ideas as $idea)
            <div class="col-md-4 col-sm-6 col-xs-12 photo_block">
                <div class="block2-img wrap-pic-w pos-relative">

                    <img src="{!! $idea->image_path.'/'.$idea->first_image->image !!}" alt="{{$idea->name}}">

                    <div class="block2-overlay trans-0-4">
                        <div class="block2-btn-addcart w-size1 trans-0-4 d-flex">
                            <!-- Button -->

                            <a class="flex-c-m size2  btn btn-white btn-primary mr-2" href="photo-details.html">
                                <i class="fa fa-search" aria-hidden="true"></i> View
                            </a>
                            <button class="flex-c-m size2  btn btn-white btn-primary mr-2" data-toggle="modal"
                                data-target=".bd-share-modal"><i class="fa fa-share-square-o" aria-hidden="true"></i>
                                Share</button>

                            <button class="flex-c-m size2  btn btn-white btn-primary mr-2" data-toggle="modal"
                                data-target=".bd-email-modal" title="Save to Ideabook">
                                <i class="fa fa-heart" aria-hidden="true"></i> Save
                            </button>
                        </div>
                    </div>
                    <div class="color-overlay"></div>
                </div>
                <h3>{{$idea->name}}</h3>
                <p>{!!substr($idea->description ,0, 145)."......"!!}</p>
                <a href="#idea{{$idea->id}}" data-toggle="modal"
                    data-target="#idea{{$idea->id}}">@Lang('site.read_more')</a>

            </div>


            <!-- Read More Modal -->
            <div class="modal" tabindex="-1" role="dialog"  aria-hidden="true" id="idea{{$idea->id}}">
                <div class="modal-dialog">
                    <div class="modal-content rounded-0">
                        <div class="modal-header bg5">
                            <h5>{{$idea->name}}</h5>
                            <button type="button" class="close ml-auto mt-2" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="fa fa-close"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container bgwhite">
                                <div class="row">
                                    <div class="col-12">
                                        {{$idea->description}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <div class="row">

        </div>
    </div>
</div>


@endsection