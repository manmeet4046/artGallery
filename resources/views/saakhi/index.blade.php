@extends('layouts.master')
@section('content')

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 
<div class="container py-5">
@if (session('success'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('success') }}
                        </div>
     @endif
<h3 class="text-center">{{__('List of Published Saakhi Patrika')}}</h3>
	@can('isAdmin')<h3 class="text-center"><a href='saakhi/create' class=" btn-success btn-sm">Add New Saakhi</a></h3>@endcan

<div class=" table-responsive">
	<table class="table table-bordered table-striped" id="myTable">
		
		<thead>
			<tr>
				<th width="20%">{{__('Title')}}</th>
				  <th>{{__('Publisher')}}</th>
				  <th>{{__('Volume')}}</th>
				  <th>{{__('Issue')}}</th> 
				  <th>{{__('Date')}}</th>
				  <th width="10%">{{__('Action')}}</th>
				  
				

			</tr>
		</thead>
		
	</table>	
	</div>
	
	
</div>
 @endsection

 @section('scripts')

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
	$(function(){
		$('#myTable').DataTable({
			processing:true,
			serverSide:true,
			ajax:'{!!route('journals')!!}',
			columns:[
				{data: 'title',name:'title'},
				{data: 'publisher',name:'publisher'},
				{data: 'volume',name:'volume'},
				{data: 'issue',name:'issue'},
				{data: 'date',name:'date'},
				{data: 'action',name:'action'}


			]

		});

	});

	
</script>




<script src="{{asset('js/superfish.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>



 @endsection