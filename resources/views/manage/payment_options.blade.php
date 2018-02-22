@extends('layouts.head')

@section('content')

@include('layouts.navbar')

<div class="content" style="margin: 60px 10%">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal" onclick="ModalPaymentOption(0)" style="padding: 2px 20px; margin: 0 0 1.5% 0;">Add Payment Option</button>
	<table id="table_id" class="table table-striped table-bordered " cellspacing="0" width="100%" >
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Edit</th>
				<th>Active</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($paymentOptions as $paymentOption)
			<tr>
				<td>{{ $paymentOption->id }}</td>
				<td>{{ $paymentOption->name }}</td>
				<td id="edit">Edit</td>
				<td>Active</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Modal window Add Payment Option-->
<div class="modal fade bd-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="LargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form method="post" action="add-paymentOption" class="modal-content">
			{{ csrf_field() }}
			<div class="modal-header">
				<h5 class="modal-title" id="ModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="rowId" name="row-id" value="0">
				@if ($errors->has('payment-option-name'))
				<div class="alert alert-danger" role="alert">
				  <strong>Nope!</strong> {{ $errors->first('payment-option-name', ':message') }}
				</div>
				<p></p>
				<div class="form-group has-danger">	
				@else
				<div class="form-group">	
				@endif
					<label for="payment-option-name" class="form-control-label">Payment Option Name:</label>
					<input type="text" class="form-control" name="payment-option-name" value="{{old('payment-option-name')}}">
				</div>
			</div>


			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Add">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</form>
	</div>
</div>
<input id="errors-count" type="hidden" value="{{count($errors)}}">
<input id="old-id" type="hidden" value="{{old('row-id')}}">

<!--Modal window script-->
<script>

	function ModalPaymentOption(rowId){
		$('#Modal').modal('show');
		if (rowId > 0){
			var modalLabel = "Edit Payment Option";
		} else {
			var modalLabel = "Add Payment Option";
		}
		document.getElementById("ModalLabel").innerHTML = modalLabel;
		document.getElementById("rowId").value = rowId;
	}
</script>

<script>
	// datatable 
	$(document).ready(function() {
		var table = $('#table_id').DataTable( {
			"scrollX": true,
			"columnDefs": [ //hide id column
			{
				"targets": [ 0 ],
				"visible": false,
				"searchable": false
			}
			]
		} )
	//hide .danger when it clicked
	$(".form-group").click(function() {
		$(this).removeClass('has-danger');
	})
	// on click "Edit"
	$('#table_id tbody').on('click', '#edit', function () {
		//get row data
		var data = table.row($(this).parents('tr')).data();
		ModalPaymentOption(data[0]);
	})
    //if Modal Form returns errors 
	if (document.getElementById("errors-count").value > 0){
		var id = document.getElementById("old-id").value;
		ModalPaymentOption(id);
	}
} );

	

</script>

@endsection