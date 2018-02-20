@extends('layouts.head')

@section('content')

@include('layouts.navbar')

<div class="content" style="margin: 60px 10%">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="ModalAddPaymentOption()" style="padding: 2px 20px; margin: 0 0 1.5% 0;">Add Payment Option</button>
	<table id="table_id" class="table table-striped table-bordered " cellspacing="0" width="100%" >
		<thead>
			<tr>
				<th>Name</th>
				<th>Edit</th>
				<th>Active</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($paymentOptions as $paymentOption)
			<tr>
				<td>{{ $paymentOption->name }}</td>
				<td id="edit" data-id="{{$paymentOption->id}}"><a> test </a></td>
				<td>Active</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Modal window Add Payment Option-->
<div class="modal fade bd-modal-lg" id="myAddModal" tabindex="-1" role="dialog" aria-labelledby="LargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form method="post" action="add-paymentOption" class="modal-content"><!-- action -->
			{{ csrf_field() }}
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Payment Option</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
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
<!-- Modal window Edit Payment Option-->
<div class="modal fade bd-modal-lg" id="myEditModal" tabindex="-1" role="dialog" aria-labelledby="LargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form method="post" action="add-paymentOption" class="modal-content"><!-- action -->
			{{ csrf_field() }}
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Payment Option</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				@if ($errors->has('payment-option-name'))
				<div class="alert alert-danger" role="alert">
				  <strong>Nope!</strong> {{ $errors->first('payment-option-name', ':message') }}
				</div>
				<p></p>
				<div class="form-group has-danger">	
					<label for="payment-option-name" class="form-control-label">Payment Option Name:</label>
					<input type="text" class="form-control" name="payment-option-name" value="{{old('payment-option-name')}}">
				</div>
				@else
				<div class="form-group">
					<label for="payment-option-name" class="form-control-label">Payment Option Name:</label>
					<input type="text" class="form-control" name="payment-option-name" value="{{}}">
				</div>
				@endif
					
				
			</div>


			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Add">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</form>
	</div>
</div>
<!-- kek -->


<div class="modal hide" id="addBookDialog">
 <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Modal header</h3>
  </div>
    <div class="modal-body">
        <p>some content</p>
        <input type="text" name="bookId" id="bookId" value=""/>
    </div>
</div>

<!--Modal window script-->
<script>
	function ModalAddPaymentOption(){
		$('#myAddModal').modal('show');
	}
$(document).on("click", "#edit", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
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
	} );

@if (count($errors) > 0)
	@if (session('type') == 'add')
		ModalAddPaymentOption();
	@else
		ModalEditPaymentOption();
	@endif
@endif
</script>

@endsection