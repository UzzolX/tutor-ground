@extends('layouts.main')
@section('content')
<div style="height: 113px;"></div>

<div class="album text-muted">
    <div class="container">
        <!-- @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        @if(Session::has('err_message'))

        <div class="alert alert-danger">{{Session::get('err_message')}}</div>
        @endif
        @if(isset($errors)&&count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

        @endif -->

        <div class="row" id="app">
            <div class="title" style="margin-top: 20px;">
                <h2>{{$tution->title}}</h2>

            </div>

            <img src="{{asset('hero-job-image.jpg')}}" style="width: 100%;">

            <div class="col-lg-8">


                <div class="p-4 mb-8 bg-white">
                    <!-- icon-book mr-3-->
                    <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Description <a href="#" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>
                    <p> {{$tution->description}}.</p>

                </div>
                <div class="p-4 mb-8 bg-white">
                    <!--icon-align-left mr-3-->
                    <h3 class="h5 text-black mb-3"><i class="fa fa-user" style="color: blue;">&nbsp;</i>medium</h3>
                    <p>{{$tution->medium}} .</p>

                </div>
                <div class="p-4 mb-8 bg-white">
                    <h3 class="h5 text-black mb-3"><i class="fa fa-users" style="color: blue;">&nbsp;</i>Number of
                        student</h3>
                    <p>{{$tution->number_of_student }} .</p>

                </div>
                <div class="p-4 mb-8 bg-white">
                    <h3 class="h5 text-black mb-3"><i class="fa fa-clock-o" style="color: blue;">&nbsp;</i>group
                    </h3>
                    <p>{{$tution->group}}&nbsp;years</p>

                </div>
                <div class="p-4 mb-8 bg-white">
                    <h3 class="h5 text-black mb-3"><i class="fa fa-venus-mars" style="color: blue;">&nbsp;</i>Gender
                    </h3>
                    <p>{{$tution->gender}} </p>

                </div>
                <div class="p-4 mb-8 bg-white">
                    <h3 class="h5 text-black mb-3"><i class="fa fa-dollar" style="color: blue;">&nbsp;</i>Salary</h3>
                    <p>{{$tution->salary}}</p>
                </div>

            </div>


            <div class="col-md-4 p-4 site-section bg-light">
                <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                <p>Student name:{{$tution->student->sname}}</p>
                <p>Address:{{$tution->address}}</p>
                <p>Medium:{{$tution->medium}}</p>
                <p>Class:{{$tution->class}}</p>
                <p>Posted:{{$tution->created_at->diffForHumans()}}</p>

                <p>Last date to apply:{{ date('d-m-Y', strtotime($tution->last_date)) }}</p>



                {{-- <p>
                    <a href="{{route('student.index',[$tution->student->id,$tution->student->slug])}}" class="btn btn-warning" style="width: 100%;">Visit student Page</a>
                </p> --}}
                <p>
                    @if(Auth::check()&&Auth::user()->user_type=='teacher')


                    @if(!$tution->checkApplication())

                    <apply-component :jobid={{$tution->id}}></apply-component>
                    @else
                    <center><span style="color: #000;">You applied to this tution</span></center>
                    @endif
                    <br>
                    <favorite-component :jobid={{$tution->id}} :favorited={{$tution->checkSaved()?'true':'false'}}>
                    </favorite-component>
                    @else

                    @if(Auth::check()&&Auth::user()->user_type=='teacher')
                    Please Login to Apply on this tution
                    @endif

                    @endif

                </p>

            </div>
            @foreach($tutionRecommendations as $tutionRecommendation)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p class="badge badge-success">{{$tutionRecommendation->type}}</p>
                    <h5 class="card-title">{{$tutionRecommendation->position}}</h5>
                    <p class="card-text">{{str_limit($tutionRecommendation->description,90)}}
                        <center> <a href="{{route('tutions.show',[$tutionRecommendation->id,$tutionRecommendation->slug])}}" class="btn btn-success">Apply</a></center>
                </div>
            </div>
            @endforeach


            <!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send tution to your friend</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{-- {{route('mail')}} --}}
                        <form action="" method="POST">@csrf

                            <div class="modal-body">
                                <input type="hidden" name="tution_id" value="{{$tution->id}}">
                                <input type="hidden" name="tution_slug" value="{{$tution->slug}}">

                                <div class="form-goup">
                                    <label>Your name * </label>
                                    <input type="text" name="your_name" class="form-control" required="">
                                </div>
                                <div class="form-goup">
                                    <label>Your email *</label>
                                    <input type="email" name="your_email" class="form-control" required="">
                                </div>
                                <div class="form-goup">
                                    <label>Person name *</label>
                                    <input type="text" name="friend_name" class="form-control" required="">
                                </div>
                                <div class="form-goup">
                                    <label>Person email *</label>
                                    <input type="email" name="friend_email" class="form-control" required="">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Mail this tution</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <br>
        <br>

    </div>
</div>
@endsection