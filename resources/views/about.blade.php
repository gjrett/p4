@extends('layouts.master')

@section('content')
    <section id='main' class='centered'>
        <h1>About My Wine List</h1>
        <p>
            @include('includes.description')
        </p>

        <p>
            The source code for this project can be viewed here:
            <a href='{{ config('app.githubUrl') }}'>{{ config('app.githubUrl') }}</a>
        </p>
    </section>
@endsection