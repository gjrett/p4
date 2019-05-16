@extends('layouts.master')

@section('content')
    <section id='main' class='centered'>
        <h1>Contact</h1>
        <p>
            For information or help, please email {{ config('mail.supportEmail') }}.
        </p>
    </section>
@endsection