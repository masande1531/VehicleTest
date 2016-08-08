@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        New Vehicle
    </div>
    
    <div class="panel-body">  
        @include('common.errors')
        
        <!-- Add Vehicle -->
        <a href="{{  url('vehicles') }}" class="btn btn-inverse">Back to all Vehicles</a>
        <form action="{{ url('vehicle') }}" method="POST" class="form-horizontal">
            @include('common.form')
            <!-- Add Vehicle Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Vehicle
                    </button>
                </div>
            </div>
        </form>
    </div>
    
</div>
@endsection

