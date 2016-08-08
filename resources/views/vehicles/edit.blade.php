@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Edit Vehicle
    </div>
    <div class="panel-body">  
        @include('common.errors')
         <a href="{{  url('vehicles') }}" class="btn btn-inverse">Back to all Vehicles</a>
        <!-- Edit Vehicle -->
        <form action="{{ url('vehicle/'.$vehicle->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <h4 class="text-center">Owner Information</h4>
            <div class="form-group">
                <label for="first_name "class="col-sm-3 control-label">First Name </label>
                <div class="col-sm-6">
                   <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $vehicle->first_name }}">                         
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $vehicle->last_name }}">                          
                </div>
            </div>

            <div class="form-group">
                <label for="contact_number" class="col-sm-3 control-label">Contat Number</label>
                <div class="col-sm-6">
                    <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $vehicle->contact_number }}">                          
                </div>
            </div>

            <div class="form-group">
                <label for="email_address" class="col-sm-3 control-label">Email Address</label>
                <div class="col-sm-6">
                    <input type="text" type="email" name="email_address" id="email_address" class="form-control" value="{{ $vehicle->email }}">                          
                </div>
            </div>
            <hr/>
            <h4 class="text-center">Vehicle Information</h4>
            <div class="form-group">
                <label for="manufacturer" class="col-sm-3 control-label">Manufacturer</label>
                <div class="col-sm-6">
                    <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ $vehicle->manufacturer }}">                          
                </div>
            </div>

            <div class="form-group">
            <label for="type" class="col-sm-3 control-label">Type</label>
                <div class="col-sm-6">
                    <input type="text" name="type" id="type" class="form-control" value="{{ $vehicle->type }}">                          
                </div>
            </div>

            <div class="form-group">
                <label for="year" class="col-sm-3 control-label">Year</label>
                <div class="col-sm-6">
                    <input type="text" name="year" id="year" class="form-control" placeholder="{{ date('Y') }}" value="{{ date('Y', strtotime($vehicle->year))  }}">                          
                </div>
            </div>


            <div class="form-group">
                <label for="colour" class="col-sm-3 control-label">Color</label>
                <div class="col-sm-6">
                    <input type="text" name="colour" id="colour" class="form-control" value="{{ $vehicle->colour }}">                          
                </div>
            </div>

            <div class="form-group"> 
                <label for="mileage" class="col-sm-3 control-label">Mileage</label>
                <div class="col-sm-6">
                    <input type="mileage" name="mileage" id="mileage" class="form-control" value="{{ $vehicle->mileage }}" >                          
                </div>
            </div>

            <!-- Update Vehicle Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Update Vehicle
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

        
@endsection
