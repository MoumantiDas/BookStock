@include('layouts.header1')
<meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>dropdown</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src=//www.codermen.com/js/jquery.js></script>

<body>
<div class="container" >
  <div >

   <div >
      <div class='row' >
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="title">Select Country</label>
        <select style="width: 200px" id="country" name=category_id  >
        <option value="" selected disabled>Select Country</option>
         @foreach($countries as $key => $country)
         <option value="{{$key}}"> {{$country}}</option>
         @endforeach

         </select>
        </div>
      </div>
      <div class='row'>
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
        <label for="title">Select State:</label>
        <select style="width: 200px" class="state" id="state">

            <option value="0" disabled="true" selected="true">Select State:</option>

        </select>
        </div>
      </div>

      <div class='row'>
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">

        <label for="title">Select City:</label>
        <select style="width: 200px" name=city id="city">

            <option value="0" disabled="true" selected="true">Select city:</option>

        </select>

        </div>
      </div>
   </div>
  </div>
</div>
<script type=text/javascript>
  $('#country').change(function(){
  var countryID = $(this).val();
  if(countryID){
    $.ajax({
      type:"GET",
      url:"{{url('get-state-list')}}?country_id="+countryID,
      success:function(res){
      if(res){
        $("#state").empty();
        $("#state").append('<option>Select</option>');
        $.each(res,function(key,value){
          $("#state").append('<option value="'+key+'">'+value+'</option>');
        });

      }else{
        $("#state").empty();
      }
      }
    });
  }else{
    $("#state").empty();
    $("#city").empty();
  }
  });
  $('#state').on('change',function(){
  var stateID = $(this).val();
  if(stateID){
    $.ajax({
      type:"GET",
      url:"{{url('get-city-list')}}?state_id="+stateID,
      success:function(res){
      if(res){
        $("#city").empty();
        $.each(res,function(key,value){
          $("#city").append('<option value="'+key+'">'+value+'</option>');
        });

      }else{
        $("#city").empty();
      }
      }
    });
  }else{
    $("#city").empty();
  }

  });
</script>
</body>
</html>
