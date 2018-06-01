@extends('main.master')


@section('title','Home page');

@section('content')

    <div class="col-md-6 col-md-offset-3">

        <h3 class="text-center text-success">Ajax Select</h3>
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                @foreach($errors->all() as $error)
                    <strong>{!! $error !!}</strong><br>
                @endforeach
            </div>
        @endif
        <h3 id="successMessage"></h3>
        <form action="{{ route('sub_category.store')  }}" method="post">
            {{ csrf_field()  }}
            <div class="form-group">
                <level>Select Category</level>
                <select id="category" onchange="getMessage()" name="category_id" class="form-control">,
                    <option value="">Select a category</option>

                    @foreach($category as $value)

                        <option value="{{ $value->id  }}">{{ $value->category_name  }}</option>

                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <p id="msg"></p>
                <level>Select Sub Category</level>
                <select class="form-control" name="sub_cat" id="subcat">

         
                </select>

            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-success">
            </div>
        </form>

    </div>
    <script>
        function getMessage(){
            var category_id=$('#category').val();
            $.ajax({
                method:'get',
                url: "{{ url('findcat') }}"+'/'+category_id,
                success:function (data) {
                    
                    $('#subcat').html(data);
                }

            });
        }
    </script>
@endsection
