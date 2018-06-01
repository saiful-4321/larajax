@extends('main.master')


@section('title','Home page');

@section('content')

    <div class="col-md-6 col-md-offset-3">

        <h3 class="text-center text-success">Sub Category insert</h3>
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                @foreach($errors->all() as $error)
                    <strong>{!! $error !!}</strong><br>
                @endforeach
            </div>
        @endif
        <form action="{{ route('sub_category.store')  }}" method="post">
            {{ csrf_field()  }}
            <div class="form-group">
                <level>Select Category</level>
                <select name="category_id" class="form-control">,
                 <option value="">Select a category</option>

                    @foreach($category as $value)

                        <option value="{{ $value->id  }}">{{ $value->category_name  }}</option>

                        @endforeach

                </select>
            </div>
            <div class="form-group">
                <level>Sub Category name</level>
                <input type="text" name="sub_cat_name"  class="form-control" value="{{ old('sub_cat_name')  }}">
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-success">
            </div>
        </form>

    </div>
@endsection