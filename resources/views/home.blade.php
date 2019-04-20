@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Choose menu
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-success btn-block" href="/companies">
                            Companies
                        </a>
                    </div>
                    <div class="col">
                        <a class="btn btn-primary btn-block" href="/employees">
                            Employees
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
