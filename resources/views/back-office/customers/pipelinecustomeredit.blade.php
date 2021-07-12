@extends('layouts.back-office')

@section('parent_link')
    <a href="{{ url('back-office/customers/customers') }}" class="breadcrumb-item"> Pipeline Customers </a>
@endsection


@section('breadcrum')
    Edit customer ( {{ $customer->cust_name }} )
@endsection

@section('main-content')
<div class="container mt-5">
    <div class="card card-table table-responsive shadow-0">
     @if($appointments)
        <table class="table">
            <thead>
                <tr>
                   <th colspan="6"> <h1>Appointments</h1> </th>
                </tr>
                <tr>
                    <th>Customer name</th>
                    <th>Agent Name</th>
                    <th>Appointment Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $appointment)
                    <tr>
                        <td>
                        @if($appointment->applicant_type == 'secondary')
                              @php 
                                 
                                 $secondary = App\Model\SecondaryApplicant::where('customer_id','=',$appointment->customer_id)->first();

                              @endphp
                              {{ isset($secondary->name) ? $secondary->name : '' }}
                        @else
                              {{ $appointment->customer_name }}
                        @endif
                         </td>
                        <td>{{ $appointment->agent_name }}</td>
                        <td>{{ $appointment->appointment_name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->time_slot }}</td>
                        <td>
                        <button type="button" class="btn btn-primary edit-app-id" data-toggle="modal" id="{{ $appointment->id }}" data-target="#appointmentModal">
                           Edit Appointment
                        </button>
                        <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-primary w-100">Re-Appointment</a> -->
                    </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6"> No Record Found</td>
                </tr>

                @endforelse

            </tbody>
        </table>
        @endif
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">
                    Edit customer ( {{ $customer->cust_name }} )
                </h2>
                <div class="card-body">
                    <form action="{{ route('back-office.customers.updatepipelinecustomer', $customer->id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_name">Customer Name <span class="mandatory">*</span></label>
                                <input type="text" class="form-control @error('cust_name') is-invalid @enderror" id="cust_name" name="cust_name" required value="{{ $customer->cust_name }}">
                                @error('cust_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_phone">Phone Number <span class="mandatory">*</span></label>
                                <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" maxlength="10" id="cust_phone" name="cust_phone" required value="{{ $customer->cust_phone }}">
                                @error('cust_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="cust_email">E-Mail <span class="mandatory">*</span></label>
                                <input type="tel" class="form-control @error('cust_email') is-invalid @enderror" id="cust_email" name="cust_email" required value="{{ $customer->cust_email }}">
                                @error('cust_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_email">Builder Name <span class="mandatory">*</span></label>
                                <select class="form-control" name="builder_name" id="builder_name" required>
                                        <option value="">Select Builder</option>
                                        @foreach($builders as $builder)
                                            <option @if( $customer->builder_name == $builder->id) selected @endif  value="{{ $builder->id }}"> {{ $builder->builder_name}}</option>
                                        @endforeach
                                    </select>
                                <!-- <input type="text" class="form-control @error('builder_name') is-invalid @enderror" id="builder_name" name="builder_name" required value="{{  $customer->builder_name }}"> -->
                                @error('builder_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                           
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="cust_email">Project Name <span class="mandatory">*</span></label>
                                <select class="form-control" name="project_name" id="project_name" required>
                                <option value="">Select Project</option>
                                @if($projects)
                                    @foreach($projects as $project)
                                       <option @if( $customer->project_name == $project->id) selected @endif value="{{ $project->id }} "> {{ $project->project_name }} </option>
                                    @endforeach
                                @endif
                                </select>
                                <!-- <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required value="{{ $customer->project_name }}"> -->
                                @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for="cust_email">Buying Flat / Door no <span class="mandatory">*</span></label>
                                <input type="text" class="form-control @error('buying_door_no') is-invalid @enderror" id="buying_door_no" name="buying_door_no" required value="{{ $customer->buying_door_no }}">
                                @error('buying_door_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="property_cost">Total Cost(Property Cost) <span class="mandatory">*</span></label>
                                <input type="text" class="form-control"  name="property_cost" id="property_cost" required 
                                value="{{ old('property_cost') ?? $customer->property_cost }} "
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="property_cost_txt" id="property_cost_txt"> </label>
                                @error('property_cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bank_id">Bank <span class="mandatory">*</span></label>
                                <select name="bank_id" id="bank_id" class="form-control" required>
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        @if( $customer->bank_id  == $bank->id )
                                            <option value="{{ $bank->id }}" selected> {{ $bank->bank_name }} </option>
                                        @else
                                            <option value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                             <div class="form-group col-md-6">
                              
                                    <label for="branch_name">Branch <span class="mandatory">*</span></label>
                                    <select name="branch_name" id="branch_name" class="form-control" required>
                                        <option value="">Select Branch</option>
                                        @foreach ($branches as $branch)
                                           <option @if($customer->bank_branch == $branch->id) selected @endif value="{{ $branch->id }}"> {{ $branch->branch_name }} </option>
                                        @endforeach
                                    </select>
                                </div>   
                            <div class="form-group col-md-6">
                                <label for="mmr_payable">MMR Payable</label>
                                <input type="text" class="form-control" id="mmr_payable" name="mmr_payable" 
                                 value="{{ old('mmr_payable') ?? $customer->mmr_payable }}"
                                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="mmr_payable_txt" id="mmr_payable_txt"> </label>
                                @error('mmr_payable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_pincode">MMR Paid</label>
                                <input type="text" class="form-control" id="mmr_paid" name="mmr_paid" 
                                 value="{{ old('mmr_paid') ?? $customer->mmr_paid }}"
                                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="mmr_paid_txt" id="mmr_paid_txt"> </label>
                                @error('mmr_paid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                            <div class="form-group col-md-6">
                                <label for="occupation_id">Customer Occupation <span class="mandatory">*</span></label>
                                <select name="occupation_id" id="occupation_id" class="form-control" required>
                                    <option value="">Select Occupation</option>
                                    @foreach ($occupations as $occupation)
                                        @if( $customer->occupation_id  == $occupation->id )
                                            <option value="{{ $occupation->id }}" selected> {{ $occupation->occupation_name }} </option>
                                        @else
                                            <option value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="applied_loan_amount">Loan Amount Required <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="applied_loan_amount" name="applied_loan_amount" required 
                                value="{{ old('applied_loan_amount') ?? $customer->applied_loan_amount }}"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                <label for="applied_loan_amount_txt" id="applied_loan_amount_txt"> </label>
                                @error('mmr_paid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                        <div class="form-group col-md-6">
                            <label for="cust_address">Customer Address</label>
                            <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="cust_address" required cols="30" rows="3">{{ old('cust_address') ?? $customer->cust_address }}</textarea>
                            @error('cust_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cust_city">City <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="cust_city" name="cust_city" required value="{{ old('cust_city') ?? $customer->cust_city }}">
                                @error('cust_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_pincode">Pincode <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="cust_pincode" name="cust_pincode" maxlength="6" required value="{{ old('cust_pincode') ?? $customer->cust_pincode }}">
                                @error('cust_pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-row">
                            <div class="form-group col">
                                <h1>* List of documents</h1>
                                <?php
                                    if(isset($customer->docs_ids)){
                                        $presentdocs = explode(",",$customer->docs_ids);
                                    }else{
                                        $presentdocs = array();
                                    }
                                ?>
                                <ul>
                                    @foreach ($documents as $doc)
                                        @if (in_array($doc->id, $presentdocs))
                                            <li><del>{{ $doc->type_of_doc }} -> {{ $doc->doc_name }}</del></li>
                                        @else
                                            <li>{{ $doc->type_of_doc }} -> {{ $doc->doc_name }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" {{ $customer->interested == true ? 'checked' : '' }} type="checkbox" id="interested" name="interested" value="{{ old('interested') ?? 1 }}">
                                    <label class="form-check-label" for="interested">
                                        Assign New Appointment for collecting pending docs
                                    </label>
                                </div>
                                @error('cust_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="appointment-section">
                            <h4>Schedule an appointment</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<p>Date Of Appointment</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="appointment_date" id="datepicker" >
									</div>
								</div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_time">Time</label>
                                    <select name="appointment_time" id="appointment_time" class="form-control">
                                        <option value="">Select Time</option>
                                        @foreach ($timeslots as $time)
                                            <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                        @endforeach
                                    </select>
                                    @error('appointment_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div  class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type_of_appointment">Appointment Type</label>
                                    <select name="type_of_appointment" id="type_of_appointment" class="form-control">
                                        <option value="2">Pending Doc collection for Backoffice</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="appointment_agent">Agent Name</label>
                                    <select name="appointment_agent" id="appointment_agent" class="form-control">
                                       <option value=""> Select Agent</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                  <label  class="btn btn-primary add_first_appointment" id="{{$customer->id}}" >Add Appointment</label>
                                </div>

                            </div>
                        </div>
                        @if(!$second_applicants->isEmpty())
                        <hr>
                        <h2>Secondary Applicant</h2>
                            @foreach($second_applicants as $key => $second_applicant)
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cust_name">Customer Name</label>
                                    <input type="text" class="form-control @error('cust_name') is-invalid @enderror" id="name" name="secondary_name[]" required value="{{ $second_applicant->name }}">
                                    @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cust_phone">Phone Number</label>
                                    <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="cust_phone" name="secondary_phone[]" required value="{{ $second_applicant->phone }}">
                                    @error('cust_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="secondary_occupation_id">Customer Occupation</label>
                                    <select name="secondary_occupation_id[]" id="occupation_id" class="form-control" required>
                                        <option value="">Select Occupation</option>
                                        @foreach ($occupations as $occupation)
                                            @if( $second_applicant->occupation_id  == $occupation->id )
                                                <option value="{{ $occupation->id }}" selected> {{ $occupation->occupation_name }} </option>
                                            @else
                                                <option value="{{ $occupation->id }}"> {{ $occupation->occupation_name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cust_phone">Email</label>
                                    <input type="tel" class="form-control @error('cust_phone') is-invalid @enderror" id="cust_phone" name="secondary_email[]" required value="{{ $second_applicant->email }}">
                                    @error('cust_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cust_address">Customer Address</label>
                                    <textarea class="form-control" id="cust_address" placeholder="1234 Main St" name="secondary_cust_address[]    " required cols="30" rows="5" autocomplete="no-fill">{{ old('cust_address') ?? $second_applicant->address }}</textarea>
                                    @error('cust_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="cust_city">City</label>
                                                <input type="text" class="form-control" id="cust_city" name="secondary_city[]" required value="{{ old('cust_city') ?? $second_applicant->city }}" autocomplete="no-fill">
                                                @error('cust_city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="form-row py-3">
                                        <div class="form-group col-md-12">
                                            <label for="cust_pincode">Pincode</label>
                                            <input type="text" class="form-control" id="cust_pincode" name="secondary_pincode[]" required value="{{ old('cust_pincode') ?? $second_applicant->zipcode }}" autocomplete="no-fill">
                                            @error('cust_pincode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="form-group col">
                                        <h1>* List of documents</h1>
                                        <?php
                                            if(isset($second_applicant->docs_ids)){
                                                $presentdocs = explode(",",$second_applicant->docs_ids);
                                            }else{
                                                $presentdocs = array();
                                            }
                                            
                                            $secondary_documents = App\Model\RequiredDoc::where('occupation_id', '=', $second_applicant->occupation_id)->get();
                                        ?>
                                        <ul>
                                            @foreach ($secondary_documents as $doc)
                                                @if (in_array($doc->id, $presentdocs))
                                                    <li><del>{{ $doc->type_of_doc }} -> {{ $doc->doc_name }}</del></li>
                                                @else
                                                    <li>{{ $doc->type_of_doc }} -> {{ $doc->doc_name }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <div class="form-check">
                                        <input class="form-check-input appointment-input" {{ $customer->interested == true ? 'checked' : '' }} type="checkbox" data-id="{{$key}}" id="interested" name="interested" value="{{ old('interested') ?? 1 }}">
                                        <label class="form-check-label " for="interested">
                                            Assign New Appointment for collecting pending docs
                                        </label>
                                    </div>
                                    @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="appointment-section-{{$key}}" class="appointment-section">
                                <h4>Schedule an appointment</h4>
                                <div class="form-row">  
                                    <div class="form-group col-md-6">
                                        <p>Date Of Appointment</p>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                            </span>
                                            <input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="secondary_appointment_date" id="datepicker-{{$second_applicant->id}}" >
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="appointment_time">Time</label>
                                        <select name="secondary_appointment_time" id="appointment_time-{{$second_applicant->id}}" data-id="{{$second_applicant->id}}" class="form-control appointment-time">
                                            <option value="">Select Time</option>
                                            @foreach ($timeslots as $time)
                                                <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                            @endforeach
                                        </select>
                                        @error('appointment_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div  class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="type_of_appointment">Appointment Type</label>
                                        <select name="secondary_type_of_appointment" id="type_of_appointment-{{$second_applicant->id}}" class="form-control">
                                            <option value="2">Pending Doc collection for Backoffice</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="appointment_agent">Agent Name</label>
                                        <select name="secondary_appointment_agent" id="appointment_agent-{{$second_applicant->id}}" class="form-control">
                                           <option value=""> Select Agent</option>
                                        </select>
                                    </div>
                           
                                </div>
                                <div class="form-row">
                                 <input type="hidden" id="edit-id" value="{{$customer->id}}" />
                                  <label  class="btn btn-primary add_appointment" id="{{$second_applicant->id}}" >Add Appointment</label>
                                </div>
                            </div>
                            @endforeach

                        @endif

                        <hr>
                        <h3>If documents collection completed, then click on Sent to login process.</h3>
                        <div class="form-row">
                            <div class="form-group col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sentToLoin" name="sentToLoin" value="{{ old('sentToLoin') ?? 1 }}">
                                    <label class="form-check-label" for="sentToLoin">
                                        Sent to loginProcess
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="sent_to_login">
                            <h4>Schedule an appointment To Drop the Application to bank</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
									<p>Date Of Appointment</p>
									<div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar5"></i></span>
										</span>
										<input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="sent_to_bank_date" id="sent_to_bank_date" >
									</div>
								</div>
                                <div class="form-group col-md-6">
                                    <label for="sent_to_bank_time">Time</label>
                                    <select name="sent_to_bank_time" id="sent_to_bank_time" class="form-control">
                                        <option value="">Select Time</option>
                                        @foreach ($timeslots as $time)
                                            <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div  class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bank_appointment">Appointment Type</label>
                                    <select name="bank_appointment" id="bank_appointment" class="form-control">
                                        <option value="3">Bank visit to drop Application</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bank_appointment_agent">Agent Name</label>
                                    <select name="bank_appointment_agent" id="bank_appointment_agent" class="form-control">
                                      <option value=""> Select Agent</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
   
    </div>
</div>
<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="appointmentModalLabel">Change Appointment Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div class="form-group col-md-6">
                            <p>Date Of Appointment </p>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                </span>
                                <input type="text" class="form-control pickadate-limits" placeholder="Select Date" name="appointment_date" id="datepicker_popup" >
                            </div>
                </div>
                <div class="form-group col-md-6">
                                    <label for="type_of_appointment">Appointment Type</label>
                                    <select name="type_of_appointment" id="type_of_appointment" class="form-control">
                                        <option value="">Select Appointment Type</option>
                                        @foreach ($typeofappointments as $type)
                                            <option value="{{ $type->id }}"> {{ $type->appointment_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
               
                <div class="form-group col-md-6">
                            <label for="appointment_time">Time</label>
                            <select name="appointment_time" id="appointment_time_edit" class="form-control">
                                <option value="">Select Time</option>
                                @foreach ($timeslots as $time)
                                    <option value="{{ $time->id }}"> {{ $time->time_slot }} </option>
                                @endforeach
                            </select>
                            @error('appointment_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                </div>
                <div class="form-group col-md-6">
                            <p>Select Agent</p>
                            <div class="input-group">
                                    <select name="bank_appointment_agent" id="appointment_agent_edit" class="form-control">
                                       <option>Select Agent</option>
                                    </select>
                            </div>
                </div>
          
      </div>
      <div class="success-msg"></div>
        <div class="error-msg"></div>
      <div class="modal-footer">
       
        <input type="hidden" name="appointment_id" id="appointment_id" />
        <button type="button" class="btn btn-primary" id="change-appointment">Change Appointment</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>

</div>


@endsection

@section('custom-script')


<script>
    $("#interested").click(function(){
        if ($('#interested').is(":checked")) {
            $("#sentToLoin").attr('disabled', true);
        } else {
            $("#sentToLoin").attr('disabled', false);
            $("#appointment-section").hide();
        }
    });
    $("#sentToLoin").click(function(){
        if ($('#sentToLoin').is(":checked")) {
            $("#interested").attr('disabled', true);
        } else {
            $("#interested").attr('disabled', false);
            $("#appointment-section").hide();
        }
    });



    $(document).ready(function(){
        $("#two-applicant-same-add").click(function(){
            if ($(this).is(":checked")) {
               /// var cust_addres = $("#cust_address").val();
                $("#two_cust_address").val($("#cust_address").val());
                $("#two-appointment-section").hide();
            }else{
                $("#two_cust_address").val('');
                $("#two-appointment-section").show();
            }

        });

        $("#three-applicant-same-add").click(function(){
            if ($(this).is(":checked")) {
               /// var cust_addres = $("#cust_address").val();
                $("#three_cust_address").val($("#cust_address").val());
                $("#three-appointment-section").hide();
            }else{
                $("#three_cust_address").val('');
                $("#three-appointment-section").show();
            }

        });
        if ($('#interested').is(":checked")) {
            $("#appointment-section").show();
        } else {
            $("#appointment-section").hide();
        }
        $("#interested").click(function () {
            if ($(this).is(":checked")) {
                $("#appointment-section").show();
            } else {
                $("#appointment-section").hide();
            }
        });

        if ($('#sentToLoin').is(":checked")) {
            $("#sent_to_login").show();
        } else {
            $("#sent_to_login").hide();
        }
        $("#sentToLoin").click(function () {
            if ($(this).is(":checked")) {
                $("#sent_to_login").show();
            } else {
                $("#sent_to_login").hide();
            }
        });

        $(".appointment-input").click(function () {
            var id = $(this).attr('data-id');
            if ($(this).is(":checked")) {
                
                $("#appointment-section-"+id).show();
            } else {
                $("#appointment-section-"+id).hide();
            }
        });
        // $("#datepicker").datepicker();
    });

    $(".edit-app-id").click(function(){
          $("#appointment_id").val($(this).attr('id'));
    });

    $(".add_first_appointment").click(function(){
            var id = $(this).attr('id');
            var date = $("#datepicker").val();
            var appointment_time = $("#appointment_time").val();
            var appointment_type = $("#type_of_appointment").val();
            var agent_id = $("#appointment_agent").val();
           
            //alert(date);
            $.ajax({
                url : "<?php echo url('/back-office/add-first-agent-appointment'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: appointment_time, agent_id:agent_id,  customer_id:id,  appointment_type:appointment_type}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(resp) {
                    if(resp.status == 1){
                        location.reload();
                    }
                }
            })
    });

    $(".add_appointment").click(function(){
            var id = $(this).attr('id');
            var date = $("#datepicker-"+id).val();
            var appointment_time = $("#appointment_time-"+id).val();
            var appointment_type = $("#type_of_appointment-"+id).val();
            var agent_id = $("#appointment_agent-"+id).val();
            var customer_id = $("#edit-id").val();
            //alert(date);
            $.ajax({
                url : "<?php echo url('/back-office/add-secondary-agent-appointment'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: appointment_time, agent_id:agent_id,  customer_id:customer_id, second_customer_id:id, appointment_type:appointment_type}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(resp) {
                    if(resp.status == 1){
                        location.reload();
                    }
                }
            })
    })

    $("#change-appointment").click(function(){
        var date = $("#datepicker_popup").val();
        var time = $("#appointment_time_edit").val();
        var agent = $("#appointment_agent_edit").val();
        var appointmentId = $("#appointment_id").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/change-agent-appointment'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time, agentid:agent, appointmentId:appointmentId}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    if(data.status == 1){
                        $(".success-msg").text(data.message);
                    }else{
                        $(".error-msg").text(data.message);
                    }
                    setTimeout(() => {
                        $(".close").click();
                        location.reload(true);
                    }, 1500);
                  
                    
                }
            })
        }

      
    });

    $("#appointment_time").change(function(){
        var date = $("#datepicker").val();
        var time = $("#appointment_time").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/fetchAgents'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '<option value=""> Select Agent</option>';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#appointment_agent").html(selectOptions);
                    }
                }
            });
        }
    });


    $(".appointment-time").change(function(){
        var id = $(this).attr('data-id');
        var date = $("#datepicker-"+id).val();
        var time = $("#appointment_time-"+id).val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/fetchAgents'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#appointment_agent-"+id).html(selectOptions);
                    } else {
                        var selectOptions = '';
                        selectOptions += '<option value="">Select Agent</option>';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#appointment_agent-"+id).html(selectOptions);
                    }
                }
            });
        }
    });
   


    $("#appointment_time_edit").change(function(){
        var date = $("#datepicker_popup").val();
        var time = $("#appointment_time_edit").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/fetchAgents'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#appointment_agent_edit").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        selectOptions += '<option value="">Select Agent</option>';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#appointment_agent_edit").html(selectOptions);
                    }
                }
            });
        }
    });

    $("#sent_to_bank_time").change(function(){
        var date = $("#sent_to_bank_date").val();
        var time = $("#sent_to_bank_time").val();
        if(date == ""){
            alert("please select date");
        }else{
            $.ajax({
                url : "<?php echo url('/back-office/fetchAgents'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({apdate:date, aptime: time}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if(data.length == 0){
                        selectOptions += '<option value="">No Agent Available in This Time Slot</option>';
                        $("#bank_appointment_agent").html(selectOptions);
                    } else {
                        var selectOptions = '';
                        selectOptions += '<option value="">Select Agent</option>';
                        $.each(data, function( key, value ) {
                            selectOptions += '<option value="'+value.agent_id+'">'+ value.agent_name +'</option>';
                        });
                        $("#bank_appointment_agent").html(selectOptions);
                    }
                }
            });
        }
    });

    $("#builder_name").change(function(){
        var id = $(this).val();
        $.ajax({
                url : "<?php echo url('/back-office/fetchProjects'); ?>",
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
                },
                data : JSON.stringify({builder_id:id}),
                type : 'POST',
                contentType: "application/json",
                dataType: 'json',
                success: function(response) {
                    $("#project_name").html(response.data);
                }
            });
      
    });  

    $("#bank_id").change(function(){
      
      var bank_id = $(this).val();
      $.ajax({
          url : "<?php echo url('/back-office/bank/get-branches'); ?>",
          headers: {
              'X-CSRF-TOKEN': '<?php echo csrf_token();  ?>'
          },
          data : JSON.stringify({bank_id:bank_id}),
          type : 'POST',
          contentType: "application/json",
          dataType: 'json',
          success: function(response) {
              if(response.status==1){
                  $("#branch_name").html(response.data);
              }

          } 
          });
 });
  

    $("#property_cost").on('keyup',function(){
         var textVal = convertNumberToWords($(this).val());
         $("#property_cost_txt").text(textVal);
        
     })
     $("#mmr_paid").on('keyup',function(){
       
         var textVal = convertNumberToWords($(this).val());
         $("#mmr_paid_txt").text(textVal);
        
     })
     $("#mmr_payable").on('keyup',function(){
       
       var textVal = convertNumberToWords($(this).val());
       $("#mmr_payable_txt").text(textVal);
      
   })

   $("#applied_loan_amount").on('keyup',function(){
         var textVal = convertNumberToWords($(this).val());
         $("#applied_loan_amount_txt").text(textVal);
        
     })
     
    // $("#two-datepicker").datepicker("setDate",new Date(2021,02,12) );
</script>
<style>
.mandatory{
    color:red;
}
.success-msg {
    padding: 0 30px;
    color: green;
    font-size: 16px;
}
.error-msg {
    padding: 0 30px;
    color: red;
    font-size: 16px;
}
span.same-address {
    margin-left: 10%;
}
label#lbl-cust-address {
    width: 100%;
}
#two-appointment-section div#two-datepicker_root {
    margin-top: -410px;
}
div#two-appointment-section {
    padding: 23px;
}
#three-appointment-section div#three-datepicker_root {
    margin-top: -410px;
}
div#three-appointment-section {
    padding: 23px;
}
.appointment-section{
    display:none;
}
</style>

@endsection
