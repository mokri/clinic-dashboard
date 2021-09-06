@extends('layouts.admin')

@section('content')

      <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Appointments</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ route('appointment.add') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable mb-0">
								<thead>
									<tr>

										<th>Nom du patient</th>
										<th>Date de naissance</th>
										<th>Date de rendez-vous</th>
										<th>Temps</th>

										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>

								@foreach($patientsAppointments as $pa)
									<tr>
										@if($pa->pictureUrl)
										<td class="table-active"><img width="28" height="28" src="{{ asset('storage/'.$pa->pictureUrl) }}" class="rounded-circle m-r-5" alt=""> {{ $pa->firstName.' '.$pa->lastName }}</td>
										@elseif(!$pa->pictureUrl)
											<td class="table-active"><img width="28" height="28" src="{{ asset('img/user.jpg') }}" class="rounded-circle m-r-5" alt=""> {{ $pa->firstName.' '.$pa->lastName }}</td>

										@endif
											<td class="table-warning">{{ $pa->birthdate }}</td>
										<td class="table-primary">{{ $pa->date }}</td>
										<td class="table-success">{{ $pa->time }}</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="{{route('appointment.delete',["id"=>$pa->appointmentID])}}" ><i class="fa fa-trash-o m-r-5"></i> Delete </a>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
                </div>  
@endsection
