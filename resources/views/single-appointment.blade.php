@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @foreach ($appointments as $appointment)
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>Pet:{{$appointment->name}}</p>
                        <p>Owner:{{$appointment->first_name}}</p>
                        <p>{{$appointment->description}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
