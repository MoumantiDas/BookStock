
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WBTC</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="container" style="margin-top: 50px; margin-left: 300px">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="Name">Product Category:</label>
          <select style="width: 200px" class="productcategory" id="prod_cat_id">

            <option value="0" disabled="true" selected="true">-Select-</option>
            @foreach($prod as $cat)
                <option value="{{$cat->id}}">{{$cat->product_cat_name}}</option>
            @endforeach

        </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="Name">Product Name:</label>
          <div class="productname">
          <select style="width: 200px" >

            <option value="0" disabled="true" selected="true">Product Name</option>
        </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="Name">Product Price:</label>
          <input type="text" class="prod_price">
        </div>
      </div>
</div>


      <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('change','.productcategory',function(){
                 console.log("hmm its change");

                var cat_id=$(this).val();
                 console.log(cat_id);
                var div=$(this).parent();

                var op=" ";

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findProductName')!!}',
                    data:{'id':cat_id},
                    success:function(data){
                        console.log('success');

                        console.log(data);

                        console.log(data.length);
                        op+='<option value="0" selected disabled>choose product</option>';
                        for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].productname+'</option>';
                       }

                       div.find('.productcategory').html(" ");
                       div.find('.productcategory').append(op);
                    },
                    error:function(){
                        console.log("error in productCategory");
                    }
                });
            });

            $(document).on('change','.productname',function () {
                var prod_id=$(this).val();

                var a=$(this).parent();
                console.log(prod_id);
                var op="";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findPrice')!!}',
                    data:{'id':prod_id},
                    dataType:'json',//return data will be json
                    success:function(data){
                        console.log("price");
                        console.log(data.price);


                        // here price is coloumn name in products table data.coln name

                        a.find('.prod_price').val(data.price);

                    },
                    error:function(){

                    }
                });


            });

        });
    </script>
</body>
</html>



