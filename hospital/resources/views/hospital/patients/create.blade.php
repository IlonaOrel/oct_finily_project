@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new patients</div>
                         <div class="panel-body">
                              @include('common.errors')
                             <form class="form-horizontal" role="form" method="POST" action="{{ route('patients.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Photo</label>

                                    <div class="col-md-6">
                                        <input  type="file" class="form-control" name="photo" value=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="birthday" class="col-md-4 control-label">Birthday</label>

                                    <div class="col-md-6">
                                        <input  type="date" class="form-control" name="birthday" value="{{ old('birthday') }}"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-md-4 control-label">Address</label>

                                    <div class="col-md-6">
                                        <input  type="text" class="form-control" name="address" value="{{ old('address') }}"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="phone" class="col-md-4 control-label">Phone</label>

                                    <div class="col-md-6">
                                        <input  type="text" class="form-control" name="phone" value="{{ old('phone') }}"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="confidant" class="col-md-4 control-label">Confidant</label>
                                    <div class="col-md-6">
                                        <textarea for="confidant" name="confidant" id="confidant" class="from-control"cols="45" rows="5">{{ old('confidant') }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> Register new patient
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

