<?php
?>

@extends('layouts.master')

@section('head')
    <link href='/css/edit.css' rel='stylesheet'>
    <title>'Edit Wine List'</title>
@endsection

@section('content')
    <section id='main' class='centered'>
        <h2>{{ $wine['name'] }}</h2>
        <img class='displayed' src='/image/wines/AlomosMendoza2.png' id='logo' alt='Wine'>
        @if(count($wine) == 0)
            Input Error! No Wine Information Available.
        @else
            <form method='GET' ID='id' name='id' action='/wine/update'>
                {{ csrf_field() }}
    {{--{{ method_field('put') }} --}}

                <table border="1">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Grape</th>
                        <th>Year</th>
                        <th>Vineyard</th>
                        <th>Rating</th>
                        <th>Cost</th>
                    </tr>

                        <td><input type='text' id='name' name='name' value='{{$wine['name']}}'></td>
                        <td><input type='text' id='type' name='type' value='{{$wine['type']}}'></td>
                        <td><input type='text' id='grape' name='grape' value='{{$wine['grape']}}'></td>
                        <td><input type='number' id='year' name='year' value='{{$wine['year']}}'></td>
                        <td><input type='text' id='vineyard' name='vineyard' value='{{$wine['vineyard']}}'></td>
                        <td><input type='number' id='rating' name='rating' value='{{$wine['rating']}}'></td>
                        <td><input type='number' step="0.01" id='cost' name='cost' value='{{$wine['cost']}}'></td>
                    </tr>
                </table>
                <label> Comment </label>
                <textarea name="comment" cols="165" rows="2" style="border:2px solid black;"> {{$wine['comment']}}</textarea>
                <td><input type='submit' form="id" value='Update'></td>
            </form>
        @endif
    </section>



@endsection
