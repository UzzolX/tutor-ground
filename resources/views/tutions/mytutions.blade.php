@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))

    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your tutions</div>

                <div class="card-body">

                    <table class="table">

                        <tbody>

                            @foreach($tutions as $tution)
                            <tr>
                                <td>
                                    @if(empty(Auth::user()->company->logo))

                                    <img src="{{asset('avatar/man.jpg')}}" width="80">

                                    @else
                                    <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="80">


                                    @endif



                                </td>
                                <td>Position:{{$tution->position}}
                                    <br>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$tution->type}}
                                </td>
                                <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{$tution->address}}</td>
                                <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date:{{$tution->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('tutions.show',[$tution->id,$tution->slug])}}">
                                        <button class="btn btn-success btn-sm"> Read
                                        </button>
                                    </a>
                                    <br><br>
                                    <a href="{{route('tution.edit',[$tution->id])}}"> <button class="btn btn-dark">Edit</button></a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$tution->id}}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$tution->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete tution</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete?
                                                </div>
                                                <form action="{{route('tution.delete')}}" method="POST">@csrf
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="{{$tution->id}}">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection