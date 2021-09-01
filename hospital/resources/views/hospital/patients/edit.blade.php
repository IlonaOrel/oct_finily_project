@extends('layouts.app')

@section('title-block')
    edit patient
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Edit data about patient</h4></div>
                    <div class="panel-body">
                        @include('common.errors')
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('patients.update', $patient->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $patient->name }}"/>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Photo</label>

                                <div class="col-md-6">
                                    <input  type="file" class="form-control" name="photo" value="{{$patient->photo}}"/>
                                    {{--TODO--}}
                                    {{--                                    @if ($errors->has('file'))--}}
                                    {{--                                        <span class="help-block">--}}
                                    {{--                                        <strong>{{ $errors->first('file') }}</strong>--}}
                                    {{--                                    </span>--}}
                                    {{--                                    @endif--}}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label for="birthday" class="col-md-2 control-label">Birthday</label>

                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="birthday" value="{{ $patient->birthday }}"/>

                                    @if ($errors->has('birthday'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-2 control-label">Address</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="address" value="{{ $patient->address }}"/>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-2 control-label">Phone</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="phone" value="{{ $patient->phone }}"/>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-2 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $patient->email }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('confidant') ? ' has-error' : '' }}">
                                <label for="confidant" class="col-md-2 control-label">Confidant</label>

                                <div class="col-md-6">
                                    <input id="confidant" type="text" class="form-control" name="confidant" value="{{ $patient->confidant }}">

                                    @if ($errors->has('confidant'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('confidant') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn"></i> Edit
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