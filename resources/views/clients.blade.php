@extends('layouts.app')

@section('content')
    @foreach ($clients as $client)
        <div style="border:1px solid black;">
            <p>{{$client->client_name}} {{$client->client_lastname}}</p>
            {{--<p>{{$client->name}}</p>--}}
        </div>
    @endforeach
@endsection
