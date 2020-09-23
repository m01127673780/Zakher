@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.sliders') | @Lang('admin.add')
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@Lang('admin.sliders')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.home')</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{route('dashboard.sliders.index')}}">@Lang('admin.sliders')</a>
                    </li>
                    <li class="breadcrumb-item active">@Lang('admin.add')</li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@Lang('admin.add')</h3>
                    </div>
                    <div class="card-body pt-3 pb-3">
                        <!-- /.card-header -->
                        <div class="container-fluid">

                            <form action="{{route('dashboard.sliders.store')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('post')}}
                                @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    <label>@lang('admin.' . $locale . '.title')</label>
                                    <input type="text" name="{{ $locale }}[title]" class="form-control @error($locale. '.title') is-invalid @enderror"
                                        value="{{ old($locale . '.title') }}">
                                    @error($locale. '.title')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                @endforeach


                                @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    <label>@lang('admin.' . $locale . '.description')</label>
                                    <textarea type="text" rows="3" name="{{ $locale }}[description]"
                                        class="form-control @error($locale. '.description') is-invalid @enderror">{{ old($locale . '.description') }}</textarea>
                                    @error($locale. '.description')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                @endforeach

                                <div class="form-group">
                                    <label>@Lang('admin.url')</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror" placeholder="@Lang('admin.url') "
                                        value="{{old('url')}}" name="url">
                                    @error('url')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>@Lang('admin.rank')</label>
                                    <input type="text" class="form-control @error('rank') is-invalid @enderror" placeholder="@Lang('admin.rank') "
                                        value="{{old('rank')}}" name="rank">
                                    @error('rank')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
    
                                <div class="form-group">
                                    <label for="customFile">@Lang('admin.image')</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input image" name="image" id="customFile">
                                        <label class="custom-file-label"
                                            for="customFile">@Lang('admin.choose_image')</label>
                                    </div>
                                    @error('image')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{ asset('uploads/slider_images/not-found.jpg') }}" style="width: 150px"
                                        class="img-thumbnail image-preview" alt="">
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    @Lang('admin.add')</button>
                            </form>


                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection