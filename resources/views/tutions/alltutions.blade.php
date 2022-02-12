@extends('layouts.main')
@section('content')


<div style="height: 200px;"></div>
<div class="container">
  <div class="row" >
    <form action="{{route('alltutions')}}" class="align-box" method="GET" style="width: 100%;">
      <div class="alljobserach">
        <div class="row">
          <div class="col-xl-6" >
            <div class="form-group">
              <label>Position&nbsp;</label>
              <input type="text" name="position" class="form-control" placeholder="Position">&nbsp;&nbsp;&nbsp;
            </div>
          </div>
          <div class="col-xl-2" style="display:none">
            <div class="form-group" >
              <label>Employment &nbsp;</label>
              <select class="form-control" name="type">
                <option value="">-select-</option>
                <option value="fulltime">fulltime</option>
                <option value="parttime">parttime</option>
                <option value="casual">casual</option>
              </select>
              &nbsp;&nbsp;
            </div>
          </div>
          <div class="col-xl-3" style="display:none">
            <div class="form-group">
              <label>category</label>
              <select name="category_id" class="form-control">
                <option value="">-select-</option>
    
                @foreach(App\Category::all() as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
              </select>
              &nbsp;&nbsp;
            </div>
          </div>
         
          <div class="col-xl-5" >
            <div class="form-group">
              <div class="row">
                <div class="col-xl-6" style="display:none">
                  <div class="address-serach">
                    <label>address</label>
                    <input type="text" name="address" class="form-control" placeholder="address">&nbsp;&nbsp;
                  </div>
                </div>
                <div class="col-xl-6"  >
                  <div class="serach-button">
                    <input type="submit"  class="btn btn-search btn-primary btn-block" value="Search">
                  </div>
                </div>
              </div>
             
              
              
            </div>
          </div>
         
          
        </div> 
      </div>
      

    </form>

    <div class="col-md-12">
      <div class="rounded border jobs-wrap">
        @if(count($tutions)>0)
        @foreach($tutions as $tution)

        <a href="{{route('tutions.show',[$tution->id,$tution->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom @if($tution->type=='parttime') partime @elseif($tution->type=='fulltime')fulltime @else freelance   @endif;">
          {{-- <div class="company-logo blank-logo text-center text-md-left pl-3">
            <img src="{{asset('uploads/logo')}}/{{$tution->student->logo}}" alt="Image" class="img-fluid mx-auto">
          </div> --}}
          <div class="job-details h-100">
            <div class="p-3 align-self-center">
              <h3>{{$tution->title}}</h3>
              <div class="d-block d-lg-flex">
                <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$tution->student->sname}}</div>
                <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($tution->location,20)}}</div>
                <div><span class="icon-money mr-1"></span>{{$tution->salary}}</div>
                <div>&nbsp;<span class="fa fa-clock-o mr-1"></span>{{$tution->created_at->diffForHumans()}}</div>
              </div>
            </div>
          </div>
          {{-- <div class="job-category align-self-center">
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

          </div> --}}
        </a>

        @endforeach
        @else
        No tutions found
        @endif


      </div>
    </div>

    <div style="margin-left: 15px;margin-top: 15px;">
      {{$tutions->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
    </div>

  </div>

</div>
<div style="height: 113px;"></div>




@endsection