@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit</div>

                                  <div class="panel-body">
                                     @include('common.errors')
                                          <form class="form-horizontal" role="form" method="POST" action="{{ route('doctors.update', $doctor->id) }}">
                                             {{ csrf_field() }}
                                              {{ method_field('PATCH') }}

                                             <div class="form-group">
                                             <label for="name" class="col-md-4 control-label">Name</label>

                                             <div class="col-md-6">
                                                 <input id="name" type="text" class="form-control" name="name" value="{{ $doctor->name }}"/>
                                             </div></div>

                                              <div class="form-group">
                                                   <label for="name" class="col-md-4 control-label">Photo</label>

                                                  <div class="col-md-6">
                                                      <input  type="file" class="form-control" name="photo" value="{{ old('photo')}}"/>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                   <label for="phone" class="col-md-4 control-label">Phone</label>

                                                  <div class="col-md-6">
                                                        <input  type="text" class="form-control" name="phone" value="{{ $doctor->phone }}"/>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                   <label for="specialization" class="col-md-4 control-label">Specialization</label>
                                                      @if(count($specializations)>0)
                                                          <div class="col-md-6">
                                                              <select size="1" class="form-control"  name="specialization_id">
                                                                  @foreach($specializations as $specializations)
                                                                        <option value="{{$specializations->id}}">{{$specializations->name}}</option>
                                                                  @endforeach
                                                              </select>
                                                          </div>
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

