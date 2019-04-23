@extends('layouts.app')

@section('content')

    {{--<sidenav-component></sidenav-component>--}}
    {{-- <create-appointment></create-appointment> --}}

    <form method="post" action="{{ route('appointments.store') }}">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" />
            </div>
            <div class="form-group">
                    <label for="pet_id">Pet</label>
                    <select name="pet_id" id="pet_id">
                        {{--<option value=""> Select one</option>--}}
                        @foreach ($pets as $key => $value)
                            <option value="{{$key}}" > {{$value}}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                    <label for="client_id">Client</label>
                    <select name="client_id" id="client_id">
                        {{--<option value=""> Select one</option>--}}
                        @foreach ($clients as $key => $value)
                            <option value="{{$key}}" > {{$value}}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                {{-- <label for="user_id">User Id</label> --}}
            <input type="hidden"  value="{{$user}}" class="form-control" name="user_id" />
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
@endsection
