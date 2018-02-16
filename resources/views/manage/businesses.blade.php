@extends('layouts.head')

@section('content')


  @include('layouts.navbar')
    <div class="content" style="margin: 60px 10%">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="ModalAddBusiness()" style="padding: 2px 20px; margin: 0 0 1.5% 0;">Add Business</button>
        <table id="table_id" class="table table-striped table-bordered " cellspacing="0" width="100%" >
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Type</th>
                  <th>Edit</th>
                  <th>View Locations</th>
                  <th>Manage Specialties</th>
                  <th>Active</th>
              </tr>
          </thead>
          
          <tbody>
          	@php
             for($i = 1; $i<100; $i++){
            @endphp
            @foreach ($businesses as $business)
              <tr>
                  <td>{{ $business->name }}</td>
                  <td class="clip">{{ $business->description }}</td>
                  <td>{{ $business->type }}</td>
                  <td>Edit</td>
                  <td>View Locations</td>
                  <td>Manage Specialties</td>
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
<div class="modal fade bd-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="LargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form method="post" action="add-business" class="modal-content"><!-- action -->
      {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Business</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div> 
          <div class="row">
          	<div style="width:47%; margin: 0 1.5%">
              <div class="form-group">
                <label for="business-name" class="form-control-label">Business Name:</label>
                <input type="text" class="form-control" name="business-name">
              </div>
              <div class="form-group">
                <label for="business-type" class="form-control-label">Type:</label>
                <input type="text" class="form-control" name="business-type">
              </div>
              <div class="form-group">
                <label for="business-description" class="form-control-label">Description:</label>
                <textarea class="form-control" name="business-description"></textarea>
              </div>
              <div class="form-group">
                <label for="business-wto" class="form-control-label">What To Order:</label>
                <input type="text" class="form-control" name="business-wto">
              </div>
              <div class="form-group">
                <label for="business-wto-description" class="form-control-label">What To Order Description:</label>
                <textarea class="form-control" name="business-wto-description"></textarea>
              </div>
            </div>
            <div style="width:47%; margin: 0 1.5%">
	          <fieldset class="form-group">
			    <label for="business-name" class="form-control-label">Pricing:</label>
			      <div class="row">
				    <div class="form-check" style="width: 20%; margin: 0 5%">
				      <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="business-pricing" value="1" checked>
				        $
				      </label>
				    </div>
				    <div class="form-check" style="width: 20%; margin: 0 5%">
				    <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="business-pricing" value="2">
				        $$
				      </label>
				    </div>
				  </div>
				  <div class="row">
				    <div class="form-check" style="width: 20%; margin: 0 5%">
				    <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="business-pricing" value="3">
				        $$$
				      </label>
				    </div>
				    <div class="form-check" style="width: 20%; margin: 0 5%">
				    <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="business-pricing" value="4">
				        $$$$
				      </label>
				    </div>
				  </div>
			  </fieldset>
			  <div class="form-group">
	            <label for="business-website" class="form-control-label">Website:</label>
	            <input type="text" class="form-control" name="business-website">
	          </div>
	          <div class="form-group">
	          	<div>
			      <label class="form-control-label">Gluten Free:</label>
			      <input type="hidden" name="business-gluten-free" value="off">
			      <input type="checkbox" name="business-gluten-free" value="on">
			  	</div>
			  </div>
			  <div class="form-group">
	            <label for="business-wto-description" class="form-control-label">G.F.Description:</label>
	            <textarea class="form-control" name="business-gf-description"></textarea>
	          </div>
            </div>
          </div>

        </div>
      </div>
      
        
      <div class="modal-footer">
      	<input type="submit" class="btn btn-primary" value="Add">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>
<script>
  function ModalAddBusiness(){
      $('#myModal').modal('show');
  }
</script>
<!--End Modal-->

<script>
  $(document).ready(function() {
    $('#table_id').DataTable( {
        "scrollX": true,
        columnDefs: [ {
            targets: 1,
            render: function ( data, type, row ) {
                return data.substr( 0, 29 );
            }
        } ]
    } );
} );
</script>

@endsection