@extends('layouts.main')

@section('content')

<div class="container">
    <div style="height: 113px;"></div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Create a tution</div>
                <div class="card-body">

                    <form action="{{route('tution.store')}}" method="POST">@csrf

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="summernote" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="role">Medium</label>
                            <textarea name="medium" class="form-control {{ $errors->has('medium') ? ' is-invalid' : '' }}">{{old('medium')}}</textarea>
                            @if ($errors->has('medium'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('medium') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="class">class:</label>
                            <input type="text" name="class" class="form-control {{ $errors->has('class') ? ' is-invalid' : '' }}" value="{{ old('class') }}">
                            @if ($errors->has('class'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('class') }}</strong>
                            </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}">
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>




                        <div class="form-group">
                            <label for="number_of_student">No. of std:</label>
                            <input type="text" name="number_of_student" class="form-control{{ $errors->has('number_of_student') ? ' is-invalid' : '' }}" value="{{ old('number_of_student') }}">
                            @if ($errors->has('number_of_student'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('number_of_student') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="group">Year of group:</label>
                            <input type="number" name="group" class="form-control{{ $errors->has('group') ? ' is-invalid' : '' }}" value="{{ old('group') }}">
                            @if ($errors->has('group'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('group') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="type">Gender:</label>
                            <select class="form-control" name="gender">
                                <option value="any">Any</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Salary/year:</label>
                            <select class="form-control" name="salary">
                                <option value="negotiable">Negotiable</option>
                                <option value="2000-5000">2000-5000</option>
                                <option value="50000-10000">5000-10000</option>
                                <option value="10000-20000">10000-20000</option>
                                <option value="30000-500000">50000-500000</option>
                                <option value="500000-600000">500000-600000</option>

                                <option value="600000 plus">600000 plus</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" name="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" value="{{ old('location') }}">
                            @if ($errors->has('location'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status">
                                <option value="1">live</option>
                                <option value="0">draft</option>
                            </select>
                        </div>
                        


                        <div class="form-group">
                            <input type="text" placeholder="yyyy/mm/dd"  class="form-control{{ $errors->has('last_date') ? ' is-invalid' : '' }}" name="last_date" value="{{ old('last_date') }}" autofocus>

                            @if ($errors->has('last_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_date') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>




                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection