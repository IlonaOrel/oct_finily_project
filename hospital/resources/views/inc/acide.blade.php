
@section('aside')
<div class="aside">

    <div class="col-sm-offset-2">
        <div class="row">
            <h4> <a  href="{{ route('hospital.doctors') }}">
                   Our Doctors
                </a>
            </h4>
        </div>
        <div class="row">
            <h4>
                <a  href="{{ route('hospital.patients') }}">
                    Patients
                </a>
            </h4>
        </div>
        <div class="row">
            <h4>
                <a  href="{{ route('patients.create') }}">
                    Add Patient
                </a>
            </h4>
        </div>
        <div > @show</div>
    </div>
</div>




