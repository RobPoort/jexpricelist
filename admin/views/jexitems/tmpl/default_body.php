<?php
defined('_JEXEC') or die('Restricted Access');
?>
<?php
	foreach($this->items as $i => $item) : ?>
		<tr class="row<?php echo $i % 2; ?>">
			<td>
				<?php echo $item->id; ?>
			</td>
			<td>
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
			<td>
				<?php echo $item->price_item; ?>
			</td>
			<td>
				<?php echo $item->title; ?>
			</td>
			<td class="center">
				<?php echo JHtml::_('jgrid.published', $item->published, $i, 'jexitems.', true);?>
			</td>
			<td>
				<?php echo $item->price_1; ?>
			</td>
			<td>
				<?php echo $item->price_2; ?>
			</td>
			<td>
				<?php echo $item->price_3; ?>
			</td>
		</tr>
<?php endforeach; ?>