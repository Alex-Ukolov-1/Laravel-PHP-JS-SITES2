@php
// todo edit tags
foreach( $question->tags as $tag ) {
   $arr[] = $tag->name;
}
$commaList = implode(',', $arr);

@endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="questions">
                                    <legend class="text-left">
                                        <h1>Задать вопрос</h1>
                                    </legend>
                                </div>
                                @if( !Auth::check() )
                                    <p>Вы должны быть зарегестрированы и авторизованы , чтобы задать вопрос. <a href="/register">Register Here</a></p>
                                @else
                                    {{ Form::open( array('url'=>'question/edit','class' =>'form-horizontal') ) }}
                                    {{ Form::hidden('id', $question->id) }}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            {!! Form::text('question', $question->question, ['class' => 'form-control', 'maxlength' => 140, 'placeholder' => 'Should be in the form of an interview question...','required']) !!}
                                            <small>140  limit</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="tab-pane" id="skill_level" name="Skill Level">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
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

