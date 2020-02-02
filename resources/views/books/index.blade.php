@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Books
                        <a href="{{ URL::to('books/create') }}" class="pull-right">Add Book</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Book Name</td>
                                <td>AuthorID</td>
                                <td>GenreID</td>
                                <td>ImageID</td>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->book_name }}</td>
                                    <td>{{ $value->author_id }}</td>
                                    <td>{{ $value->genre_id }}</td>
                                    <td>{{ $value->image_id }}</td>

                                   <!-- <td><img src="<?php echo asset('imagecache/small/' . $value->sampleName);?>" alt="image" /></td>
                                    <!-- we will also add show, edit, and delete buttons -->
                                   <td>

                                       <!-- show the subjects (uses the show method found at GET /admin/subjects/{id} -->
                                       <!--<a class="btn btn-small btn-success" href="{{ URL::to('locations' . $value->id) }}">Show Location</a> -->
                                       <!-- edit this subject (uses the edit method found at GET /admin/subjects/{id}/edit -->
                                       <a class="btn btn-small btn-info" href="{{ URL::to('books' . '/' . $value->id . '/edit') }}">Edit Book</a>
                                       </td>
                                       <td>
                                       <form action="{{action('admin\BooksController@destroy', $value->id )}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete Book</button>
                                        </form>

                                        

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
