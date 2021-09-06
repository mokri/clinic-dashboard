@extends('layouts.admin')

@section('content')

            <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Ajouter un patient</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="{{ route('patients.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Prenom <span class="text-danger">*</span></label>
                                        <input class="form-control @error('fname') is-invalid @enderror" type="text" name="fname">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input class="form-control @error('lname') is-invalid @enderror" type="text" name="lname">
                                    </div>
                                </div>
                              
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Numero de la cart <span class="text-danger">*</span></label>
                                        <input class="form-control" type="tel" name="cardNumber">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email">
                                    </div>
                                </div>
                                
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Numero de telephone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="tel" name="tel">
                                    </div>
                                </div>
                                
                             
                                
                             
                              
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date de naissance</label>
                                        <div class="cal-icon">
                                            <input type="text" name="bd" class="form-control @error('bd') is-invalid @enderror datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                   
                                    <div class="form-group">
										<label class="gen-label">fonctionnalité</label>
										<select name="type"  class="select @error('type') is-invalid @enderror">
											<option>Etudiant</option>
											<option>professeur</option>
                                            <option>ATS</option>

                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
									</div>
                                    
                                    
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="Male" class="form-check-input @error('gender') is-invalid @enderror">Male
											</label>
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="Female" class="form-check-input">Female
											</label>
										</div>
									</div>
                                    
                              
                                    
                        
                                    
                                    
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" name="address" class="form-control ">
											</div>
										</div>
									
									
									</div>
								</div>
                              
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Avatar</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="{{ asset('img/user.jpg') }}">
											</div>
											<div class="upload-input">
												<input type="file" name="avatar" class="form-control" accept="image/*">
											</div>
										</div>
									</div>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Create Patient</button>
                            </div>
                        </form>
                    </div>
                </div>
     
@endsection
