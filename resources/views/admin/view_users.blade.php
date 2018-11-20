


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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
        .table{
            text-align: center;
        
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
                    <a class="navbar-brand" href="/admin">Forum Nepal Admin Panel</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                          <a class="nav-link" href="/admin">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Add Tags</a>
                        </li>
                        <li class="nav-item active">
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
                  <h2 style=" text-align: center">Forum Nepal User Details</h2>
                  <table align="center" class="table table-bordered">
                        <tr>
                           <td>ID</td>
                           <td>Name</td>
                           <td>Email</td>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                           <td>{{ $user->id }}</td>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                     </table>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form action = "/create" method = "post">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <table>
                           <tr>
                              <td>Name</td>
                              <td><input type='text' name='stud_name' /></td>
                           </tr>
                           <tr>
                              <td colspan = '2'>
                                 <input type = 'submit' value = "Add Tag"/>
                              </td>
                           </tr>
                        </table>
                     </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
          
</body>
</html>