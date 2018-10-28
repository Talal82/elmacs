@extends('layouts.master')

@section('title', 'Clients')

@section('page-title', 'Clients')

@section('stylesheets')

{{-- datatables  --}}
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/plugins/datatables/buttons.bootstrap4.min.css') }}">
{{-- reponsive datatables --}}
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/plugins/datatables/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/plugins/datatables/select.bootstrap4.min.css') }}">

{{-- sweet alert css --}}
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/plugins/sweet-alert/sweetalert2.min.css') }}">

@endsection


@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>All Clients</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('admin.clients.create') }}"><i class="fa fa-plus"></i> New</a>
				</div>
			</div>
			<div class="card-body">
				@if(count($clients) > 0)
				<table class="table">
					<thead>
						<tr>
							<th width="80px">
								<select id="multiple_select" class="custom-select m-b-5" width="100" name="multiple_select">
									<option value="0">action</option>
									<option value="1">delete</option>
								</select>
								<input type="checkbox" id="check_all"><label for="check_all">Check All</label>
							</th>
							<th>Sr.</th>
							<th>Image</th>
							<th>Link</th>
							<th width="60">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($clients as $key => $client)
						<tr>
							<td><input type="checkbox" class="checkbox checkbox-custom" data-id="{{$client->id}}"></td>
							<td>{{ ++$key }}</td>
							<td>
								<img src="{{ asset('public/uploads/images/clients/'. $client -> image) }}" width="100" height="100">
							</td>
							<td>{{ $client -> link }}</td>
							
							<td>
								<a href="{{ route('admin.clients.edit', [ $client -> id ]) }}" class="btn btn-primary btn-sm pull-left m-r-5 waves waves-effect" title="Edit"><i class="fa fa-wrench" title="Edit"></i></a>

								<a href="javascript:void(0);" data-id="{{ $client-> id }}" class="sa-remove waves wave-effect btn btn-danger btn-sm pull-left" title="Delete"><i class="fa fa-trash"></i></a>
								

								{!! Form::open(['route' => ['admin.clients.destroy', $client -> id], 'method' => 'DELETE', 'id' => $client -> id]) !!}
								<input type="submit" name="" style="display: none; visibility: none;">
								{!! Form::close() !!}
							</td>
							
							
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
				<div class="text-center">
					<p>No records found.</p>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection



@section('scripts')

<!-- Required datatable js -->
<script src="{{ asset('public/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('public/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/plugins/datatables/dataTables.select.min.js') }}"></script>

<script>
	var table = $('.table').DataTable({
		"ordering": true, 
		"sort": true,
	});
</script>

<script type="text/javascript" src="{{ asset('public/assets/plugins/sweet-alert/sweetalert2.min.js') }}"></script>
<script>
	$('.sa-remove').click(function (e) {
		e.preventDefault();
		var value = $(this).attr('data-id');
		swal({
			title: "Are you sure ??",
			text: 'The user will be deleted permanently.', 
			icon: "warning",
			buttons: true,
			showCancelButton: true,
			confirmButtonColor: '#d33',
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				// swal(value, 'success');
				$("#"+value).submit();
			}
		}); 
	});

</script>
<script>
  var url = 'delete-multiple-clients';
</script>
<script type="text/javascript" src="{{ asset('public/js/custom/selectDeleteMultiple.js') }}"></script>
@endsection