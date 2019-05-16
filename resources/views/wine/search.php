'@extends('layouts.master')

@section('head')
<link href='/css/show.css' rel='stylesheet'>
<title>'Wine List'</title>
@endsection

@section('content')
<div>
    <section id='main' class='centered'>
        <h4>Wine List</h4>
        @if(count($wines) == 0)
        Input Error! No Wine Information Available.
        @else
        <form method='GET' ID='id' name='id' action='/wine/edit'>
            {{ csrf_field() }}
            {{-- {{ method_field('put') }} --}}

            <table border="1">
                <tr>
                    <th>Actions</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Grape</th>
                    <th>Year</th>
                    <th>Vineyard</th>
                    <th>Rating</th>
                    <th>Cost</th>
                </tr>

                @foreach($wines as $wine)
                <tr>

                    <td><input type='submit' form="id" value='Edit'><a href='/wine/{{$wine['id']}}/delete'> Delete</a></td>
                    <td> <input type='number' size="3" readonly id='id' name='id' value='{{$wine['id']}}'></td>
                    <td>{{$wine['name']}}</td>
                    <td>{{$wine['type']}}</td>
                    <td>{{$wine['grape']}}</td>
                    <td>{{$wine['year']}}</td>
                    <td>{{$wine['vineyard']}}</td>
                    <td>{{$wine['rating']}}</td>
                    <td>{{$wine['cost']}} </td>
                </tr>

                @endforeach
            </table>
        </form>
        @endif
    </section>
</div>
@endsection

