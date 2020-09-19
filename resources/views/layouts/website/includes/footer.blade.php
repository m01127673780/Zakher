<footer class="bg6 p-t-35 p-l-45 p-r-45">
    <div class="container">
        <div class="row p-b-90">
            <div class="col-md-12 text-center">

            </div>
            <div class="col-md-3  col-sm-6 p-t-20 p-l-15 p-r-15">
                <h4 class="s-text12">@Lang('site.CONNECT_WITH_US')</h4>
                <div>
                    <ul class="social-icons top-i icon-circle icon-rotate list-unstyled list-inline">
                        <li>
                            <p class=" s-text7">
                                @if (app()->getLocale() == "ar")                                
                                    {{$settings->job_times_ar}}
                                @else
                                {{$settings->job_times_en}}

                                @endif </p>
                        </li>
                        <li> <a href="" target="_blank"> <i class="fa fa-phone" aria-hidden="true"></i>
                                <span class="footer-icon" dir="ltr">  {{$settings->phone}} </span>
                            </a>
                        </li>
                        <li> <a href="{{$settings->facebook}}" target="_blank"><i class="fa fa-facebook fa-top"></i>
                                <span class="footer-icon">facebook </span>
                            </a>
                        </li>
                        <li> <a href="{{$settings->twitter}}">
                                <i class="fa fa-twitter fa-top" target="_blank"></i>
                                <span class="footer-icon">twitter </span>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="col-md-3  col-sm-6 p-t-20 p-l-15 p-r-15 ">
                <h4 class="s-text12"> @Lang('site.COMPANY')</h4>
                <ul>


                    <li class="p-b-9"> <a href="hwo-to-buy.html" class="s-text7">About us</a></li>
                    <li class="p-b-9"> <a href="hwo-to-buy.html" class="s-text7"> Be Partner with us</a></li>

                </ul>
            </div>

            <div class="col-md-3 col-sm-6 p-t-20 p-l-15 p-r-15 ">
                <h4 class="s-text12"> @Lang('site.GET_HELP')</h4>
                <ul>

                    <li class="p-b-9"> <a href="Order.html" class="s-text7"> Your Orders </a></li>


                    <li class="p-b-9"> <a href="contact.html" class="s-text7"> Contact Us </a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 p-t-20 p-l-15 p-r-15 ">
                <h4 class="s-text12"> @Lang('site.SHARE_YOUR_IDEAS')</h4>
                <p class="s-text7"> We love hearing from you. Send ideas and comments to </p>
                <a href="#" class=" s-text7 get-contact">Click here.</a>
            </div>

        </div>
    </div>
</footer>