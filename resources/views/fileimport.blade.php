@include('layouts.header1')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPLOAD/DOWNLOAD</title>
    <meta name="csrf-token" >
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>

<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
         upload/download
        </h2>

        <form action="{{ route('fileImportPost') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="row">

                    <div class="form-group col-md-4">
                      <strong>Date : </strong>
                      <input class="date form-control"  type="button" id="datepicker" name="date">
                   </div>
                  </div>
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="file">
                    <label class="custom-file-label" for="file">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary" >UPLOAD</button>
            <a class="btn btn-success" href="{{ route('export') }}">DOWNLOAD</a>
        </form>
    </div>
</body>
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
     });
</script>
</html>
