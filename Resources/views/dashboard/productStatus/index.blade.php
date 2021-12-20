@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Product Status</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Product Status</li>
<li class="breadcrumb-item active">All</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
                     <table class="display" id="basic-1">
                        <thead>
                            @if($message = Session::get('success'))
                            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                <i data-feather="thumbs-up"></i>
                                <p>{{ $message }}</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                            @endif
                            @can('product-status-create')
                                <div style="margin-bottom:5px ">
                                    <a class="btn btn-success" href="{{ route('productStatuses.create') }}"> Create Status</a>
                                </div>
                            @endcan
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                         </thead>
                            <tbody>
                            @foreach ($statuses as $key => $status)
                                <tr id="delete_productStatuses_{{ $status->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $status->name }}</td>
                                    <td>{{ $status->description }}</td>
                                    <td class="text-center">
                                        @can('product-status-edit')
                                        <a class="btn btn-primary m-b-5"  href="{{ route('productStatuses.edit',$status->id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('product-status-delete')
                                           <a href="javascript:void(0);" onclick="delete_item({{ $status->id }},'productStatuses')" class="btn btn-danger m-b-5"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
