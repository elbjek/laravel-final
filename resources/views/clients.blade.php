@extends('layouts.app')

@section('content')
    IM HERE HOE
    @foreach ($clients as $client)
        <div style="border:1px solid black;">
            <p>{{$client->first_name}}</p>
            <p>{{$client->last_name}}</p>
            {{--<p>{{$client->name}}</p>--}}
        </div>
    @endforeach
@endsection
