@extends('layouts.admin')

@section('content')
    @foreach($doctors as $doc)
        <div class="row">
            <div class="col-sm-7 col-6">
                <h4 class="page-title">Profile</h4>
            </div>


            <div class="col-sm-5 col-6 text-right m-b-30">
                <a href="{{ route('doctor.profile.edit',["id"=>$doc->id]) }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Modifier</a>
            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view" style="margin-bottom: 50px!important;">
                        <div class="profile-img-wrap" >
                            <div class="profile-img">
                                @if($res == 1)
                                <a href="#"><img class="avatar" src="{{ asset('storage/'.$doc->pictureUrl) }}" alt=""></a>
                                    <hr>

                                    @elseif($res == 0)
                                    <a href="#"><img class="avatar" src="{{ asset('img/user.jpg') }}" alt=""></a>
                                    <hr>
                                    @endif
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        @if($res)
                                        <h3 class="user-name m-t-0 mb-0">{{ $doc->firstName.' '.$doc->lastName }}</h3>
                                        <small class="text-muted">{{$doc->type}}</small>
                                        <div class="staff-id">Specialite : {{ $doc->speciality }}</div>

                                       @elseif($res == 0)

                                            <h3 class="user-name m-t-0 mb-0"> {{ $doc->name }} </h3>
                                            <small class="text-muted"> </small>
                                            <div class="staff-id">Specialite : </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        @if($res)
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">{{$doc->phoneNumber}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{ $doc->email }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Birthday:</span>
                                            <span class="text">{{ $doc->birthdate }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{ $doc->address }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text">{{ $doc->gender }}</span>
                                        </li>

                                        @elseif($res == 0)

                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text"><a href="#"></a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="#">{{  $doc->email }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Birthday:</span>
                                                <span class="text"></span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text"></span>
                                            </li>
                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text"></span>
                                            </li>
                                            @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-tabs">

                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">à propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Université et Expérience</a></li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">à propos du docteur</h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#/" class="name">{{ $doc->about }}</a>
                                                        <div></div>
                                                        <span class="time"></span>
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

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-box">
                                                <h3 class="card-title">Université</h3>
                                                <div class="experience-box">
                                                    <ul class="experience-list">
                                                        <li>
                                                            <div class="experience-user">
                                                                <div class="before-circle"></div>
                                                            </div>
                                                            <div class="experience-content">
                                                                <div class="timeline-content">
                                                                    <a href="#/" class="name">{{ $doc->university }}</a>

                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-box mb-0">
                                                <h3 class="card-title"> Expérience</h3>
                                                <div class="experience-box">
                                                    <ul class="experience-list">
                                                        <li>
                                                            <div class="experience-user">
                                                                <div class="before-circle"></div>
                                                            </div>
                                                            <div class="experience-content">
                                                                <div class="timeline-content">
                                                                    <a href="#/" class="name">{{ $doc->experience }}</a>

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
                        </div>

                    </div>

                </div>
        </div>
    @endforeach

@endsection