@extends('layouts.app')

@section('title-block')
    all patients
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>All patients</h1>
                     @if (count($patients) > 0)
                          <div class="panel panel-default">
                              <div class="panel-body">
                                    <table class="table table-striped table-hover">
                                          <!-- Заголовок таблицы -->
                                         <thead>
                                         <tr>
                                             <th>Photo</th>
                                             <th>Name</th>
                                             <th>Birthday</th>
                                             <th>Doctor</th>
                                             <th>Status</th>
                                          </tr>
                                   </thead>
                                         <tbody>
                                         @foreach ($patients as $patient)
                                             <tr>
                                                  <td class="table-text">
                                                    <div>
                                                        <img src="{{\App\models\Patient::getImage($patient->photo)}}" class="img-thumbnail img-fluid" width="30%" alt="Photo patient" />
                                                    </div>

                                                  </td>
                                                  <td class="table-text">
                                                      <a href="{{ route('card.id', $patient->id)}}">
                                                     <div>{{ $patient->name }}</div>
                                                      </a>
                                                  </td>
                                                   <td class="table-text">
                                                     <div>{{ $patient->birthday }}</div>
                                                   </td>
                                                   <td class="table-text">
                                                     <div>
                                                          <a href="{{route('doctor.id', $patient->doc)}}">{{$patient->doctor}}</a>
                                                     </div>
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
                     @endif
            </div>
        </div>
    </div>

@endsection



