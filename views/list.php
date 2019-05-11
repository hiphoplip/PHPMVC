<?php  
?>
<script type="text/javascript" src="<?php echo asset('views/js/list.js'); ?>"></script>
<?php if(getSession("success") != null) {?>
	<div class="alert alert-success">
		<?php 
		echo getSession("success");
		//set null
		setSession("success", null);
		?>
	</div>
<?php } ?>
<h3><?php echo $title; ?></h3>
<div>
	<button class="btn btn-success" onclick="addClick()">Add new task</button>
	<button class="btn btn-primary" onclick="showClick()">Show Calendar</button>

</div>

<div>
	<table class="table table-hover">
	  	<thead>
	    	<tr>
		      	<th scope="col">ID</th>
		      	<th scope="col">Task Name</th>
		      	<th scope="col">Start</th>
		      	<th scope="col">End</th>
		      	<th scope="col">Status</th>
		      	<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
	  	<?php foreach ($listTask as $task) { ?>
	    <tr>
	      	<th scope="row"><?php echo $task->id; ?></th>
	      	<td><?php echo $task->name; ?></td>
	      	<td><?php echo $task->startDate; ?></td>
	      	<td><?php echo $task->endDate; ?></td>
	      	<td>
	      		<?php 
	      		switch ($task->status) {
	      			case 1:
	      				$color = "progress-bar-info";
	      				break;
	      			case 2:
	      				$color = "progress-bar-warning";
	      				break;
	      			case 3:
	      				$color = "progress-bar-success";
	      				break;
	      			default:
	      				$color = "";
	      				break;
	      		}
	      		?>
	      		<span class="badge <?php echo $color; ?>"><?php echo $task->getStatus()->name; ?></span>
	  		</td>
	      	<td>
		      	<div>
		      		<button class="btn btn-info" style="width: 60px" onclick="editClick(<?php echo $task->id ?>)">Edit</button>
		      		<button class="btn btn-danger" style="width: 60px" onclick="deleteClick(<?php echo $task->id ?>)">Delete</button>
		      	</div>
	      </td>
	    </tr>
	    <?php } ?>
	 	</tbody>
	</table>
</div>