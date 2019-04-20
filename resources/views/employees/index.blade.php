@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Employees
            </div>
            <div class="card-body">
                <a href="/employees/create" class="btn btn-success">
                    Create new employee
                </a>
                <div class="card mt-4">
                    <div class="card-header">
                        Employees list
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                    <tr>
                                        <td>{{$employee->firstname}}</td>
                                        <td>{{$employee->lastname}}</td>
                                        <td>{{$employee->company->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>
                                            <a class="btn" href="/employees/edit/{{$employee->id}}">
                                                Edit
                                            </a>
                                            <form action="/employees/{{$employee->id}}" method="post" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                                {{@method_field('delete')}}
                                                {{@csrf_field()}}
                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            No employees
                                        </td>

                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$employees->links()}}
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
