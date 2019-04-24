@extends('layouts.app')

@section('content')
        <div class="container-fluid">
                <div class="row" style="max-height:100vh;">
                    <div class="col-sm col-lg-2  col-xl-2 clear" >
                        <sidebar-component></sidebar-component>
                    </div>
                    <div class=" col-sm-12 col-lg-10 clear">
                            <edit-pet></edit-pet>
                    </div>
                </div>
            </div>
@endsection
