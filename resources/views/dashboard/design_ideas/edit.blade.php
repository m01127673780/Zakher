@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.design_ideas') | @Lang('admin.edit') {{$idea->name}}

@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@Lang('admin.design_ideas')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{route('dashboard.design_ideas.index')}}">@Lang('admin.design_ideas')</a>
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

                            <form action="{{route('dashboard.design_ideas.update',  $idea->id)}}" method="post"
                                enctype="multipart/form-data" class="mb-4">
                                {{ csrf_field() }}
                                {{ method_field('put')}}

                                <div class="form-group">
                                    <label>@lang('admin.department')</label>
                                    <select name="department_id"
                                        class="form-control select2 custom-select @error('department_id') is-invalid @enderror">
                                        <option value="">@lang('admin.department')</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $idea->department_id == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>

                                @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    <label>@lang('admin.' . $locale . '.name')</label>
                                    <input type="text" name="{{ $locale }}[name]"
                                        class="form-control @error($locale. '.name') is-invalid @enderror"
                                        value="{{ $idea->translate($locale)->name  }}">
                                    @error($locale. '.name')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                @endforeach

                                @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    <label>@lang('admin.' . $locale . '.description')</label>
                                    <textarea type="text" rows="3" name="{{ $locale }}[description]"
                                        class="form-control @error($locale. '.description') is-invalid @enderror">{{ $idea->translate($locale)->description }} </textarea>
                                    @error($locale. '.description')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                @endforeach


                                @foreach (config('translatable.locales') as $locale)
                                <div class="form-group">
                                    <label>@lang('admin.' . $locale . '.slug')</label>
                                    <input type="text" name="{{ $locale }}[slug]"
                                        class="form-control @error($locale. '.slug') is-invalid @enderror"
                                        value="{{ $idea->translate($locale)->slug }}">
                                    @error($locale. '.slug')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                @endforeach

                                <div class="form-group">
                                    <label>@Lang('admin.status')</label>
                                    <select name="status"
                                        class="form-control custom-select @error('status') is-invalid @enderror">
                                        <option value="1" {{ $idea->status === 1 ? 'selected' : ''}}>
                                            @Lang('admin.active')</option>
                                        <option value="0" {{ $idea->status === 0 ? 'selected' : ''}}>
                                            @Lang('admin.in_active')</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                    @Lang('admin.edit')</button>
                            </form>

                            <hr>
                            @foreach ($idea_images as $image)
                            <form action="{{route('dashboard.design_ideas.updateImage',  $image->id)}}" method="post" 
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('put')}}

                                <div class="form-group">
                                    <label for="customFile">@Lang('admin.images')</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image"
                                            id="image{{$image->id}}" id="customFile">
                                        <label class="custom-file-label"
                                            for="customFile">@Lang('admin.choose_images')</label>
                                    </div>
                                    @error('image')
                                    <div class="text-danger text-bold">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group" style="float: right">
                                    <img src="{{ $image->image_path }}" style="width: 150px" class="img-thumbnail "
                                        alt="" id="image-preview{{$image->id}}">                                                                                    
                                </div>
                                <button type="submit" class="btn btn-info m-1"><i class="fa fa-edit"></i>
                                    @Lang('admin.edit')</button>
                            </form>
                            <form action="{{ route('dashboard.design_ideas.deleteImage', $image->id) }}" method="post"
                                style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button  type="submit" class="btn btn-danger delete m-1"><i
                                        class="fa fa-trash"></i> @lang('admin.delete')</button>
                            </form><!-- end of form -->
                            <div class="clearfix"></div>
                            @endforeach




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

@push('scripts')

@foreach ($idea_images as $image)
<script>
    // Image Preview
    $("#image{{$image->id}}").change(function () {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview{{$image->id}}').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });
</script>
@endforeach

@endpush
@endsection