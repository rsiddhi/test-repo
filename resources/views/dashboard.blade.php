@extends('/template/base')

@section("content")

@if(count($members)>0)
	<h3>Recently Created Members</h3>

	<table class="table table-sm">
  	<thead>
    	<tr>
      		<th>#</th>
      		<th>Name</th>
    	</tr>
  	</thead>
  	<tbody>
  		
  		{{--*/ $count = 0 /*--}}
  		@foreach ($members as $member)
  			<tr>
      			<th scope="row">{{$count = $count+1}}</th>
      			<td>{{ $member['name'] }}</td>
    		</tr>
  		@endforeach
  	</tbody>
	</table>
@endif

@stop