@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                {{--@foreach ($appointments as $appointment)--}}
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>Appointment Title: {{$appointment->title}}</p>
                        <p>Pet: {{$appointment->name}}</p>
                        <p>Owner: {{$appointment->client_name}}</p>
                        <p>Description: {{$appointment->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
