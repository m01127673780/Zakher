@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.countries')
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark mb-2">@Lang('admin.countries')<span class="mr-3 btn btn-success"
                        style="cursor: default; font-weight: bold;">{{ $countries->count() }}</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.home')</a>
                    </li>
                    <li class="breadcrumb-item active">@Lang('admin.countries')</li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        @if (auth()->user()->hasPermission('create_countries'))
        <a href="{{ route('dashboard.countries.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
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
                        <h3 class="card-title">@Lang('admin.countries')</h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <!-- /.card-header -->
                        @if($countries->count() > 0)

                        <table class="table table-bordered text-center data_table mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@Lang('admin.name')</th>
                                    <th>@Lang('admin.code')</th>
                                    <th>@Lang('admin.flag')</th>
                                    <th>@Lang('admin.status')</th>
                                    <th>@Lang('admin.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $index=>$country)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle">{{ $country->name}}</td>
                                    <td class="align-middle">{{ $country->code}}</td>
                                    <td class="align-middle"><img src="{{ $country->image_path }}" style="width: 150px;"
                                            class="img-thumbnail" alt=""></td>
                                    <td class="align-middle">
                                        @if ($country->status == 1)
                                        <span class="badge badge-success">@Lang('admin.active')</span>
                                        @else
                                        <span class="badge badge-danger">@Lang('admin.in_active')</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if (auth()->user()->hasPermission('update_countries'))
                                        <a href="{{route('dashboard.countries.edit', $country->id)}}"
                                            class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                            @Lang('admin.edit')</a>

                                        @else
                                        <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>
                                            @lang('admin.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_countries'))
                                        <form
                                            action="{{ route('dashboard.countries.destroy', $country->id) }}"
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