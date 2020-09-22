@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.design_departments') | @Lang('admin.add')
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@Lang('admin.design_departments')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.home')</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{route('dashboard.design_departments.index')}}">@Lang('admin.design_departments')</a>
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

                            <form action="{{route('dashboard.design_departments.store')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('post')}}
                                @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    <label>@lang('admin.' . $locale . '.name')</label>
                                    <input type="text" name="{{ $locale }}[name]" class="form-control @error($locale. '.name') is-invalid @enderror"
                                        value="{{ old($locale . '.name') }}">
                                    @error($locale. '.name')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                @endforeach

                                @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    <label>@lang('admin.' . $locale . '.slug')</label>
                                    <input type="text" name="{{ $locale }}[slug]" class="form-control @error($locale. '.slug') is-invalid @enderror"
                                        value="{{ old($locale . '.slug') }}">
                                    @error($locale. '.slug')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                @endforeach

                                <div class="form-group">
                                    <label>@lang('admin.main_department')</label>
                                    <select name="parent" class="form-control select2 custom-select @error('parent') is-invalid @enderror">
                                        <option value="">@lang('admin.main_department')</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('parent') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>@Lang('admin.status')</label>
                                    <select name="status" class="form-control custom-select @error('status') is-invalid @enderror">
                                        <option value="1" {{ old('status') === 1 ? 'selected' : ''}}>@Lang('admin.active')</option>
                                        <option value="0" {{ old('status') === 0 ? 'selected' : ''}}>@Lang('admin.in_active')</option>
                                    </select>
                                    @error('status')
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
                                    <img src="{{ asset('uploads/design_deps_images/not-found.jpg') }}" style="width: 150px"
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