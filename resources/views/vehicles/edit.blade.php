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
             @include('common.form')

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
