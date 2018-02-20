@extends('layouts.head')

@section('content')

@include('layouts.navbar')


<div class="content" style="margin: 60px 10%">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="ModalAddSpecialty()" style="padding: 2px 20px; margin: 0 0 1.5% 0;">Add Specialty</button>
	<table id="table_id" class="table table-striped table-bordered " cellspacing="0" width="100%" >
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Active</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($specialties as $specialty)
			<tr>
				<td>{{ $specialty->name }}</td>
				<td>Edit</td>
				<td>Active</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Modal window Add Specialty-->
<div class="modal fade bd-modal-lg" id="myAddModal" tabindex="-1" role="dialog" aria-labelledby="LargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form method="post" action="add-specialty" class="modal-content"><!-- action -->
			{{ csrf_field() }}
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Specialty</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				@if ($errors->has('specialty-name'))
				<div class="alert alert-danger" role="alert">
				  <strong>Nope!</strong> {{ $errors->first('specialty-name', ':message') }}
				</div>
				<p></p>
				<div class="form-group has-danger">	
				@else
				<div class="form-group">	
				@endif
					<label for="specialty-name" class="form-control-label">Specialty Name:</label>
					<input type="text" class="form-control" name="specialty-name" value="{{old('specialty-name')}}">
				</div>
			</div>


			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Add">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</form>
	</div>
</div>
<!--Modal window script-->
<script>
	function ModalAddSpecialty(){
		$('#myAddModal').modal('show');
	}
	function ModalEditSpecialty(){
		$('#myEditModal').modal('show');
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
		$(".form-group").click(function() {
			$(this).removeClass('has-danger');
		})
		@if (count($errors) > 0)
			@if (session('type') == 'add')
			ModalAddSpecialty();
			@else
			ModalEditSpecialty();
			@endif
		@endif
	} );
</script>

@endsection