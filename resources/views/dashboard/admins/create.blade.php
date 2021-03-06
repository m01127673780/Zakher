@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.admins') | @Lang('admin.add')
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@Lang('admin.admins')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('dashboard.admins.index')}}">@Lang('admin.admins')</a>
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
                            <form action="{{route('dashboard.admins.store')}}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('post')}}

                                <div class="form-group">
                                    <label>@Lang('admin.name')</label>
                                    <input type="text" class="form-control" placeholder="@Lang('admin.name')"
                                        value="{{old('name')}}" name="name">
                                    @error('name')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>@Lang('admin.email')</label>
                                    <input type="text" class="form-control" placeholder="@Lang('admin.email')"
                                        value="{{old('email')}}" name="email">
                                    @error('email')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>@Lang('admin.password')</label>
                                    <input type="password" class="form-control" placeholder="@Lang('admin.password')"
                                        name="password">
                                    @error('password')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>@Lang('admin.password_confirmation')</label>
                                    <input type="password" class="form-control"
                                        placeholder="@Lang('admin.password_confirmation')" name="password_confirmation">
                                    @error('password_confirmation')
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
                                    <img src="{{ asset('uploads/admins_images/avatar.png') }}" style="width: 80px"
                                        class="img-thumbnail image-preview" alt="">
                                </div>

                                <div class="form-group">
                                    <label>@Lang('admin.permissions')</label>
                                    @error('permissions')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                    <div class="card card-primary card-outline">
                                        <div class="card-body">
                                            @php
                                            $models = ['admins', 'settings', 'design_departments', 'design_ideas'];
                                            $maps = ['create', 'read', 'update', 'delete'];
                                            @endphp
                                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                                @foreach ($models as $index=>$model)
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                        id="custom-content-below-home-tab" data-toggle="pill"
                                                        href="#{{ $model }}" role="tab"
                                                        aria-controls="custom-content-below-home"
                                                        aria-selected="true">@Lang('admin.' . $model)</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="tab-content mt-2" id="custom-content-below-tabContent">
                                                @foreach ($models as $index=>$model)
                                                <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}"
                                                    id="{{ $model }}" role="tabpanel"
                                                    aria-labelledby="custom-content-below-home-tab">

                                                    @foreach ($maps as $map)
                                                    <label><input type="checkbox" name="permissions[]"
                                                            value="{{ $map . '_' . $model }}"> @lang('admin.' .
                                                        $map)</label><br>
                                                    @endforeach
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                        <!-- /.card -->
                                    </div>
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