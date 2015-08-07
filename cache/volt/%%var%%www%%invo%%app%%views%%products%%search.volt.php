<?php echo $this->getContent(); ?>

<ul class="pager">
    <li class="previous">
        <?php echo $this->tag->linkTo(array('products', '&larr; Go Back')); ?>
    </li>
    <li class="next">
        <?php echo $this->tag->linkTo(array('products/new', 'Create products')); ?>
    </li>
</ul>

<?php $v128809210458156633961iterated = false; ?><?php $v128809210458156633961iterator = $page->items; $v128809210458156633961incr = 0; $v128809210458156633961loop = new stdClass(); $v128809210458156633961loop->length = count($v128809210458156633961iterator); $v128809210458156633961loop->index = 1; $v128809210458156633961loop->index0 = 1; $v128809210458156633961loop->revindex = $v128809210458156633961loop->length; $v128809210458156633961loop->revindex0 = $v128809210458156633961loop->length - 1; ?><?php foreach ($v128809210458156633961iterator as $product) { ?><?php $v128809210458156633961loop->first = ($v128809210458156633961incr == 0); $v128809210458156633961loop->index = $v128809210458156633961incr + 1; $v128809210458156633961loop->index0 = $v128809210458156633961incr; $v128809210458156633961loop->revindex = $v128809210458156633961loop->length - $v128809210458156633961incr; $v128809210458156633961loop->revindex0 = $v128809210458156633961loop->length - ($v128809210458156633961incr + 1); $v128809210458156633961loop->last = ($v128809210458156633961incr == ($v128809210458156633961loop->length - 1)); ?><?php $v128809210458156633961iterated = true; ?>
    <?php if ($v128809210458156633961loop->first) { ?>
<table class="table table-bordered table-striped" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Product Type</th>
            <th>Name</th>
            <th>Price</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
    <?php } ?>
        <tr>
            <td><?php echo $product->id; ?></td>
            <td><?php echo $product->getProductTypes()->name; ?></td>
            <td><?php echo $product->name; ?></td>
            <td>$<?php echo sprintf('%.2f', $product->price); ?></td>
            <td><?php echo $product->getActiveDetail(); ?></td>
            <td width="7%"><?php echo $this->tag->linkTo(array('products/edit/' . $product->id, '<i class="glyphicon glyphicon-edit"></i> Edit', 'class' => 'btn btn-default')); ?></td>
            <td width="7%"><?php echo $this->tag->linkTo(array('products/delete/' . $product->id, '<i class="glyphicon glyphicon-remove"></i> Delete', 'class' => 'btn btn-default')); ?></td>
        </tr>
    <?php if ($v128809210458156633961loop->last) { ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="7" align="right">
                <div class="btn-group">
                    <?php echo $this->tag->linkTo(array('products/search', '<i class="icon-fast-backward"></i> First', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('products/search?page=' . $page->before, '<i class="icon-step-backward"></i> Previous', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('products/search?page=' . $page->next, '<i class="icon-step-forward"></i> Next', 'class' => 'btn')); ?>
                    <?php echo $this->tag->linkTo(array('products/search?page=' . $page->last, '<i class="icon-fast-forward"></i> Last', 'class' => 'btn')); ?>
                    <span class="help-inline"><?php echo $page->current; ?> of <?php echo $page->total_pages; ?></span>
                </div>
            </td>
        </tr>
    </tbody>
</table>
    <?php } ?>
<?php $v128809210458156633961incr++; } if (!$v128809210458156633961iterated) { ?>
    No products are recorded
<?php } ?>
