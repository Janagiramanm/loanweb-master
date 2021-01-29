@extends('layouts.clientapp')
@section('all-page')
    <div class="container m-5 justify-content-center">
        <h1>Your Application Was Submitted Sucessfully</h1>
        <p>Our agent will get back to you!</p>
        <h1>Your Application id is : {{ $app_id }}</h1>
    </div>
@endsection
