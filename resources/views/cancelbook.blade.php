@include('layouts.header1')
    <meta name="csrf-token" content="{{ csrf_token() }}"><body>
        <script src=//www.codermen.com/js/jquery.js></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <body>
        <div class="container" style="background-color: lightcyan">
            @include('sweet::alert')
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('cancelbookpost') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="select-unit" class="col-md-4 control-label">Select Book</label>
                        <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title">

                            <option value="" selected>select</option>


                            @foreach ($cancellist as $item)
                            <option value="{{ $item->id }}" > {{ $item->ordername }}</option>
                            @endforeach

                            </select>
                            @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="select-unit" class="col-md-4 control-label">Show Order Quantity</label>
                        <div class="col-md-6">

                        <select class="custom-select{{ $errors->has('bookqty') ? ' is-invalid' : '' }}" id="bookqty" name="bookqty">

                            <option value="0" disabled="true" >Show order Quantiy</option>
                            </select>
                            @error('bookqty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bookqty') }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-6">

                      <input type="submit" value="Cancel Order">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script type=text/javascript>
            $('#title').change(function(){
            var title = $(this).val();
            if(title){
              $.ajax({
                type:"GET",
                url:"{{url('get-bookcancel-list')}}?id="+title,
                success:function(res){
                if(res){
                  $("#bookqty").empty();

                  $.each(res,function(key,value){
                    $("#bookqty").append('<option value="'+key+'">'+value+'</option>');
                  });

                }else{
                  $("#bookqty").empty();
                }
                }
              });
            }else{
              $("#bookqty").empty();
              $("#bookqty").empty();
            }
            });
        </script>
</body>
