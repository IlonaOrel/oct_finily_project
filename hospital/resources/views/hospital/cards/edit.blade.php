@extends('layouts.app')
@section('title-block')
    edit visit
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Examination </div>
                    <div class="panel-body">
                        @include('common.errors')
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('cards.update', $card->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            {{--//todo доработать чтобы отображался текущий пациент--}}
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Patient</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="patient" value="{{ $card->patient->name }}" readonly/>
                                    <input id="name" type="hidden" class="form-control" name="patient_id" value="{{ $card->patient->id }}"/>
                                </div>
                            </div>
                            {{--//todo доработать чтобы отображался текущий доктор--}}
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Doctor</label>
                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="doctor" value="{{ $card->doctor->name}}" readonly/>
                                    <input id="name" type="hidden" class="form-control" name="doctor_id" value="{{ $card->doctor->id }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="examination" class="col-md-4 control-label">Examination</label>
                                @if(count($examinations)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="examination_id">
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
                                    <textarea for="conclusion" name="conclusion" id="conclusion" class="from-control"cols="45" rows="5">{{$card->conclusion }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="treatment" class="col-md-4 control-label">Treatment</label>
                                <div class="col-md-6">
                                    <textarea for="treatment" name="treatment" id="treatment" class="from-control"cols="45" rows="5">{{ $card->treatment }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-md-4 control-label">Date visit</label>
                                <div class="col-md-6">
                                    <input  type="datetime-local" class="form-control" name="date_visit" value="{{str_replace(' ', 'T',$card->date_visit)}}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-md-4 control-label">Status</label>
                                @if(count($statuses)>0)
                                    <div class="col-md-6">
                                        <select size="1" class="form-control"  name="status_id">
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
                                        <i class="fa fa-btn fa-user"></i> Edit
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


