@extends('layouts.app')
@section('title-block')
    create doctor
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        @include('common.errors')
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('doctors.store') }}">
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
                                <label for="phone" class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="phone" value="{{ old('phone') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="specialization" class="col-md-4 control-label">Specialization</label>
                                @if(count($specializations)>0)
                                <div class="col-md-6">
                                    <input list="specialization_id" class="form-control" name="specialization_id" value=""/>
                                    <datalist id="specialization_id">
                                        @foreach($specializations as $specialization)
                                        <option value="{{$specialization->name}}"></option>
                                        @endforeach
                                    </datalist>
                                    <input type="hidden" class="form-control" name="specialization_id" value="{{$specialization->id}}"/>                                                     </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> Register
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
