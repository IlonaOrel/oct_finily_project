@extends('layouts.app')
@section('aside')
    @parent
    <div class="row">
        <h4>
            <a  href="{{ route('patients.edit', $patient->id)}}">
                Edit data patient
            </a>
        </h4>
    </div>
    <div class="row">
        <h4>
            <a  href="{{ route('cards.create')}}">
                New visit
            </a>
        </h4>
    </div>
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details">
            <div class="row">
                <div class="col-sm-5">
                    <div class="view-product">
                        <img src="{{\App\models\Patient::getImage($patient->photo)}}" class="img-thumbnail img-fluid" width="50%" alt="Photo patient" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="product-information">
                        <h2>{{$patient->name}}</h2>
                        <p> Birthday: {{$patient->birthday}}</p>
                        <p> Address: {{$patient->address}}</p>
                        <p> Phone: {{$patient->phone}}</p>
                        <p> Email: {{$patient->email}}</p>
                        <p> Confidant: {{$patient->confidant}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (count($visits) > 0)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table table-striped task-table">
                                    <br/>
                                    <h3>Patient appeals</h3>
                                    <!-- Заголовок таблицы -->
                                    <thead>
                                    <tr>
                                        <th>Date visit</th>
                                        <th>Doctor</th>
                                        <th>Examination</th>
                                        <th>Conclusion</th>
                                        <th>Treatment</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($visits as $visit)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{$visit->date_visit}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->doctor->name}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->examination->name}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->conclusion}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->treatment}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$visit->status->name}}</div>
                                            </td>
                                            @if($visit->status->name !=='discharged')
                                                <td>
                                                    <a  href="{{ route('cards.edit',  $visit->id) }}">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-btn"></i> Edit
                                                        </button>
                                                    </a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                        <div>
                            <a  href="{{ route('cards.create') }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> New visit
                                </button>
                            </a>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection