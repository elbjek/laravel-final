@extends('layouts.app')

@section('content')
<?php // dd($clients);?>
    <form action="{{ route('pets.update',$pet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pet name:</strong>
                    <input type="text" name="name" value="{{ $pet->name }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Weight:</strong>
                    <input type="text" name="weight" value="{{ $pet->weight }}" class="form-control" placeholder="Weight">
                </div>
            </div>

            <div class="form-group">
                <label for="quantity">Client</label>
                <select name="client_id" id="client_id">
                    {{--<option value=""> Select one</option>--}}
                    @foreach ($clients as $key => $value)
                        <option value="{{$key}}" > {{$value}}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
