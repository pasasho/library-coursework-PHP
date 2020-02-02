@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        View Book
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>BookName</td>
                                <td>Author</td>
                                <td>Genre</td>
                            </tr>
                            </thead>
                            <tbody>
                                
                                   
                                     <tr>
                                     @if($details != null)
                                       <td>{{$details->author_name}}</td>
                                       <td>{{$details->genre}}</td>
                                       </tr>
                                       @endif
                                     
                                   
                       
                                </tr>
                            
                        
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
