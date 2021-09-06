@extends('layouts.admin')

@section('content')

            <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Ajouter un docteur</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Prenom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="fname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input class="form-control" type="text" name="lname">
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
                                            <input type="text" name="bd" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                
                             <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialite</label>
                                        <input class="form-control" type="text" name="speciality">
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-6">
                            
                               
                                    
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" value="Male" class="form-check-input">Male
											</label>
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
												<input type="file" name="avatar" class="form-control">
											</div>
										</div>
									</div>
                                </div>
                            </div>
							<div class="form-group">
                                <label>Courte biographie</label>
                                <textarea class="form-control" rows="3" cols="30"></textarea>
                            </div>
                           
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Créer un docteur</button>
                            </div>
                        </form>
                    </div>
                </div>
     
@endsection
