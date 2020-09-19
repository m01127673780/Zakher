@extends('layouts.app')

@section('title')
@Lang('admin.login')
@endsection

@section('content')

<div class="login-box">
    <div class="login-logo col-12">
        <h2><b>@lang('admin.login')</h2>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">تسجيل الدخول</p>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <input type="email" class="form-control" placeholder="@Lang('admin.email')" name="email"
                        value="{{ old('email') }}" autocomplete="email" autofocus>

                    @if ($errors->any())
                    <label class="text-danger">
                        {{ $errors->first('email') }}
                    </label>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="@Lang('admin.password')" name="password"
                        autocomplete="current-password">

                    @if ($errors->any())
                    <label class="text-danger">
                        {{ $errors->first('password') }}
                    </label>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('admin.login')</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection