@extends('layouts.app')
@section('title-block')
    all doctors
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if (count($doctors) > 0)
                    <div class="padding-centre">
                        <div class="features_items">
                            <!--features_items-->
                            <h1 class="title text-center">All doctors</h1>\
                            @foreach ($doctors as $doctor)
                                <div class="col-sm-4 padding-10">
                                    <div class="doctors-image-wrapper">
                                        <div class="single-doctors">
                                            <div class="doctorsinfo text-center">
                                                <img src="{{App\models\Doctor::getImage($doctor->photo)}}" class="img-thumbnail" alt="Photo patient" />
                                                <a href="{{ route('doctors.show', $doctor->id)}}">
                                                    <h2>{{$doctor->name}}</h2>
                                                </a>
                                                <div>{{ $doctor->specialization->name}}</div>
                                                <div>{{ $doctor->phone }}</div>
                                                <div>{{ $doctor->email }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div>Sorry, doctors epsent!</div>
                @endif
            </div>
        </div>
    </div>
@endsection



