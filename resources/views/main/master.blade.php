<!DOCTYPE html>

<html>

<head>
    <title>@yield('title','Ajax testing in laravel')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div class="container">
    <div class="row header">

        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="{{ url('/')  }}">Home</a></li>
            <li role="presentation"><a href="{{ route('sub_category.index')  }}">sub cat</a></li>
            <li role="presentation"><a href="{{ route('ajax.index') }}">ajax Response</a></li>
            <li role="presentation"><a href="{{ url('ajaxCategory') }}">Ajax Pageload</a></li>
            <li role="presentation"><a href="{{ route('category.index')  }}">View category</a></li>
            <li role="presentation"><a href="#">about</a></li>
            <li role="presentation"><a href="#">portfolio</a></li>
        </ul>
    </div>

    <div class="row">
        @yield('content')
    </div>

    <div class="row footer">
        <h3 class="text-center">All right reserved by shakhawat</h3>
    </div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>



</html>