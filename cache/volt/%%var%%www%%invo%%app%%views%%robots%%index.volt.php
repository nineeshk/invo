<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('robots/new', 'Create Robots', 'class' => 'btn btn-primary')); ?>
</div>

<script>
$(document).ready(function(){
$("#a1").click(function(){
    });
});
</script>


<h2>Robots</h2>
<?php $v146936692182449728111iterator = $robots; $v146936692182449728111incr = 0; $v146936692182449728111loop = new stdClass(); $v146936692182449728111loop->length = count($v146936692182449728111iterator); $v146936692182449728111loop->index = 1; $v146936692182449728111loop->index0 = 1; $v146936692182449728111loop->revindex = $v146936692182449728111loop->length; $v146936692182449728111loop->revindex0 = $v146936692182449728111loop->length - 1; ?><?php foreach ($v146936692182449728111iterator as $robot) { ?><?php $v146936692182449728111loop->first = ($v146936692182449728111incr == 0); $v146936692182449728111loop->index = $v146936692182449728111incr + 1; $v146936692182449728111loop->index0 = $v146936692182449728111incr; $v146936692182449728111loop->revindex = $v146936692182449728111loop->length - $v146936692182449728111incr; $v146936692182449728111loop->revindex0 = $v146936692182449728111loop->length - ($v146936692182449728111incr + 1); $v146936692182449728111loop->last = ($v146936692182449728111incr == ($v146936692182449728111loop->length - 1)); ?>
	<?php if ($v146936692182449728111loop->first) { ?>
		<table id="example_basic" class="table table-striped">
		<tr>
			<th>#</th>
			<th>Id</th>
			<th>Name</th>	
			<th>Type</th>
			<th>Year</th>
			<th>Who</th>
			<th>Type</th>
			<th></th>
		</tr>
	<?php } ?>
		<tr>
			<td><a href="<?php echo $this->url->get('robots/edit/' . $robot->id); ?>" title=""><?php echo $v146936692182449728111loop->index; ?></a></td>
			<td><?php echo $robot->id; ?></td>
			<td><?php echo $robot->name; ?></td>	
			<td><?php echo $robot->type; ?></td>
			<td><?php echo $robot->year; ?></td>
			<td><?php echo $robot->Outo->who; ?></td>
			<td><?php echo $robot->RobotType->typeName; ?></td>
			<td><a href="<?php echo $this->url->get('robots/delete/' . $robot->id); ?>" id="a<?php echo $robot->id; ?>" title="">Delete</a></td>
		</tr>
	<?php if ($v146936692182449728111loop->last) { ?>
		</table>
	<?php } ?>
<?php $v146936692182449728111incr++; } ?>
