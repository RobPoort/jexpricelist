<?php
defined('_JEXEC') or die('Restricted Access');

$valuta = $this->valuta;
?>
<?php if($this->items){
if($this->config->showTitle){
?>
<h1>
	<?php
		echo JText::_('COM_JEXPRICELIST_SIMPLE_LIST');
	?>
</h1>
<?php
}
?>
<form action="<?php echo JRoute::_('index.php?option=com_jexpricelist'); ?>" method="post" >
<table width="80%" class="pricelist_table" style="border:0;" border="0" cellpadding="0" cellspacing="0">
<tr>
	<th>&nbsp;</th>
	<th><?php echo $this->price_class->text_1; ?></th>
	<th><?php echo $this->price_class->text_2; ?></th>
	<th><?php echo $this->price_class->text_3; ?></th>
</tr>
<?php
	foreach($this->items as $item){
?>
	<tr>		
		<td width="50%"><?php echo $item->price_item; ?></td>
		<td><?php echo $valuta->html_char.'&nbsp;'.number_format($item->price_1,2,$valuta->decimal_char,$valuta->m_char); ?></td>
		<td><?php echo $valuta->html_char.'&nbsp;'.number_format($item->price_2,2,$valuta->decimal_char,$valuta->m_char); ?></td>
		<td><?php echo $valuta->html_char.'&nbsp;'.number_format($item->price_3,2,$valuta->decimal_char,$valuta->m_char); ?></td>
		
	</tr>
<?php
	}
?>
</table>
</form>
<?php } else { ?>
<h2><?php echo JText::_('COM_JEXPRICELIST_NORESULT'); ?></h2>
<?php };
