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
                    <form action="{{ url('back-office/eligibilities/openForm') }}" method="post">
                        @csrf
                        <div class="form-group">
							<label>Income Type</label>
							<select class="form-control form-control-select2" name="incomeType" required>
                                    <option value="salaried">Salaried Employee</option>
                                    <option value="self">Self-Employeed</option>
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
