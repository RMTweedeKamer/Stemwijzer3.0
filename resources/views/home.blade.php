@extends('layouts.layout')

@section('title', 'Stemwijzer')



@section('content')
    <h1>Welkom bij de RMTK Stemwijzer!</h1>

    <form method="post" action="./">
        {{ csrf_field() }}

        <label>
            Vul hieronder een gebruikersnaam in om jouw resultaat op te slaan. <br>
            Wil je de stemwijzer anoniem invullen, laat het veld dan leeg. <br>
            <input type="text" name="username">
        </label>


        @foreach($questions as $question)

            <hr>
            <h2>{{ $question->question }}</h2>
            <p>{{ $question->description }}</p>

            <!--Display all answers for a question-->
            <div class="answers">
                @foreach($answers->where('questionId', $question->id) as $answer)

                    <input type="radio" name="v{{ $question->id }}" id="v{{ $question->id }}a {{ $answer->answerId }}" value="{{ $answer->answerId }}" required>
                    <label for="v{{ $question->id }}a {{ $answer->answerId }}">
                        {{ $answer->answer }}
                    </label>

                @endforeach
            </div>
            <div class="belang">
                <h3>Hoe belangrijk vind je deze vraag?</h3>
                <label>
                    Onbelangrijk
                    <input type="range" name="b{{ $question->id }}" min="1" max="3" value="2">
                    Belangrijk
                </label>
            </div>

        @endforeach

        <button type="submit">Toon resultaat</button>

    </form>

@endsection