@extends('layouts.master')

@section('content')
<div>
    <section id='main'>
        <h1>Welcome to {{ config('app.name') }}</h1>
        <p>
            @include('includes.description')
        </p>
    <section>
</div>

<footer>
    &copy; {{ date('Y') }}
    <a href='https://github.com/gjrett/p4'>View this project on Github</a>
</footer>

@endsection