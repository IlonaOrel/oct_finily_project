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
                                <label for="name" class="col-md-4 control-label">Patient</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                                </div>
                            </div>
                            {{--//todo доработать чтобы отображался текущий доктор--}}
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Doctor</label>
                                <div class="col-md-6">
                                    <input  type="file" class="form-control" name="photo" value="{{ old('doctor') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="specialization" class="col-md-4 control-label">Examination</label>
                                @if(count($examinations)>0)
                                    <div class="col-md-6">
                                        <input list="examination_id" class="form-control" name="examination_id" value=""/>
                                        <datalist id="examination_id">
                                            @foreach($examinations as $examination)
                                                <option value="{{$examination->name}}"></option>
                                            @endforeach
                                        </datalist>
                                        <input type="hidden" class="form-control" name="examination_id" value="{{$examination->id}}"/>                                                     </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="conclusion" class="col-md-4 control-label">Conclusion</label>
                                <div class="col-md-6">
                                    <textarea for="conclusion" name="conclusion" id="conclusion" class="from-control"cols="45" rows="5">
                                        {{ old('conclusion') }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="treatment" class="col-md-4 control-label">Treatment</label>
                                <div class="col-md-6">
                                    <textarea for="treatment" name="treatment" id="treatment" class="from-control"cols="45" rows="5">
                                        {{ old('treatment') }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-md-4 control-label">Date visit</label>
                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="date_visit" value="{{ old('date') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-md-4 control-label">Status</label>
                                @if(count($statuses)>0)
                                    <div class="col-md-6">
                                        <input list="status_id" class="form-control" name="status_id" value=""/>
                                        <datalist id="status_id">
                                            @foreach($statuses as $status)
                                                <option value="{{$status->name}}"></option>
                                            @endforeach
                                        </datalist>
                                        <input type="hidden" class="form-control" name="status_id" value="{{$status->id}}"/>                                                     </div>
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

