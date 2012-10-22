<?php
defined('_JEXEC') or die('Restricted Access');

$valuta = $this->valuta;
$config = $this->config;
$css_file = $config->css_file;
$css_path = 'components/com_jexpricelist/css/';
//kijken of css toegevoegd moet worden
if($config->showCss){
	JHtml::stylesheet($css_file,$css_path);
}
?>

<?php 
if($this->items){
	if($config->showTitle){
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
	<?php
		if($config->class_1){
	?>
	<th><?php echo $this->price_class->text_1; ?></th>
	<?php
	}
	?>
	<?php 
		if($config->class_2){
	?>
	<th><?php echo $this->price_class->text_2; ?></th>
	<?php
	}
	?>
	<?php
		if($config->class_3){
	?>
	<th><?php echo $this->price_class->text_3; ?></th>
	<?php
	}
	?>
</tr>
<?php
	foreach($this->items as $item){
?>
	<tr>		
		<td width="50%"><?php echo $item->price_item; ?></td>
		<?php
		if($config->class_1){
		?>
		<td><?php echo $valuta->html_char.'&nbsp;'.number_format($item->price_1,2,$valuta->decimal_char,$valuta->m_char); ?></td>
		<?php
		}
		?>
		<?php
		if($config->class_2){
		?>
		<td><?php echo $valuta->html_char.'&nbsp;'.number_format($item->price_2,2,$valuta->decimal_char,$valuta->m_char); ?></td>
		<?php
		}
		?>
		<?php
		if($config->class_3){
		?>
		<td><?php echo $valuta->html_char.'&nbsp;'.number_format($item->price_3,2,$valuta->decimal_char,$valuta->m_char); ?></td>
		<?php
		}
		?>		
	</tr>
<?php
	}
?>
</table>
</form>
<?php } else { ?>
<h2><?php echo JText::_('COM_JEXPRICELIST_NORESULT'); ?></h2>
<?php };
