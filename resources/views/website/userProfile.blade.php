@extends('layouts.website.app')

@section('title')
{{$member->name}}
@endsection

@section('content')

<div class="user_profile">
    <div class="container">
        <div class="row">
            <div class="profile_name">
                <h3>{{$member->name}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-ideabook-tab" data-toggle="tab" href="#nav-ideabook"
                            role="tab" aria-controls="nav-ideabook" aria-selected="true">Ideabooks</a>
                        <a class="nav-item nav-link" id="nav-orders-tab" data-toggle="tab" href="#nav-orders" role="tab"
                            aria-controls="nav-orders" aria-selected="false">Orders</a>
                        <a class="nav-item nav-link" id="nav-activity-tab" data-toggle="tab" href="#nav-activity"
                            role="tab" aria-controls="nav-activity" aria-selected="false">Activity</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-ideabook" role="tabpanel"
                        aria-labelledby="nav-ideabook-tab">

                        <div class="card-deck">



                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
                        <div class="orders-history">
                            <h3>Your Orders</h3>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-activity" role="tabpanel" aria-labelledby="nav-activity-tab">
                        <div class="activity">
                            <h3>Recent Activity</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection