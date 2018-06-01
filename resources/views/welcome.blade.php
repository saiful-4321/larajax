@extends('main.master')


@section('title','Home page');

@section('content')

    <div class="col-md-6 col-md-offset-3">

        <h3 class="text-center text-success">Category insert</h3>
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                @foreach($errors->all() as $error)
                    <strong>{!! $error !!}</strong><br>
                @endforeach
            </div>
        @endif
        <form action="{{ route('category.store')  }}" method="post">
            {{ csrf_field()  }}
        <div class="form-group">
            <level>Category name</level>
            <input type="text" name="category_name" class="form-control">
        </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-success">
            </div>
        </form>

    </div>
@endsection