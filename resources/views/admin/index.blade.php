<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($page_title) ? $page_title : config('app.name', 'Laravel') }}</title>

    <!-- The following can be cleaned up. Don't always need to include certain files. -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tags.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/editable.css') }}" rel="stylesheet"/> --}}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/editable.js') }}"></script>
    <script src="{{ asset('js/tags.js') }}"></script>
    <script src="{{ asset('js/upvote.js') }}"></script>

    <!-- x-editable -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <!-- Bootstrap tags input -->
    <script src="{{asset('/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <!-- Materialize Bootstrap JS -->
    {{-- <script src="{{ asset('js/mdb.min.js') }}"></script> --}}
    <!-- Best way to load -->
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
        .first-section {
            height: 100px;;
            margin-top: 60px;
        }
        
        .first-section .col-md-4 {
            height: 1008;
        }

        .first-section .cols {
            border: 1px solid #ccc;
            height: 100%;
            padding: 30px;
            font-size: 24px;
            text-align: center
        }
        .downvote-section {
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Add Tags</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/admin/view_users">View Users</a>
                            </li>
                     
                      </ul>
                      <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        <button class="btn btn-danger my-2 my-sm-0" style="margin:5px" type="submit">Log Out</button>
                      </form>
                    </div>
                  </nav>
        <div class="row first-section">
            <div class="col-md-4">
                <div class="cols">
                    Total Questions: {{ $totalQuestion }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="cols">
                    Total users: {{ $totalUser }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="cols">
                    Total Tags: {{ $totalTags }}
                </div>
            </div>
        </div>
        <div class="row downvote-section">
            <div class="col-md-12">
                <h2 class="title">Danger Zone Questions</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Questions</th>
                            <th scope="col">Vote</th>
                            <th scope="col">Action</th>
                        </tr>
                        <tbody>
                            @if (count($belowFive) > 0)
                                @foreach ($belowFive as $item)
                                    <tr>
                                        <th scope="col"> 
                                        <a href="{{ route('question.show', ['id' => $item->id, 'question' => $item->question]) }}"> 
                                                {{ $item->question }}
                                            </a>
                                        </th>
                                        <th scope="col"> {{ $item->vote_ttl }} </th>
                                        <th scope="col">
                                        <form id="delete-form-{{$item->id}}" action="{{ route('question.delete', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>                                            
                                            <button type="submit" class="btn btn-danger" onclick="document.getElementById('delete-form-{{$item->id}}').submit();"> Delete </button></th>
                                    </tr>
                                @endforeach
                                
                            @else
                                No Record Found
                            @endif
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
   
          
          
</body>
</html>