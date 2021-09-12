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
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $patient->name }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Photo</label>
                                <div class="col-md-6">
                                    <input  type="file" class="form-control" name="photo" value="{{$patient->photo}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="col-md-2 control-label">Birthday</label>
                                <div class="col-md-6">
                                    <input  type="date" class="form-control" name="birthday" value="{{ $patient->birthday }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-md-2 control-label">Address</label>
                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="address" value="{{ $patient->address }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-2 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="phone" value="{{ $patient->phone }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label">E-Mail</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $patient->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confidant" class="col-md-2 control-label">Confidant</label>
                                <div class="col-md-6">
                                    <input id="confidant" type="text" class="form-control" name="confidant" value="{{ $patient->confidant }}">
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