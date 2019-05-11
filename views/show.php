<?php  
?>
<link rel="stylesheet" href="<?php echo asset('lib/css/fullcalendar.min.css'); ?>">
<script src="<?php echo asset('lib/js/fullcalendar.min.js'); ?>"></script>
<script src="<?php echo asset('views/js/show.js'); ?>"></script>

<h3><?php echo $title; ?></h3>
<input type="hidden" name="" id="url" value="<?php echo action('work/show'); ?>">
<div>
	<button class="btn btn-primary" onclick="backToList('<?php echo action('work'); ?>')">Back to List</button>
</div>
<div id="calendar"></div>