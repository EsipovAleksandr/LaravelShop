
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!--own carousel-->
    <link rel="stylesheet" href="/local/resources/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/local/resources/assets/owlcarousel/assets/owl.theme.default.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/starte.css" rel="stylesheet">

</head>
<body>
@include('partials.header')
<div class="container-fluid">
    <div class="starter-template">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-3 col-md-3 ">
                @include('partials.categories')
            </div>
            <div class=" col-xs-12 col-sm-12 col-lg-9 col-md-9 ">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('partials.Footer')
<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="/local/resources/assets/owlcarousel/owl.carousel.min.js"></script>
<script src="/local/resources/assets/js/main.js"></script>
</body>
</html>
