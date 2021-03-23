@extends('layouts.back-office')

@section('breadcrum')
    Select Income Type
@stop

@section('main-content')
<div class="content">
    <!-- Vertical form options -->
	<div class="row justify-content-center">
		<div class="col-md-8">
			<!-- Basic layout-->
			<div class="card">
				<div class="card-body">
                    <form action="{{ url('back-office/eligibilities/applicant') }}" method="post">
                        @csrf

						<div class="form-group">
						   <div class="row">
						     <div class="col-md-6">
							<label>Bank</label>
								<select class="form-control form-control-select2 " id="bank" name="bank" required>
										<option value="salaried">Select Bank</option>
										@foreach($banks as $bank)
										  <option value="{{ $bank->id }}"> {{ $bank->bank_name }}</option>
										@endforeach
								</select>
							</div>
							<div class="col-md-6">
								<label>Builder</label>
								<select class="form-control form-control-select2" name="builder" required>
										<option value="salaried">Select Builder</option>
										@foreach($builders as $builder)
										<option value="{{ $builder->id }}"> {{ $builder->builder_name }}</option>
										@endforeach
								</select>
						   </div>
						   </div>
                        </div>

                        <div class="form-group">
						     <div class="row">
						     <div class="col-md-12 occupationType">
								<label>Income Type</label>
								<select class="form-control form-control-select2" name="occupation" required>
										<option> Select Income Type</option>
										@foreach($occupations as $occupation)
										    <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
										@endforeach
									
								</select>
                             </div>
                             </div>
                        </div>

						<div class="salaried-employee-section">
								<div class="row">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Salaried Employee details</h5>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>Loan For</label>
											<select class="form-control form-control-select" name="loanFor">
												<option value="Home Loan">Home Loan</option>
											</select>
										</div>
										<div class="col-md-6">
												<label>Type Of Loan</label>
												<select class="form-control form-control-select2" name="loanType">
													<option value="">None</option>

													<optgroup label="Approved project">
														<option value="AN">New house/flat</option>
														<option value="AR">Resale house/flat</option>
														<option value="AM">Mortgage house/flat</option>
														<option value="ALP">Land Purchase</option>
														<option value="ALM">Land Mortgage</option>
													</optgroup>
													<optgroup label="Non-approved project">
														<option value="AN">New house/flat</option>
														<option value="AR">Resale house/flat</option>
														<option value="AM">Mortgage house/flat</option>
														<option value="ALP">Land Purchase</option>
														<option value="ALM">Land Mortgage</option>
													</optgroup>
												</select>
										</div>
									</div>
									
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>Number Of Applicants</label>
											<select class="form-control form-control-select2" name="noOfApplicants" data-fouc>
												<option value="1">Single Applicant</option>
												<option value="2">Two  Applicants</option>
												<option value="3">Three Applicants</option>
											</select>
										</div>
										<div class="col-md-6">
										<label>Working In</label>
											<select class="form-control form-control-select2" name="company" id="company" data-fouc>
													<option value="">None</option>
													<option value="E">Elite</option>
													<option value="SP">Super Prime</option>
													<option value="P">Prime</option>
													<option value="G">GOVT</option>
													<option value="SG">Semi GOVT</option>

											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-12">
											<label>Property Sellers</label>
											<select class="form-control form-control-select2" name="buyCompany" data-fouc>
												<option value="">None</option>
												<option value="AL">Aparna Constructions</option>
												<option value="AR">Prestige Constructions</option>

											</select>
										</div>
										
									</div>
								</div>
								
						</div>
						<div class="self-employee-section">
								<div class="row">
									<div class="card-header header-elements-inline">
										<h5 class="card-title">Self Employee details</h5>
									</div>
								</div>
								<div class="form-group">
								    <div class="row">
										<div class="col-md-6">
											<label>Type Of Loan</label>
											<select class="form-control form-control-select2" name="employmentType" required>
													<option value="general">General Self Employeed</option>
													<option value="professional">Professional Self Employeed</option>
											</select>
										</div>
										<div class="col-md-6">
											<label>Number Of Applicants</label>
											<select class="form-control form-control-select2" name="noOfApplicants" required>
												<option value="1">Single Applicant</option>
												
												<option value="2">Two  Applicants</option>
												<option value="3">Three Applicants</option>
											</select>
										</div>
									</div>
								</div>
								

						</div>
						<div class="common-section">
						        <div class="form-group">
								    <div class="row">
									     <div class="col-md-6">
												<label>CIBIL Score:</label>
												<input type="text" class="form-control" name="cibilScore" placeholder="Enter CIBIL Score">
										 </div>
										 <div class="col-md-6">
										
                                                    <label>Date of Birth</label>
                                                    <input class="form-control" type="date" id="dob" name="dob" 
                                                        value="{{ date('2000-m-d') }}"
                                                        min="{{ date('70-m-d') }}" max="{{ date('Y-12-31') }}" />
                                           
										 </div>
									
									</div>
								</div>
						</div>

						<div class="text-right">
						    
							<button type="submit" class="btn btn-primary">Proceed <i class="icon-paperplane ml-2"></i></button>
						</div>
					</form>
				</div>
			</div>
			<!-- /basic layout -->
		</div>
	</div>
	<!-- /vertical form options -->
</div>
@endsection

@section('custom-script')
    <script src="{{ asset('admin/global_assets/js/demo_pages/form_layouts.js') }}"></script>
	<script>
		$(document).ready(function(){

			$(".form-control-select2").select2({
				placeholder: "Select a state",
				allowClear: true
			});
			 
			$(".occupationType").on("select2:select", function (e) {
				  var empType =  e.params.data.id;
				  formChange(empType);
		    })
			
			setTimeout(function(){
				// $(".justify-content-center select2").select();
				// alert($("#empTypeId").val());
				// formChange();
			},1000);
				
			
			
          
		});
		function formChange(empType){
			
		     	
			     if(empType == 2){
                      $('.self-employee-section').show();
                      $('.salaried-employee-section').hide();
					  $('.common-section').show();
					 
				  }
				  if(empType == 1){
					  $('.self-employee-section').hide();
                      $('.salaried-employee-section').show();
					  $('.common-section').show();
				  }
				  if(empType == 'Select Income Type'){
					  $('.self-employee-section').hide();
                      $('.salaried-employee-section').hide();
                      $('.common-section').hide();
					 
				  }
		}
	</script>
	<style>
	 .salaried-employee-section, .self-employee-section, .common-section{
		 display:none;
	 }
	</style>
@endsection