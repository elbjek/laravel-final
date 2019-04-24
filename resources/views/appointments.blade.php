@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm col-lg-3 clear" >
            <sidebar-component></sidebar-component>
        </div>
        <div class=" col-sm-12 col-lg-9 clear">
            <appointment-component></appointment-component>
        </div>
    </div>
</div>
@endsection
