@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-push-3">
            @if ( Auth::guest() AND !app('request')->input('page') )
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="questions">
                                    <legend class="text-left">Отзывы о компании AmoCRM. AmoCRM - система для автоматизации продаж</legend>
                                </div>
                                <P>АО «АМОЦРМ» (AmoCRM) - компания-разработчик одноименной системы учета потенциальных клиентов и сделок, которая позволяет оптимизировать работу отдела продаж. AmoCRM была выделена из web-интегратора QSOFT в отдельное юридическое лицо в ноябре 2015 года.</P>
                                <P>Сайт был создан для оценки деятельности данной компании. </P>
                                <p><img src="https://www.amocrm.ru/views/pages/landing/images/about_us/logo_bl.png"></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if (!empty($top))
                                <legend class="text-left">
                                    <h1>Топ вопросов</h1>
                                </legend>
                                @foreach( $top as $question )
                                    @include('containers.question_novote')
                                    @if($top->last() != $question)
                                        <hr>
                                    @endif
                                @endforeach
                                <br>
                            @endif

                            <legend class="text-left">
                                <h1>Недавние вопросы</h1>
                            </legend>
                            @foreach( $questions as $question )
                                @include('containers.question')
                                @if($questions->last() != $question)
                                    <hr>
                                @endif
                            @endforeach
                            {{ $questions->links() }}
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