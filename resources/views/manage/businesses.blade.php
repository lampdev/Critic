@extends('layouts.head')

@section('content')
<body class="mx-auto my-auto">

  @include('layouts.navbar')

  <div class="row h-100">
      <div class="col-sm-12 my-auto">
          <div class="container">
            <h2><?php echo $section; ?></h2>
          </div>
      </div>
  </div>

</body>
@endsection