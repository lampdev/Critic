@extends('layouts.head')

@section('content')


  @include('layouts.navbar')
    <div class="content" style="margin: 2% 10%">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="ModalAddNeighborhood()" style="padding: 2px 20px; margin: 0 0 1.5% 0;">Add Neighborhoods</button>
        <table id="table_id" class="table table-striped table-bordered " cellspacing="0" width="100%" >
          <thead>
              <tr>
                  <th>Neighborhood</th>
                  <th>City</th>
                  <th>State</th>
                  <th>View Map</th>
                  <th>View Locations</th>
                  <th>Active</th>
              </tr>
          </thead>
          
          <tbody>
            @php
             for($i = 1; $i<100; $i++){
            @endphp
            @foreach ($neighborhoods as $neighborhood)
              <tr>
                  <td>{{ $neighborhood->name }}</td>
                  <td>{{ $neighborhood->city }}</td>
                  <td>{{ $neighborhood->state }}</td>
                  <td>View map</td>
                  <td>View Locations</td>
                  <td>Active</td>
              </tr>
            @endforeach
            @php
            }
            @endphp
          </tbody>
      </table>
    </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
  function ModalAddNeighborhood(){
      $('#myModal').modal('show');
  }
</script>
<!--End Modal-->

<script>
  $(document).ready(function() {
    $('#table_id').DataTable( {
        "scrollX": true
    } );
} );
</script>

@endsection