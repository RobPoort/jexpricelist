<?php
defined('_JEXEC') or die('Restricted Access');

$valuta = $this->valuta;
?>
<?php if($this->items){ ?>
<h1>
	<?php
		echo JText::_('COM_JEXPRICELIST_SIMPLE_LIST');
	?>
</h1>
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
		<td><?php echo $item->price_1; ?></td>
		<td><?php echo $item->price_2; ?></td>
		<td><?php echo $item->price_3; ?></td>
		
	</tr>
<?php
	}
?>
</table>
</form>
<?php } else { ?>
<h2>Geen resultaten</h2>
<?php }; ?>
<?php
//var_dump($this->price_class);
