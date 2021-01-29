@extends('layouts.back-office')

@section('breadcrum')
    Select Self Employement Type
@stop

@section('main-content')
<div class="content">
    <!-- Vertical form options -->
	<div class="row justify-content-center">
		<div class="col-md-8">
			<!-- Basic layout-->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Self Employement</h5>
				</div>
				<div class="card-body">
                    <form action="{{ url('back-office/eligibilities/SelfEmployeeType') }}" method="post">
                        @csrf
                        <div class="form-group">
							<label>Type Of Loan</label>
							<select class="form-control form-control-select2" name="employmentType" required>
                                    <option value="general">General Self Employeed</option>
                                    <option value="professional">Professional Self Employeed</option>
							</select>
                        </div>
                        <div class="form-group">
							<label>Number Of Applicants</label>
							<select class="form-control form-control-select2" name="noOfApplicants" required>
								<option value="1">Single Applicant</option>
                                <option value="2">Two  Applicants</option>
                                <option value="3">Three Applicants</option>
							</select>
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
