@extends('layouts.app')

@section('content')


    <form action="{{ route('appointments.update',$appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="title" value="{{ $appointment->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $appointment->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="quantity">Pet</label>
                    <select name="pet_id" id="pet_id">
                        {{--<option value=""> Select one</option>--}}
                        @foreach ($pets as $key => $value)
                            <option value="{{$key}}" > {{$value}}</option>
                        @endforeach
                    </select>
                </div>

            <div class="form-group">
                <label for="quantity">Client</label>
                <select name="client_id" id="client_id">
                    {{--<option value=""> Select one</option>--}}
                    @foreach ($clients as $id => $value)
                        <option value="{{$id}}" > {{$value}}</option>
                    @endforeach
                </select>
            </div>
            </div>





            <input class="form-control" type="hidden" name="user_id" value="{{$user}}" placeholder="user id">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


    </form>
@endsection

