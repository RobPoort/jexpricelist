<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('restricted access');
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_jexpricelist&view=jexcat'); ?>" method="post" name="adminForm" id="adminForm">
	<table class="adminlist">
		<tr>
			<th width="5">
				<?php echo JText::_('COM_JEXPRICELIST_JEXPRICELIST_HEADING_ID'); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>)" />
			</th>	
			<th>
				<?php echo JText::_('COM_JEXPRICELIST_JEXPRICECLASS_HEADING_TITLE'); ?>
			</th>	
			<th>
				<?php echo JText::_('COM_JEXPRICELIST_JEXPRICECLASS_HEADING_CLASS_1'); ?>
			</th>
			<th>
				<?php echo JText::_('COM_JEXPRICELIST_JEXPRICECLASS_HEADING_CLASS_2'); ?>
			</th>
			<th>
				<?php echo JText::_('COM_JEXPRICELIST_JEXPRICECLASS_HEADING_CLASS_3'); ?>
			</th>
		</tr>
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
						<?php echo $item->title; ?>
					</td>					
					<td>
						<?php echo $item->text_1; ?>
					</td>
					<td>
						<?php echo $item->text_2; ?>
					</td>
					<td>
						<?php echo $item->text_3; ?>
					</td>
				</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="6"><?php echo $this->pagination->getListFooter(); ?></td>
		</tr>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<pre>
	<?php //var_dump($this->items); ?>
</pre>