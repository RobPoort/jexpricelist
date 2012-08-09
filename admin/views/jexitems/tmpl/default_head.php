<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
	<th width="5">
		<?php echo JText::_('COM_JEXPRICELIST_JEXPRICELIST_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>)" />
	</th>
	<th>
		<?php echo JText::_('COM_JEXPRICELIST_JEXPRICELIST_HEADING_ITEMS'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_JEXPRICELIST_JEXPRICELIST_HEADING_CATEGORY'); ?>
	</th>
	<th width="5%">
		<?php echo JTEXT::_('JPUBLISHED'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_JEXPRICELIST_JEXPRICELIST_HEADING_PRICE').' 1'; ?>
	</th>
	<th>
		<?php echo JText::_('COM_JEXPRICELIST_JEXPRICELIST_HEADING_PRICE').' 2'; ?>
	</th>
	<th>
		<?php echo JText::_('COM_JEXPRICELIST_JEXPRICELIST_HEADING_PRICE').' 3'; ?>
	</th>
</tr>