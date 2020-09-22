@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.design_ideas')
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark mb-2">@Lang('admin.design_ideas')<span class="mr-3 btn btn-success"
                        style="cursor: default; font-weight: bold;">{{ $ideas->count() }}</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active">@Lang('admin.design_ideas')</li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        @if (auth()->user()->hasPermission('create_design_ideas'))
        <a href="{{ route('dashboard.design_ideas.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
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
                        <h3 class="card-title">@Lang('admin.design_ideas')</h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <!-- /.card-header -->
                        @if($ideas->count() > 0)

                        <table class="table table-bordered text-center data_table mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@Lang('admin.name')</th>   
                                    <th>@Lang('admin.department')</th>   
                                    <th>@Lang('admin.status')</th>   
                                    <th>@Lang('admin.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ideas as $index=>$idea)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle">{{ $idea->name}}</td>                                
                                    <td class="align-middle">{{ $idea->department->name}}</td>                                
                                    <td class="align-middle">
                                        @if ($idea->status == 1)
                                            <span class="badge badge-success">@Lang('admin.active')</span>
                                        @else
                                        <span class="badge badge-danger">@Lang('admin.in_active')</span>
                                        @endif
                                    </td>                                
                                    <td class="align-middle">
                                        @if (auth()->user()->hasPermission('update_design_ideas'))
                                        <a href="{{route('dashboard.design_ideas.edit', $idea->id)}}"
                                            class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                            @Lang('admin.edit')</a>

                                        @else
                                        <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>
                                            @lang('admin.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_design_ideas'))
                                        <form action="{{ route('dashboard.design_ideas.destroy', $idea->id) }}" method="post"
                                            style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button  type="submit" class="btn btn-danger delete btn-sm"><i
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
