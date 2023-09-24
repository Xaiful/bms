@extends('backend.layouts.app')
@section('content')
<div class="tabs-animation">
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-success border-success">
                <div class="widget-chat-wrapper-outer">
                    <div class="widget-chart-content pt-3 pl-3 pb-1">
                        <div class="widget-chart-flex">
                            <div class="widget-numbers">
                                <div class="widget-chart-flex">
                                    <span>{{$users}}</span>
                                </div>
                            </div>
                        </div>
                        <h6 class="widget-subheading mb-0 opacity-5">Total Users</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-primary border-primary">
                <div class="widget-chat-wrapper-outer">
                    <div class="widget-chart-content pt-3 pl-3 pb-1">
                        <div class="widget-chart-flex">
                            <div class="widget-numbers">
                                <div class="widget-chart-flex">
                                    <span>{{$roles}}</span>
                                </div>
                            </div>
                        </div>
                        <h6 class="widget-subheading mb-0 opacity-5">Total Roles</h6>
                    </div>
            
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-warning border-warning">
                <div class="widget-chat-wrapper-outer">
                    <div class="widget-chart-content pt-3 pl-3 pb-1">
                        <div class="widget-chart-flex">
                            <div class="widget-numbers">
                                <div class="widget-chart-flex">
                                    <span>{{$permissions}}</span>
                                </div>
                            </div>
                        </div>
                        <h6 class="widget-subheading mb-0 opacity-5">Total Permissions</h6>
                    </div>
               
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-danger border-danger">
                <div class="widget-chat-wrapper-outer">
                    <div class="widget-chart-content pt-3 pl-3 pb-1">
                        <div class="widget-chart-flex">
                            <div class="widget-numbers">
                                <div class="widget-chart-flex">
                                    <div class="fsize-4">
                                        <small class="opacity-5">$</small>
                                        <span>564</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="widget-subheading mb-0 opacity-5">total revenue</h6>
                    </div>
                    <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                        <div class="col-md-9">
                            <div id="dashboard-sparklines-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>



@endsection