@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Appointment</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form method="get" action="{{ route('appointment.store') }}">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Patient Name</label>
                            <select name="patient_name" id="names">
                                <option></option>
                                @foreach($patients as $patient)
                                    <option value="{{$patient->id}}" >
                                        {{ $patient->firstName.' '.$patient->lastName.' ( '.$patient->birthdate.' )' }}

                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control @error('date') is-invalid @enderror datetimepicker" name="date">

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Time</label>
                            <div class="time-icon">
                                <input type="text" class="form-control" id="datetimepicker3" name="time">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Remarques</label>
                    <textarea cols="30" rows="4" class="form-control" name="remark"></textarea>
                </div>

                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create Appointment</button>
                </div>
            </form>
        </div>
    </div>



@endsection
