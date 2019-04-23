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
                            <p>First name:{{$client->client_name}}</p>
                            <p>Last name:{{$client->client_lastname}}</p>
                            <p>Phone number:{{$client->phone_number}}</p>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
