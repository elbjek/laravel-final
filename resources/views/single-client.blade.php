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
                            <p>Pet:{{$client->first_name}}</p>
                            <p>Owner:{{$client->last_name}}</p>
                            <p>{{$client->phone_number}}</p>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
