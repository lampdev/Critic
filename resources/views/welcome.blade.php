@extends('layouts.head')

@section('content')
<body class="mx-auto my-auto">

    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <div class="container">
              <h2>Critic form</h2>
              <form action="/action_page.php">
                <div class="form-group">
                  <label for="login">Login:</label>
                  <input type="login" class="form-control" id="login" placeholder="Enter login" name="login">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                  </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>

        </div>

    </div>

</body>
@endsection
