@extends('layouts.admin')

@section('content')
    @foreach($patients as $patient)
    <div class="row">
        <div class="col-sm-7 col-6">
            <h4 class="page-title">My Profile</h4>
        </div>


        <div class="col-sm-5 col-6 text-right m-b-30">
            <a href="{{ route('patient.edit',['id'=>$patient->id]) }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Modifier</a>
        </div>
    </div>
    <div class="card-box profile-header">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="#"><img class="avatar" src="{{ asset('storage/'.$patient->pictureUrl)  }}" alt=""></a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0">{{ $patient->firstName.' '.$patient->lastName }}</h3>
                                    <small class="text-muted">{{$patient->type}}</small>
                                    <div class="staff-id">ID : {{ $patient->cardNumber }}</div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <span class="title">Phone:</span>
                                        <span class="text"><a href="#">{{$patient->phoneNumber}}</a></span>
                                    </li>
                                    <li>
                                        <span class="title">Email:</span>
                                        <span class="text"><a href="#">{{ $patient->email }}</a></span>
                                    </li>
                                    <li>
                                        <span class="title">Birthday:</span>
                                        <span class="text">{{ $patient->birthdate }}</span>
                                    </li>
                                    <li>
                                        <span class="title">Address:</span>
                                        <span class="text">{{ $patient->address }}</span>
                                    </li>
                                    <li>
                                        <span class="title">Gender:</span>
                                        <span class="text">{{ $patient->gender }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-tabs">

        <form method="get" action="{{route('diagnosis.store',['pid'=>$patient->id])}}">
            @csrf
        <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Diagnostique</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Traitement</a></li>

            <input type="submit" value="Enregister" class="btn float-right btn-primary ">
        </ul>


        <div class="tab-content">
            <div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Détails du diagnostique</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" cols="" name="diag_details">@if($diagnosis){{$patient->diag_details}}@endif</textarea>
                                                </div>

                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="materialChecked2" name="">
                                                <label class="form-check-label" for="materialChecked2">Maladie Chronique</label>

                                                @if($diagnosis)
                                                <input class="form-control" name="chronic" type="text" value="{{$patient->chronic}}">
                                                    @else
                                                    <input class="form-control" name="chronic" type="text" >

                                                @endif


                                            </div>
                                        </div>
                                    </li>
                                    <li>



                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Remarques</a>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" cols="30" name="diag_remark">@if($diagnosis){{ $patient->remark }}@endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane" id="bottom-tab2">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Détails du traitement</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" cols="30" name="treatment">@if($diagnosis){{$patient->medicines}}@endif</textarea>
                                                </div>

                                                <span class="time">{{ $patient->created_at}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Remarques</a>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" cols="30" name="med_remark">@if($diagnosis){{ $patient->med_remark }}@endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        </form>
    </div>
@endforeach

@endsection
