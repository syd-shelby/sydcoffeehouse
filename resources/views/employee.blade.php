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
        <h1 id="title-main">Employee View</h1>
        <div class="row">
          <div class="col-sm-3">Home</div>
          <div class="col-sm-3">About Us</div>
          <div class="col-sm-3">Order Now</div>
          <div class="col-sm-3">Our Menu</div>
        </div>
        <ul>
        @foreach($orders as $order)
          <li> {{ $order->name }} </li>
          </form>
          <ul>
            @foreach($order->order as $json)
            <li> {{ $json['item'] }} : {{ $json['quantity'] }} </li>
            @endforeach
          </ul>
          <form action="/employee" method="POST">
            @csrf
            @method('DELETE')
            <button name={{ $order->id }}>Complete Order</button>
          </form>
        @endforeach
      </ul>
      </div>
    </body>
</html>
