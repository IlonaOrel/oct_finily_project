@extends('layouts.app')

@section('aside')
    @parent

             <div class="row">
               <h4>
                  <a  href="{{ route('doctors.edit', $doctor->id)}}">
                  Edit my data
                   </a>
              </h4>
         </div>


@endsection

@section('content')

    <h2>Hello dr.{{$doctor->name}}</h2>

    <div class="col-sm-9 padding-right">
        <div class="product-details">
            <div class="row">

                <div class="col-sm-5">
                    <div class="view-product">
                        <img src="{{\App\models\Doctor::getImage($doctor->photo)}}" class="img-thumbnail " alt="Photo doctor" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="product-information">
                        <h2>{{$doctor->name}}</h2>
                        <p> Specialization: {{$doctor->specialization->name}}</p>
                        <p> Phone: {{$doctor->phone}}</p>
                        <p> Email: {{$doctor->email}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    @if (count($patients) > 0)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <br/>
                                    <h3>My patient</h3>
                                    <!-- Заголовок таблицы -->
                                    <thead>
                                    <tr>
                                        <th>photo</th>
                                        <th>Name</th>
                                        <th>Birthday</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td class="table-text">
                                                <div class="patients-image-wrapper">

                                                    <img src="{{\App\models\Patient::getImage($patient->photo)}}" class="img-thumbnail img-fluid" width="20%" alt="Photo patient" />
                                                </div>
                                            </td>
                                            <td class="table-text">
                                                <a href="{{ route('patients.show', $patient->id)}}">
                                                    <div>{{ $patient->name }}</div>
                                                </a>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $patient->birthday }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $patient->status }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @else
                        <div><h3>You don`t have patients</h3></div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>

@endsection