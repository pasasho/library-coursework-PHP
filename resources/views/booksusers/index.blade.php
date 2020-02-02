@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="font-size:45px">Books</h1>  
                    </div>

                    <div class="panel-body">

                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif

                       <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>Book Name</td>
                                <td>Author</td>
                                <td>Genre</td>
                                <td>Image</td>
                            </tr>
                            </thead>
                            <tbody>
                                
                                   @foreach($books as $detail)
                                   <tr>
                                       <td>{{$detail->book_name}}</td>
                                       <td>{{$detail->author_name}}</td>
                                       <td>{{$detail->genre}}</td>
                                       <td><img src="<?php echo asset('imagecache/small/' . $detail->book_name);?>" alt="image" /></td>
                                       </td>
                                   </tr>
                                       
                                    @endforeach
                       
                                </tr>
                            
                        
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
