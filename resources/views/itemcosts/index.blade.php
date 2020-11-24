<!DOCTYPE html>
<html lang="en">
<head>
  <title>Techflow360 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Laravel Form Validation and SQL Transaction Example</h1>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4" >
@if (session()->has('message') || session()->has('status'))
    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session()->get('message') }}</div>
@endif
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif  
      <h3>Input Data into <strong>item_cost</strong></h3>
          <form action="{{route('itemcosts.store')}}" method="post">
            @csrf
            <div class="form-group">
            <label for="fname">Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Item Name">
            </div>
            <div class="form-group">
            <label for="cost">Cost</label>
            <input type="text"  class="form-control" id="cost" name="cost" placeholder="Item Cost">
            </div>
            <button style="float:right;" type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
     <div class="col-sm-6">
      <h3>Example Statement</h3>
      <p>Say we have a table called item_cost. It has three columns named id, name and cost. The id column is the primary key and is auto-incremented by the system. The name column is always of varchar value of 30 characters and only alphabets and space is allowed. Finally, the cost column stores value as a non-negative integer only.</p><p> Now, consider another table total_item_cost. This table has one row with one of its column i.e, total initialised to zero. The id of this row is 1. Every time an item is inserted into the item_cost table the total value from total_item_cost is retrieved and added with the new entry cost. Finally, this new total is updated into the total field of total_item_cost.</p> 
    </div>

  </div>
</div>

</body>
</html>
