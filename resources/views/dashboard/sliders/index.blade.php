@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.sliders')
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark mb-2">@Lang('admin.sliders')<span class="mr-3 btn btn-success"
                        style="cursor: default; font-weight: bold;">{{ $sliders->count() }}</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.home')</a>
                    </li>
                    <li class="breadcrumb-item active">@Lang('admin.sliders')</li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        @if (auth()->user()->hasPermission('create_sliders'))
        <a href="{{ route('dashboard.sliders.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
            @lang('admin.add')</a>
        @else
        <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('admin.add')</a>
        @endif

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
                        <h3 class="card-title">@Lang('admin.sliders')</h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <!-- /.card-header -->
                        @if($sliders->count() > 0)

                        <table class="table table-bordered text-center data_table mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@Lang('admin.title')</th>
                                    <th>@Lang('admin.rank')</th>
                                    <th>@Lang('admin.image')</th>
                                    <th>@Lang('admin.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $index=>$slide)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle">{{ $slide->title}}</td>
                                    <td class="align-middle">{{ $slide->rank}}</td>
                                    <td class="align-middle"><img src="{{ $slide->image_path }}" style="width: 150px;"
                                            class="img-thumbnail" alt=""></td>                                    
                                    <td class="align-middle">
                                        @if (auth()->user()->hasPermission('update_sliders'))
                                        <a href="{{route('dashboard.sliders.edit', $slide->id)}}"
                                            class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                            @Lang('admin.edit')</a>

                                        @else
                                        <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>
                                            @lang('admin.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_sliders'))
                                        <form
                                            action="{{ route('dashboard.sliders.destroy', $slide->id) }}"
                                            method="post" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                    class="fa fa-trash"></i> @lang('admin.delete')</button>
                                        </form><!-- end of form -->
                                        @else
                                        <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>
                                            @lang('admin.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h2>@Lang('admin.no_data_found')</h2>
                        @endif
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