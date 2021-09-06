@extends('layouts.admin')

@section('content')
<div class="row">

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-stethoscope"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $patientsNumber }}</h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$etdNumber}}</h3>
                                <span class="widget-title3">Etudiants <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-users" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $profNumber }}</h3>
                                <span class="widget-title4">Professeurs <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="dash-widget">
								<span class="dash-widget-bg1"><i class="fa fa-black-tie" aria-hidden="true"></i></span>
								<div class="dash-widget-info text-right">
									<h3>{{$atsNumber}}</h3>
									<span class="widget-title1"> ATS <i class="fa fa-check" aria-hidden="true"></i></span>
								</div>
							</div>
						</div>

                </div>
				
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">rendez-vous à venir</h4> <a href="{{ route('appointments') }}" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive" style="overflow-y: scroll!important; max-height: 320px">
									<table class="table mb-0">
										<thead class="d-none ">
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Timing</th>
												<th class="text-right">Status</th>
											</tr>
										</thead>
										<tbody>

                                        @foreach($appointments as $appointment)
											<tr>
												<td style="min-width: 200px;">
                                                    <img width="28" height="28" src="{{ asset('storage/'.$appointment->pictureUrl) }}" class="rounded-circle m-r-5" alt="">

													<h2><a href="">{{ $appointment->firstName.' '.$appointment->lastName }}<span>{{ $appointment->birthdate}}</span></a></h2>
												</td>



												<td>
													<h5 class="time-title p-0">Numero de telephone</h5>
													<p>{{ $appointment->phoneNumber}}</p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p>{{ $appointment->time }}</p>
												</td>
												<td class="text-right">
													<a href="{{ route('patient.show',["id" => $appointment->patientID]) }}" class="btn btn-outline-primary take-btn">Prendre</a>
												</td>
											</tr>
                                            @endforeach



										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
							<div class="card-header bg-white">
								<h4 class="card-title mb-0">Mes Patients (professeurs)</h4>
							</div>
                            <div class="card-body">
                                <ul class="contact-list">

                                    @foreach($patients_prof as $pp)
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="{{ route('patient.show',["id"=>$pp->id]) }}" title="John Doe">
                                                    @if($pp->pictureUrl)
                                                    <img src="{{ asset('storage/'.$pp->pictureUrl) }}" alt="" class="w-40 rounded-circle">
                                                    @elseif(!$pp->pictureUrl)
                                                        <img src="{{ asset('img/user.jpg') }}" alt="" class="w-40 rounded-circle">
                                                    @endif
                                                    <span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">{{ $pp->firstName.' '.$pp->lastName }}</span>
                                                <span class="contact-date">{{$pp->birthdate}}, Professeur</span>
                                            </div>
                                        </div>
                                    </li>

                                        @endforeach


                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="{{ route('patients')  }}" class="text-muted">Voir tous les patients</a>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Patients avec des maladie chronique </h4>
							</div>
							<div class="card-block">
								<div class="table-responsive"  style="overflow-y: scroll!important; max-height: 320px">
									<table class="table mb-0 new-patient-table" >
										<tbody>

										@foreach($patientsWithChronic as $pc)

											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="{{ asset('storage/'.$pc->pictureUrl) }}" alt="">
													<h2>{{ $pc->firstName.' '.$pc->lastName }}</h2>
												</td>
												<td>

                                                    <h5 class="time-title p-0"> Date de naissance </h5>
                                                    <p> {{ $pc->birthdate }}</p>

                                                </td>

                                             <td>
                                                 <h5 class="time-title p-0"> Numero de telephone </h5>
                                                 <p> {{ $pc->phoneNumber }}</p>
                                             </td>

												<td><button class="btn btn-primary btn-primary-four float-right">{{$pc->chronic}}</button></td>
                                                <td class="text-right">
                                                    <a href="{{ route('patient.show',["id" => $pc->patientID]) }}" class="btn btn-outline-primary take-btn">Prendre</a>
                                                </td>
											</tr>

                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				
				</div>
     
@endsection
