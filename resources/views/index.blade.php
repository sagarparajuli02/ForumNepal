@extends('layouts.app')

@section('content')
<style>
   
        .jumbotron {
            background-color: #04B2B1;
            text-align: center;
            font-style: oblique;
            color: #fff;
        }
        .jumbotron p{
            font-size: 20px;
        }
        .jumbotron h2{
            font-size: 30px;
        }
        .navbar-form{
           
            background-color: #fff;
        }
        .input-group{
            width: 100%;
        }
        body{
            margin: auto;
           
        }
        .col-md-3, .col-md-6{
            position: relative;

min-height: 1px;

padding-left: 5px;

padding-right: 5px;
        }
        
    
        </style>

     
         <div class="container"style="width:95%">
                <div class="jumbotron">
             
                        <h2 class="lead">Welcome to Forum Nepal.</h2>
                        <p class="lead">An open Community for Nepali People.Ask and Share view with People.</p>
                    
                             <form class="navbar-form" role="search" action="/search/" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Please , Search Your Question here ........." name="query">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                             </form>
                            
                        
                 </div>
    <div class="row">
            <div class="col-md-3">
                    @include('layouts.sidebar_auth')
                    @include('containers.tags')
                    @include('layouts.sidebar')
                </div>
        <div class="col-md-6 ">
              
            @if ( Auth::guest() AND !app('request')->input('page') )
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="questions">
                                    <legend class="text-left">Answer Nepal Together we will find the Answer</legend>
                                </div>
                                <p>
                                    This the  online forum for Questios ans answer .
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           

                            <legend class="text-left">
                                <h1>Recent Questions</h1>
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
        <div class="col-md-3">
        
            <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @if (!empty($top))
                                    <legend class="text-left">
                                        <h1 style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Top Questions</h1>
                                    </legend>
                                    @foreach( $top as $question )
                                        @include('containers.question_novote')
                                        @if($top->last() != $question)
                                            <hr>
                                        @endif
                                    @endforeach
                                    <br>
                                @endif
    
                               
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    </div>

@endsection