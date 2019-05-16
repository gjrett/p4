@extends('layouts.master')

@section('head')
    <link href='/css/create.css' rel='stylesheet'>
    <title>'Wine List'</title>
@endsection

@section('content')
    <section id='main' class='centered'>
        <h3>Add a Wine</h3>
        <div align='center'>
            <p>* All fields required, enter 'Unknown' or '0' if there is no value'</p>
            <section id='main'>
                <form method='POST' id='addWine' action='/wine/process'>
                    {{ csrf_field() }}

                    <label for='name'>*Wine Name</label><br>
                    <input type='text'
                           name='name'
                           id='name'
                           autocomplete='off'

                           style="width: 100%; height: 30px;"
                           value='{{ old('name') }}'>

                    @include('includes.error-field', ['fieldName' => 'name'])<br>

                    <label for='type'>*Enter the type </label><br>
                    <input type='text'
                           name='type'
                           id='type'
                           style="width: 100%; height: 30px;"
                           autocomplete='off'
                           value='{{ old('type') }}'>

                    @include('includes.error-field', ['fieldName' => 'type'])<br>


                    <label for='grape'>*Enter the grape </label><br>
                    <input type='text'
                           name='grape'
                           id='grape'
                           style="width: 100%; height: 30px;"
                           autocomplete='off'
                           value='{{ old('grape') }}'>
                    @include('includes.error-field', ['fieldName' => 'grape'])<br>

                    <label for='year'>*Enter the year</label><br>
                    <input type='number'
                           name='year'
                           id='year'
                           style="width: 100%; height: 30px;"
                           min='1900'
                           max='2018'
                           autocomplete='off'
                           value='{{ old('year') }}'>
                    @include('includes.error-field', ['fieldName' => 'year'])

                    <label for='vineyard'>*Enter the vineyard </label><br>
                    <input type='text'
                           name='vineyard'
                           id='vineyard'
                           style="width: 100%; height: 30px;"
                           autocomplete='off'
                           value='{{ old('vineyard') }}'>
                    @include('includes.error-field', ['fieldName' => 'vineyard'])<br>

                    <label for='rating'>*Enter the rating </label><br>
                    <input type='text'
                           name='rating'
                           id='rating'
                           style="width: 100%; height: 30px;"
                           autocomplete='off'
                           value='{{ old('rating') }}'>
                    @include('includes.error-field', ['fieldName' => 'rating'])<br>

                    <label for='cost'>*Enter the cost </label><br>
                    <input type='number'
                           step="0.01"
                           name='cost'
                           id='cost'
                           style="width: 100%; height: 30px;"
                           autocomplete='off'
                           value='{{ old('cost') }}'>
                    @include('includes.error-field', ['fieldName' => 'cost'])<br>

                    <label for='comment'>*Enter the comment</label><br>
                    <textarea
                            cols="162"
                            rows="2"
                            name='comment'
                            style='border:2px solid black'></textarea>

                    @include('includes.error-field', ['fieldName' => 'comment'])<br>
                    <input type='submit' form="addWine" value='Submit'>
                </form>
            </section>
        </div>

        @if(count($errors) > 0)
            <div class='alert alert-danger'>Please fix the errors above</div>
    @endif

@endsection