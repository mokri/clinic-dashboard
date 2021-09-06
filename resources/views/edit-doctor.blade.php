@extends('layouts.admin')

@section('content')

    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">modifier le profil du médecin</h4>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            @foreach($doctor as $doc)
                @if($res)
            <form method="post" action="{{ route('doctor.profile.update',["name"=>$doc->firstName,"email"=>$doc->email]) }}" enctype="multipart/form-data">
                @csrf
                @elseif($res == 0)
                    <form method="post" action="{{ route('doctor.profile.update',["name"=>$doc->name,"email"=>$doc->email]) }}" enctype="multipart/form-data">
                        @csrf

                    @endif
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Prenom <span class="text-danger">*</span></label>
                            @if($res)
                            <input class="form-control" value="{{$doc->firstName}}" type="text" name="fname">
                            @elseif($res == 0)
                                <input class="form-control" value="{{$doc->name}}" type="text" name="fname">
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nom</label>
                            @if($res)
                            <input class="form-control" type="text" value="{{ $doc->lastName }}" name="lname">
                            @elseif($res == 0)
                                <input class="form-control" type="text" name="lname">
                            @endif
                        </div>

                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            @if($res)
                                <input class="form-control" value="{{$doc->email}}" type="email" name="email">
                                @elseif($res ==0)
                            <input class="form-control" type="email" name="email">

                                @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Numero de telephone <span class="text-danger">*</span></label>

                            @if($res)
                            <input class="form-control" type="tel" value="{{ $doc->phoneNumber }}" name="tel">
                            @elseif($res == 0)
                                <input class="form-control" type="tel" name="tel">
                            @endif

                        </div>
                    </div>





                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date de naissance</label>
                            <div class="cal-icon">
                                @if($res)
                                <input type="text" name="bd" value="{{ $doc->birthdate }}" class="form-control datetimepicker">
                                    @elseif($res == 0)
                                    <input type="text" name="bd" class="form-control datetimepicker">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Specialite</label>
                            @if($res)

                                <input class="form-control" type="text" value="{{$doc->speciality}}" name="speciality">
                            @elseif($res == 0)

                                <input class="form-control" type="text" name="speciality">

                                @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Univeriste</label>
                            @if($res)
                            <input class="form-control" value="{{ $doc->university }}" type="text" name="university">
                            @elseif($res == 0)
                                <input class="form-control" type="text" name="university">
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Experiences</label>
                            @if($res)
                            <textarea class="form-control" type="text" name="experience">{{$doc->experience}}</textarea>
                                @elseif($res == 0)

                             <textarea class="form-control" type="text" name="experience"></textarea>

                            @endif
                        </div>
                    </div>


                    <div class="col-sm-6">



                        <div class="form-group gender-select">
                            @if($res)
                                @if($doc->gender == 'Male')
                            <label class="gen-label">Gender:</label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" value="Male" class="form-check-input" checked>Mâle
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" value="Female" class="form-check-input">Femelle
                                </label>
                            </div>

                                    @elseif($doc->gender == 'Female')
                                    <label class="gen-label">Gender:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" value="Male" class="form-check-input" >Mâle
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender" value="Female" class="form-check-input" checked>Femelle
                                        </label>
                                    </div>

                                    @endif
                                @elseif($res == 0)

                                <label class="gen-label">Gender:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" value="Male" class="form-check-input">Mâle
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" value="Female" class="form-check-input">Femelle
                                    </label>
                                </div>

                            @endif
                        </div>






                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    @if($res)
                                    <input type="text" name="address" value="{{ $doc->address }}" class="form-control ">
                                        @elseif($res == 0)
                                        <input type="text" name="address" class="form-control ">
                                        @endif
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    @if($res)
                                        <img alt="" src="{{ asset('storage/'.$doc->pictureUrl) }}">
                                        @elseif($res == 0)
                                        <img alt="" src="{{ asset('img/user.jpg') }} ">


                                    @endif
                                </div>
                                <div class="upload-input">
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Courte biographie</label>
                    @if($res)
                    <textarea class="form-control" rows="3" cols="30" name="about">{{$doc->about}}</textarea>
                        @elseif($res == 0)
                        <textarea class="form-control" rows="3" cols="30" name="about"></textarea>

                    @endif
                </div>

                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Créer un docteur</button>
                </div>

            </form>
                    @endforeach
        </div>
    </div>

@endsection
