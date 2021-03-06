@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @if ( $questions->isEmpty() )
                                    <p> Здесь нет вопросов.</p>
                                @else
                                    <div id="questions">
                                        <legend class="text-left">
                                            <h1>"{{$query}}" Результаты поиска</h1>
                                        </legend>
                                    </div>
                                    @foreach( $questions as $question )
                                        @include('containers.question')
                                        @if($questions->last() != $question)
                                            <hr>
                                        @endif
                                    @endforeach
                                    {{ $questions->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                @include('layouts.sidebar_auth')
                @include('containers.tags')
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
