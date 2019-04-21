@extends('layouts.app')

@section('content')
 IM HERE HOE
 <form method="post" action="{{ route('appointments.store') }}">
     <div class="form-group">
         @csrf
         <label for="name">Title:</label>
         <input type="text" class="form-control" name="title"/>
     </div>
     <div class="form-group">
         <label for="price">Description</label>
         <input type="text" class="form-control" name="description"/>
     </div>
     <div class="form-group">
         <label for="quantity">Pet id</label>
         <input type="number" class="form-control" name="pet_id"/>
     </div>
     <button type="submit" class="btn btn-primary">Add</button>
 </form>

@endsection
