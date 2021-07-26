@include('layouts.header1')
    <meta name="csrf-token" >
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  </head>
  <body>
    <div class="container" >

      <h2>Case Registration</h2><br/>
      <form method="post" action="{{url('datepickerPost')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
            <label for="select-unit">Court Type</label>

            <select class="custom-select{{ $errors->has('courtmaster') ? ' is-invalid' : '' }}" id="courtmaster" name="courtmaster">

                <option value="" selected>Select </option>


                @foreach ($courtlist as $item)
                <option value="{{ $item->courtname }}" > {{ $item->courtname }}</option>
                @endforeach

                </select>
                @error('id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('courtname') }}</strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong>Date : </strong>
            <input class="date form-control"  type="text" id="datepicker" name="date">
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
    </script>
  </body>
</html>
