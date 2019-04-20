@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Create employee
            </div>
            <div class="card-body">
                <form method="POST" action="/employees/{{$employee->id}}" enctype="multipart/form-data">
                    {{@method_field('put')}}
                    {{@csrf_field()}}
                    <div class="card">
                        <div class="card-header">
                            New company
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="firstname">Firstname</label>
                                        @if($errors->has('firstname'))
                                            <p class="alert alert-danger">{{$errors->first('firstname')}}</p>
                                        @endif
                                        <input type="text" class="form-control mb-4" name="firstname" id="firstname" value="{{$employee->firstname}}">
                                    </div>
                                    <div class="col">
                                            <label for="lastname">Lastname</label>
                                            @if($errors->has('lastname'))
                                                <p class="alert alert-danger">{{$errors->first('lastname')}}</p>
                                            @endif
                                            <input type="text" class="form-control mb-4" name="lastname" id="lastname" value="{{$employee->lastname}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="email">Email</label>
                                        @if($errors->has('email'))
                                            <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                        @endif
                                        <input type="text" class="form-control" name="email" id="email" value="{{$employee->email}}">
                                    </div>
                                    <div class="col">
                                        <label for="phone">Phone</label>
                                        @if($errors->has('phone'))
                                            <p class="alert alert-danger">{{$errors->first('phone')}}</p>
                                        @endif
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$employee->phone}}" >
                                    </div>
                                    <div class="col">
                                        <label for="company_id">Company</label>
                                        @if($errors->has('company_id'))
                                            <p class="alert alert-danger">{{$errors->first('company_id')}}</p>
                                        @endif
                                        <select name="company_id" id="company_id" class="form-control">
                                            @foreach($companies as $company)
                                                <option
                                                    {{$company->id==$employee->company->id?'selected':''}}
                                                    value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary float-right">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>

@endsection
