<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Syd's Coffee House</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <style>
          #title-main {
            text-align: center;
          }
          .center {
            text-align: center;
          }
        </style>
    </head>
    <body>
      <div class="container">
        <h1 id="title-main">Order Now</h1>
        <div class="row">
          <div class="col-sm-3">Home</div>
          <div class="col-sm-3">About Us</div>
          <div class="col-sm-3">Order Now</div>
          <div class="col-sm-3">Our Menu</div>
        </div>
      </div>
      <form action="/order" method="POST" style="padding:20px">
        @csrf
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label" style="padding-left:30px">Name:</label>
          <div class="col-sm-3">
            <input type="string" class="form-control" id="name" name="name" placeholder="Your Name">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label" style="padding-left:30px">Email Address:</label>
          <div class="col-sm-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="email@web.com">
          </div>
        </div>
        <fieldset>
        @foreach($items as $i)
          <div class="form-group row">
            <label for='{{ $i->item }}' class="col-sm-2 col-form-label" style="padding-left:30px">{{ $i->item }}:</label>
            <div class="col-sm-1">
              <input type="number" class="form-control" name='selection[]' min="0" value="0">
            </div>
            <br>
          </div>
        @endforeach
      </fieldset>
        <button type="submit" class="btn btn-primary">Submit Order</button>
      </form>
      <p id="order_complete" style="padding-left:20px">{{ session('mes') }}</p>
    </body>
</html>
