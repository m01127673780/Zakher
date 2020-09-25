@extends('layouts.website.app')

@section('title')
@Lang('site.sign_in')
@endsection

@section('content')

<!-- start login -->
<section class="bgwhite p-b-60 mt-75" name="login">

    <div class="container">
        <div class="row justify-center m-b-30">
            <div id="result-login"></div>

            <div class="col-md-12">
                <ul class="nav nav-pills pills-dark mb-3 justify-center" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <p class="f-bold text-center"> @Lang('site.already_have_an_account_?')</p>
                        <a class="nav-link active btn-primary" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                            role="tab" aria-controls="pills-home" aria-selected="true">@Lang('site.sign_in')

                        </a>

                    </li>
                    <li class="nav-item">
                        <p class="f-bold text-center"> @Lang("site.don't_have_an_account_yet_?")</p>
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">@Lang('site.register_now')</a>

                    </li>

                </ul>
            </div>

        </div>

        <div class="row ">
            <div class="tab-content col-md-12" id="pills-tabContent">
                <div class="  tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <div class="row  ">
                        <div class="col-lg-3"> </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 p-b-30 bo-r">
                            <form class="leave-comment" action="{{ route('memberAuth.loginForm') }}" method="post" id="loginForm">
                                @csrf
                                <label>@Lang('site.email')</label>

                                <div class="bo4 size15 m-b-30">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="member_email"
                                        value="{{ old('member_email') }}" autocomplete="email">
                                       
                                        @error('member_email')
                                <label class="text-danger error">{{$message}}</label>
                                @enderror

                                </div>

                                <label>@Lang('site.password')</label>
                                <div class="bo4 size15 m-b-30">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="member_password"
                                        >
                                        @error('member_password')
                                <label class="text-danger error">{{$message}}</label>
                                @enderror
                                </div>

                                {{--  <label class="container-checkmark ">
                                    Keep me signed in
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label> --}}
                                <div class="sign_in_btn">
                                    <!-- Button -->

                                    <button class="flex-c-m size2 bg1 bo-rad-3 hov1  trans-0-4 btn-primary m-b-10">

                                        @Lang('site.sign_in')

                                    </button>


                                    <a class="text-primary Forgot-pw f-bold" href="#" data-toggle="modal"
                                        data-target=".bd-create-modal">@Lang('site.forgot_your_password_?') <span>
                                            @Lang('site.click_here')</span></a>

                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 p-b-30  ">
                            <form class="leave-comment">



                                <div class="login-box">
                                    <a href="#" class="social-button" id="google-connect"> <span>Connect with
                                            Google</span></a>
                                    <a href="#" class="social-button" id="twitter-connect"> <span>Connect with Twitter
                                        </span></a>
                                    <a href="{{url('/redirect')}}" class="social-button" id="facebook-connect"> <span>Connect with
                                            Facebook</span></a>


                                </div>


                            </form>
                        </div>
                        <div class="col-lg-3"> </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div id="result"></div>
                    <div class="row ">
                        <div class="col-lg-3"> </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 p-b-30 bo-r">
                            <form class="leave-comment" action="{{ route('memberAuth.register') }}" method="post" id="registerForm">
                                @csrf
                                <label> @Lang('site.name') </label>

                                <div class="bo4 size15 m-b-30">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name">
                                    <label class="text-danger error" data-error="name"></label>

                                </div>

                                <label>@Lang('site.email') </label>

                                <div class="bo4 size15 m-b-30">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email">
                                    <label class="text-danger error" data-error="email"></label>

                                </div>
                                <label>@Lang('site.password') </label>
                                <div class="bo4 size15 m-b-30">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password">
                                    
                                    <label class="text-danger error" data-error="password"></label>
                                    
                                </div>

                                <label>@Lang('site.human') </label>
                                <div class="bo4 size15 m-b-30">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="human" placeholder="{{$captchaQuestion}}">
                                    <label class="text-danger error" data-error="human"></label>

                                </div>

                                {{-- <label>@Lang('site.confirm_password') </label>
                                <div class="bo4 size15 m-b-30">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="password"
                                        name="password_confirmation">
                                        <label class="text-danger error" data-error="password_confirmation"></label>

                                </div> --}}

                                {{-- <p class="text-danger p-b-20 font-14"> it appears that you already have an account with
                                    us . Please <a href="login.html" class="text-primary hover-me font-16"> Sign in</a>
                                    instead </p> --}}
                                <div class="">
                                    <!-- Button -->
                                    <button class="flex-c-m size2 bg1 bo-rad-3 hov1  trans-0-4 btn-primary">

                                        @Lang('site.register_now')

                                    </button>


                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 p-b-30  ">
                            <form class="leave-comment">


                                <div class="login-box">
                                    <a href="#" class="social-button" id="twitter-connect"> <span>Connect with Twitter
                                        </span></a>
                                    <a href="{{url('/redirect')}}" class="social-button" id="facebook-connect"> <span>Connect with
                                            Facebook</span></a>
                                    <a href="#" class="social-button" id="google-connect"> <span>Connect with
                                            Google</span></a>

                                </div>


                            </form>
                        </div>

                        <div class="col-lg-3"> </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<!--  end login  -->

@push('scripts')
    
{{-- <script>
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        $('.error').html('');
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                $('#result-login').html('<div class="alert alert-success">' + data
                    .success + '</div>');

                window.scrollTo(0, 50);
                $('#result-login').fadeIn();
                window.location.reload();

            },
            error(error) {
                let errors = error.responseJSON.errors
                for (let key in errors) {
                    let errorDiv = $(`.error[data-error="${key}"]`);
                    if (errorDiv.length) {
                        errorDiv.text(errors[key][0]);
                    }
                }
            }
        });
    });
</script>
--}}
<script>
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();
        $('.error').html('');
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                $('#result').html('<div class="alert alert-success">' + data
                    .success + '</div>');

                window.scrollTo(0, 50);
                $('#result').fadeIn();
                setTimeout(function () {
                    window.location.replace('{{ route("index") }}');
                }, 4000);

            },
            error(error) {
                let errors = error.responseJSON.errors
                for (let key in errors) {
                    let errorDiv = $(`.error[data-error="${key}"]`);
                    if (errorDiv.length) {
                        errorDiv.text(errors[key][0]);
                    }
                }
            }
        });
    });
</script>
@endpush

@endsection