<?php  

?>
<script type="text/javascript" src="<?php echo asset('views/js/edit.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo asset('views/css/edit.css'); ?>">
<link rel="stylesheet" href="<?php echo asset('lib/css/bootstrap-datepicker.min.css'); ?>">
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
<form method="POST" action="<?php echo action('work/submit'); ?>" class="col-sm-10" autocomplete="off">
	<input type="hidden" name="id" value="<?php echo $task->id; ?>">
	<!-- TaskName -->
	<div class="form-group">
		<label class="control-label" for="taskName">Task Name:</label>
		<div>
	      	<input type="textbox" class="form-control" name="name" id="taskName" placeholder="Enter task name" value="<?php echo $task->name; ?>">
	    </div>
	</div>
	<!-- Start Date -->
	<div class="form-group">
		<label class="control-label" for="startDate">Start Date:</label>
		<div>
			<div class='input-group date' >
                    <input type='text' class="form-control" id='startDate' name="startDate" value="<?php echo $task->startDate; ?>"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
	      <!-- <div class="form-group">
                
            </div> -->
	    </div>
	</div>

	<!-- End Date -->
	<div class="form-group">
		<label class="control-label" for="endDate">End Date:</label>
		<div>
	      <div class="form-group">
                <div class='input-group date' >
                    <input type='text' class="form-control" id='endDate' name="endDate" value="<?php echo $task->endDate; ?>"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
	    </div>
	</div>

	<!-- Status -->
	<div class="form-group">
		<label class="control-label col-sm-2" for="status">Status:</label>
		<div>
	    	<select name="status" class="form-control">
				<?php foreach ($listStatus as $key => $status) {
					if($task->status == $status->id)
						echo "<option value='".$status->id."' selected>".$status->name."</option>";
					else
						echo "<option value='".$status->id."'>".$status->name."</option>";
				} ?>
			</select>
	    </div>
	</div>

	<!-- Button -->
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-2">
			<?php if($type == "update") {?>
	    		<button class="btn" id="btnUpdate" name="action" value="update">Update</button>
	    	<?php } else {?>
	    		<button class="btn" id="btnAdd" name="action" value="add">Add Task</button>
	    	<?php } ?>
	    </div>
<!-- 	    <div class="col-sm-offset-9 col-sm-2">
	    	<button class="btn" id="btnDelete" name="action" value="delete">Delete</button>
	    </div> -->
	    <div class="col-sm-2">
	    	<button class="btn" id="btnDelete" name="action" value="back">Back</button>
	    </div>
	</div>
</form>