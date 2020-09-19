@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.settings')
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@Lang('admin.settings')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.dashboard')</a>
                    </li>

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
                        <h3 class="card-title">@Lang('admin.settings')</h3>
                    </div>
                    <div class="card-body pt-3 pb-3">
                        <!-- /.card-header -->
                        <div class="container-fluid">

                            <form action="{{route('dashboard.settings.update', $settings->id)}}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('put')}}


                                <div class="form-group">
                                    <label>@Lang('admin.site_title_ar')</label>
                                    <input type="text" class="form-control" name="site_title_ar"
                                        value="{{$settings->site_title_ar}}">
                                        @error('site_title_ar')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                </div>
                               

                                <div class="form-group">
                                    <label>@Lang('admin.site_title_en')</label>
                                    <input type="text" class="form-control" name="site_title_en"
                                        value="{{$settings->site_title_en}}">
                                        @error('site_title_en')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.email')</label>
                                    <input type="email" class="form-control" name="email" value="{{$settings->email}}">
                                    @error('email')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.phone')</label>
                                    <input type="text" class="form-control" name="phone" dir="ltr"
                                        style="direction: ltr !important;" value="{{$settings->phone}}">
                                        @error('phone')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                </div>
                               

                                <div class="form-group">
                                    <label>@Lang('admin.whatsapp')</label>
                                    <input type="text" class="form-control" name="whatsapp"
                                        style="direction: ltr !important;" value="{{$settings->whatsapp}}">
                                        @error('whatsapp')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.address_ar')</label>
                                    <input type="text" class="form-control" name="address_ar"
                                        value="{{$settings->address_ar}}">
                                        @error('address_ar')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.address_en')</label>
                                    <input type="text" class="form-control" name="address_en"
                                        value="{{$settings->address_en}}">
                                        @error('address_en')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.job_times_ar')</label>
                                    <input type="text" class="form-control" name="job_times_ar"
                                        value="{{$settings->job_times_ar}}">
                                        @error('job_times_ar')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.job_times_en')</label>
                                    <input type="text" class="form-control" name="job_times_en"
                                        value="{{$settings->job_times_en}}">
                                        @error('job_times_en')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                </div>
                               

                                <div class="form-group">
                                    <label>@Lang('admin.facebook')</label>
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{$settings->facebook}}">
                                        @error('facebook')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.twitter')</label>
                                    <input type="text" class="form-control" name="twitter"
                                        value="{{$settings->twitter}}">
                                        @error('twitter')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.instagram')</label>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{$settings->instagram}}">
                                        @error('instagram')
                                <div class="text-danger text-bold">{{$message}}</div>
                                @enderror
                                </div>
                                

                                <div class="form-group">
                                    <label>@Lang('admin.youtube')</label>
                                    <input type="text" class="form-control" name="youtube"
                                        value="{{$settings->youtube}}">
                                        @error('youtube')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                </div>
                               

                                <div class="form-group">
                                    <label>@Lang('admin.map')</label>
                                    <input type="text" class="form-control" name="map" value="{{$settings->map}}">
                                    @error('map')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                               

                                <div class="form-group">
                                    <label>@Lang('admin.description')</label>
                                    <textarea name="description" class="form-control"
                                        rows="5">{{$settings->description}}</textarea>
                                        @error('description')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                </div>
                               

                                <div class="form-group">
                                    <label>@Lang('admin.keywords')</label>
                                    <textarea name="keywords" class="form-control"
                                        rows="5">{{$settings->keywords}}</textarea>
                                        @error('keywords')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                </div>
                               

                                <div class="form-group">
                                    <label for="customFile">@Lang('admin.logo')</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input image" name="logo" id="customFile">
                                        <label class="custom-file-label"
                                            for="customFile">@Lang('admin.choose_image')</label>
                                    </div>
                                    @error('logo')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{ $settings->image_path }}" style="width: 250px"
                                        class="img-thumbnail image-preview" alt="">
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-edit"></i>
                                    @Lang('admin.save')</button>
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