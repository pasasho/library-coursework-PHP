@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Book
                        <a href="{{ URL::to('books') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages 
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        -->

                        <form method="post" action="{{action('admin\BooksController@update', $book->id)}}">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Book Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="book_name" value={{ $book->book_name }} />
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Author_ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="author_id" value={{ $book->author_id }} />
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Genre_ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="genre_id" value={{ $book->genre_id }} />
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">ImageID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="image_id" value={{ $book->image_id }} />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
