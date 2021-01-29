@extends('layouts.back-office')

@section('breadcrum')
    Eligibility
@stop

@section('main-content')
<div class="content">
    <!-- Vertical form options -->
	<div class="row justify-content-center">
		<div class="col-md-8">
			<!-- Basic layout-->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Salaried Employee details</h5>
				</div>
				<div class="card-body">
                    <form action="{{ url('back-office/eligibilities/applicant') }}" method="post">
                        @csrf
                        <div class="form-group">
							<label>Loan For</label>
							<select class="form-control form-control-select" name="loanFor">
								<option value="Home Loan">Home Loan</option>
							</select>
                        </div>
                        <div class="form-group">
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

                        <div class="form-group">
							<label>Number Of Applicants</label>
							<select class="form-control form-control-select2" name="noOfApplicants" data-fouc>
								<option value="1">Single Applicant</option>
                                <option value="2">Two  Applicants</option>
                                <option value="3">Three Applicants</option>
							</select>
                        </div>

                        {{-- <div class="form-group">
                            <label>Date Of Birth</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar3"></i></span>
                                </span>
                                <input type="text" class="form-control" id="anytime-month-numeric" name="dob" placeholder="Select DOB">
                            </div>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label>Date Of Birth</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar3"></i></span>
                                </span>
                                <input type="text" class="form-control" id="anytime-month-numeric" name="dob" placeholder="Select DOB">
                            </div>
                        </div> --}}
						{{-- <div class="form-group">
							<label>Selece Bank</label>
							<select class="form-control form-control-select2" name="bank" data-fouc>
									<option value="SBI">State Bank Of India</option>
									<option value="ICICI">ICICI Bank</option>
									<option value="HDFC">HDFC Bank</option>
							</select>
                        </div> --}}
                        <div class="form-group">
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
						<div class="form-group">
							<label>Property Sellers</label>
							<select class="form-control form-control-select2" name="buyCompany" data-fouc>
                                <option value="">None</option>
								<option value="AL">Aparna Constructions</option>
                                <option value="AR">Prestige Constructions</option>

							</select>
                        </div>
                        <div class="form-group">
                            <label>CIBIL Score:</label>
                            <input type="text" class="form-control" name="cibilScore" placeholder="Enter CIBIL Score">
                        </div>
                        <div class="form-group">
                            <label>Birth Year:</label>
                            <input type="text" id="dob" class="form-control" name="dob" placeholder="Enter Year Of Birth">
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
@endsection
