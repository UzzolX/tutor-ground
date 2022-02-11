@extends('layouts.main')
@section('content')

<div style="height: 113px;"></div>
<div class="container">
  <div class="row">
    <h2>{{$categoryName->name}}</h2>
    <div class="col-md-12">
      <div class="rounded border tutions-wrap">
        @if(count($tutions)>0)
        @foreach($tutions as $tution)

        <a href="{{route('tutions.show',[$tution->id,$tution->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom @if($tution->type=='parttime') partime @elseif($tution->type=='fulltime')fulltime @else freelance   @endif;">
          <div class="company-logo blank-logo text-center text-md-left pl-3">
            <img src="{{asset('uploads/logo')}}/{{$tution->student->logo}}" alt="Image" class="img-fluid mx-auto">
          </div>
          <div class="job-details h-100">
            <div class="p-3 align-self-center">
              <h3>{{$tution->position}}</h3>
              <div class="d-block d-lg-flex">
                <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$tution->student->sname}}</div>
                <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($tution->address,20)}}</div>
                <div><span class="icon-money mr-1"></span>{{$tution->salary}}</div>
                <div>&nbsp;<span class="fa fa-clock-o mr-1"></span>{{$tution->created_at->diffForHumans()}}</div>
              </div>
            </div>
          </div>
          <div class="job-category align-self-center">
            @if($tution->type=='fulltime')
            <div class="p-3">
              <span class="text-info p-2 rounded border border-info">{{$tution->type}}</span>
            </div>
            @elseif($tution->type=='parttime')
            <div class="p-3">
              <span class="text-danger p-2 rounded border border-danger">{{$tution->type}}</span>
            </div>
            @else
            <div class="p-3">
              <span class="text-warning p-2 rounded border border-warning">{{$tution->type}}</span>
            </div>
            @endif

          </div>
        </a>

        @endforeach
        @else 
        No tutions found
        @endif


      </div>
    </div>

    {{$tutions->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}



  </div>
</div>
<br>

@endsection