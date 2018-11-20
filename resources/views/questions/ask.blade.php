@extends('layouts.app')
@section('content')
<div class="container"style="width:95%">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="questions">
                                    <legend class="text-left">
                                        <h1>Ask Question</h1>
                                    </legend>
                                </div>
                                @if( !Auth::check() )
                                    <p>You must be registered and logged in to ask a question. <a href="/register">Register Here</a></p>
                                @else
                                    {{ Form::open( array('url'=>'question','class' =>'form-horizontal') ) }}
                                    {{ Form::token() }}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            {{-- {!! Form::text('question', null, ['class' => 'form-control','maxlength' => 200, 'placeholder' => 'Submit Your Queries here..','required']) !!} --}}
                                            <textarea name="question" id="" cols="30" rows="10" class="md-textarea" required></textarea>
                                            <small>200 character limit</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="tab-pane" id="skill_level" name="Skill Level">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="txtTags">Tags</label>
                                                        @if (!$tags->isEmpty())
                                                            @foreach( $tags as $tag )
                                                                <small><a href="/tag/{{ $tag->name }}">{{ $tag->name }}</a>,</small>
                                                            @endforeach
                                                        @endif

                                                        {!! Form::text('tags', null, [ 'class' => 'form-control', 'id' => 'txtTags', 'name' => 'tags', 'data-role' => 'tagsinput', 'placeholder' => 'Add Tag', 'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
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
                @include('containers.tags')
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection