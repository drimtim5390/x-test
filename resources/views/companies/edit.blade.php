@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit company
            </div>
            <div class="card-body">
                <form method="post" action="/companies/{{$company->id}}" enctype="multipart/form-data">
                    {{@method_field('PUT')}}
                    {{@csrf_field()}}
                    <div class="card">
                        <div class="card-header">
                            Company info
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                @if($errors->has('name'))
                                    <p class="alert alert-danger">{{$errors->first('name')}}</p>
                                @endif
                                <input type="text" class="form-control mb-4" name="name" id="name" value="{{$company->name}}">
                                <label for="adress">Adress</label>
                                @if($errors->has('adress'))
                                    <p class="alert alert-danger">{{$errors->first('adress')}}</p>
                                @endif
                                <input type="text" class="form-control mb-4" name="adress" id="adress" value="{{$company->adress}}">
                                <div class="row">
                                    <div class="col">
                                        <label for="website">Website</label>
                                        @if($errors->has('website'))
                                            <p class="alert alert-danger">{{$errors->first('website')}}</p>
                                        @endif
                                        <input type="text" class="form-control" name="website" id="website" value="{{$company->website}}">
                                    </div>
                                    <div class="col">
                                        <label for="email">Email</label>
                                        @if($errors->has('email'))
                                            <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                        @endif
                                        <input type="text" class="form-control" name="email" id="email" value="{{$company->email}}">
                                    </div>
                                    <div class="col">
                                        <label for="logo">Logo</label>
                                        @if($errors->has('logo'))
                                            <p class="alert alert-danger">{{$errors->first('logo')}}</p>
                                        @endif
                                        <input type="file" class="form-control-file space" name="logo" id="logo">
                                        <img src="{{$company->logo_path}}">
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
