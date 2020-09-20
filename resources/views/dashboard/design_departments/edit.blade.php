@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.design_departments') | @Lang('admin.edit') {{$department->name}}

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
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{route('dashboard.design_departments.index')}}">@Lang('admin.design_departments')</a>
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
                        
                                <form action="{{route('dashboard.design_departments.update',  $department->id)}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put')}}
                                    @foreach (config('translatable.locales') as $locale)
                                    <div class="form-group">
                                        <label>@lang('admin.' . $locale . '.name')</label>                                        
                                        <input type="text" name="{{ $locale }}[name]" class="form-control"
                                            value="{{ $department->translate($locale)->name  }}">
                                            @error($locale. '.name')
                                            <div class="text-danger text-bold">{{$message}}</div>
                                            @enderror
                                    </div>

                                    @endforeach
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