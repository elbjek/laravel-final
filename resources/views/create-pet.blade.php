@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('pets.store') }}">
        <div class="form-group">
            @csrf
            <label for="name">Pet Name:</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="text" class="form-control" name="weight"/>
        </div>
        <div class="form-group">
            <label for="quantity">Client</label>
            <select name="client_id" id="client_id">
                @foreach ($clients as $client)
                <option value="{{$client->id}}" > {{$client->first_name}}</option>
                    @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

@endsection
