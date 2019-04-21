@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @foreach ($appointments as $appointment)
                        <div style="border:1px solid black;">
                            <p>{{$appointment->title}}</p>
                            <p>{{$appointment->description}}</p>
                            <p>{{$appointment->name}}</p>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
