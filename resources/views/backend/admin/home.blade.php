@extends('backend.mastaring.master')

@section('content')

 <!-- BEGIN: Content-->
 <div class="row match-height">
    <!-- Medal Card -->
    <div class="col-xl-4 col-md-6 col-12">
        <div class="card card-congratulation-medal">
            <div class="card-body">
                <h5>Congratulations 🎉 {{ Auth::user()->name }}</h5>
                <h4 class="card-text ">You have Message</h4>
                <h3 class="mb-75 mt-4 pt-50">
                    <a href="javascript:void(0);">Unread Message( )</a>
                </h3>
                <a href="" class="btn btn-primary">View Message</a>
                
                {{-- <img src="{{ ('uploads/user/'.Auth::user()->image) }}app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" /> --}}
            </div>
        </div>
    </div>
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    <div class="col-xl-8 col-md-6 col-12">
        <div class="card card-statistics mr-5">
            <div class="card-header ">
                <h4 class="card-title">Welcome Back {{ Auth::user()->name }}</h4>
                {{-- <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 mr-25 mb-0">Updated {{ \Carbon\Carbon::today()}} </p>
                </div> --}}


                {{-- value="{{ \Carbon\Carbon::parse(request()->end_date)->format('Y-m-d') }} --}}
            </div>
            <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar bg-light-primary mr-2">
                                <div class="avatar-content">
                                    <i data-feather='slack'></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0"></h4>
                                <p class="card-text font-small-3 mb-0">Service</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar bg-light-info mr-2">
                                <div class="avatar-content">
                                    <i data-feather='users'></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <a href="" class="font-weight-bolder mb-0">
                                <p class="card-text font-small-3 mb-0">Team Member</p> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                        <div class="media">
                            <div class="avatar bg-light-danger mr-2">
                                <div class="avatar-content">
                                    <i data-feather='activity'></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <a href="" class="font-weight-bolder mb-0">
                                <p class="card-text font-small-3 mb-0">Recent Work</p> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="media">
                            <div class="avatar bg-light-success mr-2">
                                <div class="avatar-content">
                                    <i data-feather='award'></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <a href="" class="font-weight-bolder mb-0">
                                <p class="card-text font-small-3 mb-0">Feedback</p> 
                            </a>
                            </div>
                        </div>
                    </div>
                   <div class="m-2 ">
                    {{-- <a  href="{{ route('admin.serviceview') }}" class="btn btn-primary ">Add Service</a>
                    <a  href="{{ route('admin.teamview') }}" class="btn btn-primary ">Add Team</a>
                    <a  href="{{ route('admin.addrecentwork') }}" class="btn btn-primary  ">Add Recent Work</a>
                    <a  href="{{ route('feedback.addview') }}" class="btn btn-primary ">Add Feedback</a> --}}
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics Card -->
</div>


{{-- <div class="col-12">
    <div class="card">
        <div class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
        
            <div class="d-flex align-items-center flex-wrap mt-sm-0 mt-1">
                <h5 class="font-weight-bolder mb-0 mr-1"></h5>
            
            </div>
        </div>
        <div class="card-body">
            <h1 class="ml-4">Message Chart</h1>
            <div id="line-chart"></div>
        </div>
    </div>
</div> --}}

{{-- Bar Chart  --}}



                <!-- Bar Chart Starts -->
{{-- <div class="col-12">
    <div class="card">
        <div class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
        </div>
        <div class="card-body">
            <h1 class="ml-4">Subcription Chart</h1>
            <div id="bar-chart"></div>
        </div>
    </div>
</div> --}}

   

   <!-- Area Chart starts -->
{{-- <div class="col-12">
    <div class="card">
        <div class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
            <div>
                <h3 class="ml-4 card-title">Client Feedback Chart</h3>
                
            </div>
            
        </div>
        
        
        <div class="card-body">
            <div id="line-area-chart"></div>
        </div>
    </div>
</div> --}}
<!-- Area Chart ends -->



@endsection
    

