@extends('layouts.dashboard.app')

@section('title')
@Lang('admin.admins')    
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark mb-2">@Lang('admin.admins')<span class="mr-3 btn btn-success"
                        style="cursor: default; font-weight: bold;">{{ $users->total() }}</span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">@Lang('admin.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active">@Lang('admin.admins')</li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        @if (auth()->user()->hasPermission('create_admins'))
        <a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
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
                        <h3 class="card-title">@Lang('admin.admins')</h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <!-- /.card-header -->
                        @if($users->count() > 0)

                        <table class="table table-bordered text-center data_table mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@Lang('admin.name')</th>
                                    <th>@Lang('admin.email')</th>
                                    <th>@lang('admin.image')</th>
                                    <th>@Lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index=>$user)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle">{{ $user->name}}</td>
                                    <td class="align-middle">{{ $user->email}}</td>
                                    <td class="align-middle"><img src="{{ $user->image_path }}" style="width: 80px;"
                                            class="img-thumbnail" alt=""></td>
                                    <td class="align-middle">
                                        @if (auth()->user()->hasPermission('update_admins'))
                                        <a href="{{route('dashboard.admins.edit', $user->id)}}"
                                            class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                            @Lang('admin.edit')</a>

                                        @else
                                        <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>
                                            @lang('admin.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_admins'))
                                        <form action="{{ route('dashboard.admins.destroy', $user->id) }}" method="post"
                                            style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                    class="fa fa-trash"></i> @lang('site.delete')</button>
                                        </form><!-- end of form -->
                                        @else
                                        <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>
                                            @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                <script>
                                    $(document).ready(function () {

                                        //delete
                                        $('.delete').click(function (e) {
                                            var that = $(this)
                                            e.preventDefault();
                                            var n = new Noty({
                                                text: "@lang('site.confirm_delete')",
                                                type: "warning",
                                                killer: true,
                                                modal: true,
                                                theme: "semanticui",
                                                buttons: [
                                                    Noty.button("@lang('site.yes')",
                                                        'btn btn-success mr-2',
                                                        function () {
                                                            that.closest('form').submit();
                                                        }),
                                                    Noty.button("@lang('site.no')",
                                                        'btn btn-danger mr-2',
                                                        function () {
                                                            n.close();
                                                        })
                                                ]
                                            });
                                            n.show();
                                        }); //end of delete

                                    }); //end of ready
                                </script>
                                @stack('scripts')
                            </tbody>
                        </table>
                        {{ $users->appends(request()->query())->links() }}
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