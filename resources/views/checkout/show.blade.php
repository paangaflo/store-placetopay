@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('Order') }}: {{ $order->id }}</h1>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-secondary" href="/home">{{ __('Home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover table-bordered">
                            <caption>{{ __('List of Employees') }}</caption>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">{{ __('ID') }}</th>
                                <th scope="col" class="text-center">{{ __('FIRST NAME') }}</th>
                                <th scope="col" class="text-center">{{ __('LAST NAME') }}</th>
                                <th scope="col" class="text-center">{{ __('EMAIL') }}</th>
                                <th scope="col" class="text-center">{{ __('PHONE') }}</th>
                                <th scope="col" class="text-center">{{ __('OPTIONS') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row" class="align-middle text-center">{{ $employee->id }}</th>
                                    <td class="align-middle">{{ $employee->first_name }}</td>
                                    <td class="align-middle">{{ $employee->last_name }}</td>
                                    <td class="align-middle">{{ $employee->email }}</td>
                                    <td class="align-middle">{{ $employee->phone }}</td>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-primary btn-sm" href="/companies/{{ $company->id }}/employees/{{ $employee->id }}/edit">{{ __('Edit') }}</a>
                                        <a class="btn btn-primary btn-sm" href="/companies/{{ $company->id }}/employees/{{ $employee->id }}/confirmDelete">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="pagination pagination-centered">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
