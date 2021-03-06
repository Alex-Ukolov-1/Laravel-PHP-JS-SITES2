@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h1>{{ $user->name }}</h1><br>
                                    @if ( $questions->isEmpty() )
                                        <p> Этот пользователь ещё не задавал впоросы</p>
                                    @else
                                        <div id="questions">
                                            <legend class="text-left">Недавние вопросы</legend>
                                        </div>
                                        <ul style="list-style-type: none; padding-left:0px;">
                                            @foreach( $questions as $question )
                                                <li>
                                                    <div class="row panel">
                                                        <div class="col-md-12">
                                                            <div class="header">
                                                                <h4 style="margin: 0;display: inline;"><a href="/question/{{$question->id}}/{{ App\Classes\Url::get_slug($question->question) }}" title="{{ $question->question }}">{{ $question->question }}</a></h4> <small>{{count($question->answers)}} Answers | {{ $question->created_at->diffForHumans() }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if ( $answers->isEmpty() )
                                        <p> Этот пользователь ещё не задовал вопросы пока</p>
                                    @else
                                        <div id="answers">
                                            <legend class="text-left">Недавние ответы</legend>
                                        </div>
                                        <ul style="list-style-type: none;">
                                            @foreach( $answers as $answer )
                                                <li>
                                                    <div class="row panel">
                                                        <div class="col-md-12">
                                                            <div class="header">
                                                                <h4 style="margin: 0;display: inline;"><a href="/question/{{$answer->question->id}}/{{ App\Classes\Url::get_slug($answer->question->question) }}" title="{{ $answer->question->question }}">{{ ucfirst($answer->question->question) }}</a></h4> <small>{{ $answer->created_at->diffForHumans() }}</small>
                                                                <p>{{$answer->answer}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                @include('layouts.sidebar_auth')
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection