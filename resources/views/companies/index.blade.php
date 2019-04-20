@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Companies
            </div>
            <div class="card-body">
                <a href="/companies/create" class="btn btn-success">
                    Create new company
                </a>
                <div class="card mt-4">
                    <div class="card-header">
                        Companies list
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Website</th>
                                    <th>Email</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies as $company)
                                    <tr>
                                        <td><img src="{{$company->logo_path}}"> </td>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->adress}}</td>
                                        <td>{{$company->website}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>
                                            <a class="btn btn-light" href="/companies/edit/{{$company->id}}">
                                                Edit
                                            </a>
                                            <form action="/companies/{{$company->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company and all of its employees?')">
                                                {{@csrf_field()}}
                                                {{@method_field('delete')}}
                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            No companies
                                        </td>

                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$companies->links()}}
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
