@extends('layouts.tankapp')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="card col-4">
            <div class="card-body">
                <img src="{{asset("storage/placeholder.png")}}" class="img-fluid rounded-top mb-3" alt="placeholder" />
                <h4 class="card-title">{{ $tank->name }} Details</h4>
                <p class="card-text">{{ $tank->description }}</p>
            </div>
        </div>
    </div>
@endsection
