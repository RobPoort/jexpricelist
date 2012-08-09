<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('restricted access');
JHtml::_('behavior.tooltip');
JHTML::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_jexpricelist&view=jexpriceclass&layout=edit&id='.(int)$this->item->id); ?>" method="post" name="adminForm" id="jexitem-form" class="form-validate">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEXPRICELIST_JEXPRICELIST_DETAILS'); ?></legend>
			<ul class="adminformlist">
				<?php foreach($this->form->getFieldset('details') as $field) : ?>
					<li><?php echo $field->label;echo $field->input; ?></li>
				<?php endforeach; ?>
			</ul>
		</fieldset>
	</div>
	<div>
		<input type="hidden" name="task" value="jexpriceclass.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<pre>
	<?php //var_dump($this->item,$this->form); ?>
</pre>