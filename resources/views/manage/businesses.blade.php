@extends('layouts.head')

@section('content')


@include('layouts.navbar')

<div class="content" style="margin: 60px 10%">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal" onclick="ModalBusiness()" style="padding: 2px 20px; margin: 0 0 1.5% 0;">Add Business</button>
	<table id="table_id" class="table table-striped table-bordered " cellspacing="0" width="100%" >
		<thead>
			<tr>
				<th>Id</th>
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
			@foreach ($businesses as $business)
			<tr>
				<td>{{ $business->id }}</td>
				<td>{{ $business->name }}</td>
				<td class="clip">{{ $business->description }}</td>
				<td>{{ $business->type }}</td>
				<td id="edit">Edit</td>
				<td>View Locations</td>
				<td>Manage Specialties</td>
				<td>Active</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Modal window Add Business-->
<div class="modal fade bd-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="LargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form method="post" action="add-business" class="modal-content"><!-- action -->
			{{ csrf_field() }}
			<div class="modal-header">
				<h5 class="modal-title" id="ModalLabel">Add Business</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div> 
					<div class="row">
						<div style="width:47%; margin: 0 1.5%">
							<input type="hidden" id="rowId" name="row-id" value="0">
							@if ($errors->has('business-name'))
							<div class="alert alert-danger" role="alert">
							  <strong>Nope!</strong> {{ $errors->first('business-name', ':message') }}
							</div>
							<p></p>
							<div class="form-group has-danger">	
							@else
							<div class="form-group">	
							@endif
								<label for="business-name" class="form-control-label">Business Name:</label>
								<input type="text" class="form-control" name="business-name" value="{{old('business-name')}}">
							</div>

							@if ($errors->has('business-type'))
							<div class="alert alert-danger" role="alert">
							  <strong>Nope!</strong> {{ $errors->first('business-type', ':message') }}
							</div>
							<div class="form-group has-danger">	
							@else
							<div class="form-group">	
							@endif
								<label for="business-type" class="form-control-label">Type:</label>
								<input type="text" class="form-control" name="business-type" value="{{old('business-type')}}">
							</div>

							@if ($errors->has('business-description'))
							<div class="alert alert-danger" role="alert">
							  <strong>Nope!</strong> {{ $errors->first('business-description', ':message') }}
							</div>
							<div class="form-group has-danger">	
							@else
							<div class="form-group">	
							@endif
								<label for="business-description" class="form-control-label">Description:</label>
								<textarea class="form-control" name="business-description">{{old('business-description')}}</textarea>
							</div>

							@if ($errors->has('business-wto'))
							<div class="alert alert-danger" role="alert">
							  <strong>Nope!</strong> {{ $errors->first('business-wto', ':message') }}
							</div>
							<div class="form-group has-danger">	
							@else
							<div class="form-group">	
							@endif
								<label for="business-wto" class="form-control-label">What To Order:</label>
								<input type="text" class="form-control" name="business-wto" value="{{old('business-wto')}}">
							</div>

							@if ($errors->has('business-wto-description'))
							<div class="alert alert-danger" role="alert">
							  <strong>Nope!</strong> {{ $errors->first('business-wto-description', ':message') }}
							</div>
							<div class="form-group has-danger">	
							@else
							<div class="form-group">	
							@endif
								<label for="business-wto-description" class="form-control-label">What To Order Description:</label>
								<textarea class="form-control" name="business-wto-description">{{old('business-wto-description')}}</textarea>
							</div>
						</div>

						<div style="width:47%; margin: 0 1.5%">
							@if ($errors->has('business-pricing'))
							<div class="alert alert-danger" role="alert">
							  <strong>Nope!</strong> {{ $errors->first('business-pricing', ':message') }}
							</div>
							<fieldset class="form-group has-danger">	
							@else
							<fieldset class="form-group">	
							@endif
							
								<label for="business-pricing" class="form-control-label">Pricing:</label>
								@for($i=1;$i<=4;$i++)
								@if($i%2 == 1)
								<div class="row">
									<div class="form-check" style="width: 20%; margin: 0 5%">
										<label class="form-check-label">
											@if (old('business-pricing') == $i)
											<input type="radio" class="form-check-input" name="business-pricing" value={{$i}} checked>
											@else
											<input type="radio" class="form-check-input" name="business-pricing" value={{$i}}>
											@endif
											@for($j=1;$j<=$i;$j++)
											$
											@endfor
										</label>
									</div>
									@else
									<div class="form-check" style="width: 20%; margin: 0 5%">
										<label class="form-check-label">
											@if(old('business-pricing') == $i)
											<input type="radio" class="form-check-input" name="business-pricing" value={{$i}} checked>
											@else
											<input type="radio" class="form-check-input" name="business-pricing" value={{$i}}>
											@endif
											@for($j=1;$j<=$i;$j++)
											$
											@endfor
										</label>
									</div>
								</div>
								@endif
								@endfor
							</fieldset>

							@if ($errors->has('business-website'))
							<div class="alert alert-danger" role="alert">
							  <strong>Nope!</strong> {{ $errors->first('business-website', ':message') }}
							</div>
							<div class="form-group has-danger">
							@else
							<div class="form-group">	
							@endif
								<label for="business-website" class="form-control-label">Website:</label>
								<input type="text" class="form-control" name="business-website" value="{{old('business-website')}}">
							</div>
							<div class="form-group">
								<div>
									<label class="form-control-label">Gluten Free:</label>
									@if(old('business-gluten-free') == "on")
									<input type="hidden" name="business-gluten-free" value="off">
									<input type="checkbox" name="business-gluten-free" value="on" checked>
									@else
									<input type="hidden" name="business-gluten-free" value="off">
									<input type="checkbox" name="business-gluten-free" value="on">
									@endif
									
								</div>
							</div>

							@if ($errors->has('business-gf-description'))
							<div class="alert alert-danger" role="alert">
							  <strong>Nope!</strong> {{ $errors->first('business-gf-description', ':message') }}
							</div>
							<div class="form-group has-danger">	
							@else
							<div class="form-group">	
							@endif
								<label for="business-gf-description" class="form-control-label">G.F.Description:</label>
								<textarea class="form-control" name="business-gf-description">{{old('business-gf-description')}}</textarea>
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
<input id="errors-count" type="hidden" value="{{count($errors)}}">
<input id="old-id" type="hidden" value="{{old('row-id')}}">

<!--Modal window script-->
<script>

	function ModalBusiness(rowId){
		$('#Modal').modal('show');
		if (rowId > 0){
			var modalLabel = "Edit Business";
		} else {
			var modalLabel = "Add Business";
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
			},
			{
				targets: [2],
				render: function ( data, type, row ) {
					return data.substr( 0, 29 );
				}
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
		ModalBusiness(data[0]);
	})
    //if Modal Form returns errors 
	if (document.getElementById("errors-count").value > 0){
		var id = document.getElementById("old-id").value;
		ModalBusiness(id);
	}
} );

	

</script>

@endsection