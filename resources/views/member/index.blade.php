@extends('template/base')

@section("content")


{{$bspaginator->config(array(
    'cur_page' => isset($_GET['page']) ? $_GET['page']:1,
    'base_url' => '/members/index',
    'total_rows' => $total_members
)) }}
<div class="row">
	<div class="col-sm-6">
	<h3>Listing members</h3>
	<h4>Total: <?=$total_members?></h4>
	</div>
	<div class="span6">
		<div class="pull-right">
			<?= $bspaginator->pagination_links()?>
		</div>
	</div>
</div>
<div class="row">

	<div class="col-sm-6">
		<a class="btn btn-success pull-left" href="/members/create"><span class="glyphicon glyphicon-plus"></span> Create new Member</a><br/><br/>
	</div>
</div>

<?php if($members){ ?>
<table class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Name</th>
		<th>Gender</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Address</th>
		<th>Nationality</th>
		<th>Education Background</th>
		<th>Mode of contact</th>
		<th></th>
	</tr>
	</thead>
	<?php $i=0;?>
	<?php foreach ($members as $member) : ?>
		<tr>
			<td><?=$member['name']?></td>
			<td><?=$member['gender']?></td>
			<td><?=$member['phone']?></td>
			<td><?=$member['email']?></td>
			<td><?=$member['address']?></td>
			<td><?=$member['nationality']?></td>
			<td><?=$member['education_background']?></td>
			<td><?=$member['mode_of_contact']?></td>
			<td>
				<div class="btn-group">
					<a class="btn-mini btn-info dropdown-toggle" data-toggle="dropdown" href="#">
					Actions
					<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li><a data-toggle="modal" href="#view-modal<?=$i?>">View</a></li>
				</ul>
				</div>
			</td>
		</tr>

		<!-- Modal -->
		  <div class="modal" id="view-modal<?=$i?>" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Member Information</h4>
		        </div>
		        <div class="modal-body">
		          <p>Name : <?=$member['name']?></h4>
		          <p>Gender : <?=$member['gender']?></p>
		          <p>Phone : <?=$member['phone']?></p>
		          <p>Address : <?=$member['address']?></p>
		          <p>Email : <?=$member['email']?></p>
		          <p>Nationality : <?=$member['nationality']?></p>
		          <p>Education Background : <?=$member['education_background']?></p>
		          <p>Mode of Contact : <?=$member['mode_of_contact']?></p>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		  <?php $i++;?>
	<?php endforeach;?>
</table>
<?php }else{ ?>
	<div class="well">
		<p>
			<h1>No members</h1>
		</p>
	</div>
<?php }?>


@stop