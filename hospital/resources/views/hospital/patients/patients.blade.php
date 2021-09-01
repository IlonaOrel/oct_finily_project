@extends('layouts.app')

@section('title-block')
    patients doc#1
@endsection

@section('content')
    <h1>patients doc#1</h1>
    @if (count($patients) > 0)
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped">
                    <!-- Заголовок таблицы -->
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <td class="table-text">
                                <div>{{ $patient->id }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $patient->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $patient->birthday }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $patient->status }}</div>
                            </td>
                            <td>
                                <a href="{{route('patients.edit', $patient->id)}}" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


 @endsection
