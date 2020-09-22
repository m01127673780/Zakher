@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.countries') | @Lang('admin.edit') {{$country->name}}

@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@Lang('admin.countries')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.home')</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{route('dashboard.countries.index')}}">@Lang('admin.countries')</a>
                    </li>
                    <li class="breadcrumb-item active">@Lang('admin.edit')</li>

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
                        <h3 class="card-title">@Lang('admin.edit')</h3>
                    </div>
                    <div class="card-body pt-3 pb-3">
                        <!-- /.card-header -->
                        <div class="container-fluid">
                        
                                <form action="{{route('dashboard.countries.update',  $country->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('put')}}
                                    @foreach (config('translatable.locales') as $locale)
                                    <div class="form-group">
                                        <label>@lang('admin.' . $locale . '.name')</label>                                        
                                        <input type="text" name="{{ $locale }}[name]" class="form-control @error($locale. '.name') is-invalid @enderror"
                                            value="{{ $country->translate($locale)->name  }}">
                                            @error($locale. '.name')
                                            <div class="text-danger text-bold">{{$message}}</div>
                                            @enderror
                                    </div>
                                    @endforeach
     
                                    <div class="form-group">
                                        <label>@Lang('admin.code')</label>
                                        <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="@Lang('admin.code') "
                                            value="{{ $country->code }}" name="code">
                                        @error('code')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                    </div>
    

                                    <div class="form-group">
                                        <label>@Lang('admin.status')</label>
                                        <select name="status" class="form-control custom-select @error('status') is-invalid @enderror">
                                            <option value="1" {{ $country->status === 1 ? 'selected' : ''}}>@Lang('admin.active')</option>
                                            <option value="0" {{ $country->status === 0 ? 'selected' : ''}}>@Lang('admin.in_active')</option>
                                        </select>
                                        @error('status')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="customFile">@Lang('admin.image')</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input image" name="flag" id="customFile">
                                            <label class="custom-file-label"
                                                for="customFile">@Lang('admin.choose_image')</label>
                                        </div>
                                        @error('flag')
                                        <div class="text-danger text-bold">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ $country->image_path }}" style="width: 150px"
                                            class="img-thumbnail image-preview" alt="">
                                    </div>

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                        @Lang('admin.edit')</button>
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