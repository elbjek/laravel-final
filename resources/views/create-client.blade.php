@extends('layouts.app')

@section('content')
    IM HERE HOE
    <form method="post" action="{{ route('clients.store') }}">
        <div class="form-group">
            @csrf
            <label for="name">First Name:</label>
            <input type="text" class="form-control" name="first_name"/>
        </div>
        <div class="form-group">
            <label for="price">Last name:</label>
            <input type="text" class="form-control" name="last_name"/>
        </div>
        <div class="form-group">
            <label for="quantity">E-mail</label>
            <input type="email" class="form-control" name="email"/>
        </div>
        <div class="form-group">
            <label for="quantity">Phone number</label>
            <input type="text" class="form-control" name="phone_number"/>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

@endsection
