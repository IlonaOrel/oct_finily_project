@extends('layouts.app')
@section('title-block')
    create visit
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">New visit</div>
                    <div class="panel-body">
                        @include('common.errors')
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('cards.store') }}">
                            {{ csrf_field() }}
                            {{--//todo доработать чтобы отображался текущий пациент--}}
                            <div class="form-group">
                                <label for="patient" class="col-md-4 control-label">Patient</label>
                                @if(count($patients)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="patient_id">
                                            <option>Выберите пациента</option>
                                            @foreach($patients as $patient)
                                                <option value="{{$patient->id}}">{{$patient->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>

                            {{--//todo доработать чтобы отображался текущий доктор--}}
                            <div class="form-group">
                                <label for="doctor" class="col-md-4 control-label">Doctor</label>
                                @if(count($doctors)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="doctor_id">
                                            <option>Выберите доктора</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="examination" class="col-md-4 control-label">Examination</label>
                                @if(count($examinations)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="examination_id">
                                            <option>Выберите вид обследования</option>
                                            @foreach($examinations as $examination)
                                                <option value="{{$examination->id}}">{{$examination->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="conclusion" class="col-md-4 control-label">Conclusion</label>
                                <div class="col-md-6">
                                    <textarea for="conclusion" name="conclusion" id="conclusion" class="from-control"cols="45" rows="5">{{ old('conclusion') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="treatment" class="col-md-4 control-label">Treatment</label>
                                <div class="col-md-6">
                                    <textarea for="treatment" name="treatment" id="treatment" class="from-control"cols="45" rows="5">{{ old('treatment') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date_visit" class="col-md-4 control-label">Date visit</label>
                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="date_visit" value="{{ old('date') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-md-4 control-label">Status</label>
                                @if(count($statuses)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="status_id">
                                            <option>Выберите статус</option>
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

