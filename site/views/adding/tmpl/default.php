<?php
defined('_JEXEC') or die('restricted access');
jimport('joomla.html.html');

$valuta = $this->valuta;
$config = $this->config;
$css_file = $config->css_file;
$css_path = 'components/com_jexpricelist/css/';
// kijken of css toegevoegd moet worden
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
			echo JText::_('COM_JEXPRICELIST_ADDING_LIST');
		?>
	</h1>
	<?php
}
?>
<br />
<br />
<?php
	if($config->showSelector){
?>
<fieldset class="selector">
<form action="" method="post" >
	<select name="selector" onChange="this.form.submit()">		
		<option value="1" <?php if($this->selector == 1){ echo 'selected="selected"';}; ?>><?php echo $this->price_class->text_1; ?></option>
		<option value="2" <?php if($this->selector == 2){ echo 'selected="selected"';}; ?>><?php echo $this->price_class->text_2; ?></option>
		<option value="3" <?php if($this->selector == 3){ echo 'selected="selected"';}; ?>><?php echo $this->price_class->text_3; ?></option>
	</select>
	<input type="hidden" name="task" value="adding.selector" />
</form>
</fieldset>
<?php
	}
?>
<br/>
<table width="100%" class="pricelist_table" style="border:0;" border="0" cellpadding="0" cellspacing="0">
<form action="" method="post" >
	<?php
		foreach($this->items as $item){
			$price = array(1=>$item->price_1, 2=>$item->price_2, 3=>$item->price_3);
			$checked = '';
			if(in_array($item->id, $this->selected)){
				$checked = 'checked="checked"';
			}		
			
			?>
				<tr>
					<td>
						<input type="checkbox" name="select[<?php echo $item->id; ?>]" value="<?php echo $item->id; ?>" <?php echo $checked; ?> />
					</td>
					<td class="pricelist_item">
						<?php		
						echo $item->price_item;						
						?>
					</td>
					<td class="pricelist_colum" align="right">
						<?php echo $valuta->html_char.'&nbsp;'.number_format($price[$this->selector],2,$valuta->decimal_char,$valuta->m_char); ?>
					</td>
					<td class="pricelist_colum_checked" align="right">
						<?php if($checked != ''){
						echo $valuta->html_char.'&nbsp;'.number_format($price[$this->selector],2,$valuta->decimal_char,$valuta->m_char);  ?>						
						<?php } ?>
						<input type="hidden" name="item_price[<?php echo $item->id; ?>]" value="<?php echo $price[$this->selector]; ?>" />
					</td>					
				</tr>
			<?php
		}
	if(isset($this->data['select'])){
	?>
		<tr>
			<td colspan="3">
				&nbsp;
				<hr />
			</td>
			<td align="right">
				+
				<hr />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				&nbsp;
				
			</td>
			<td align="right" class="pricelist_total">				
				<?php echo $valuta->html_char.'&nbsp;'.number_format($this->state->totaal,2,$valuta->decimal_char,$valuta->m_char); ?>
			</td>
		</tr>
	<?php
	}
	?>
	
</table>
<br/>
<?php echo JHtml::_('form.token'); ?>
<button class="button" onClick="this.form.submit()" name="sendList">Bereken</button>
<input type="hidden" name="option" value="com_jexpricelist" />
<input type="hidden" name="task" value="adding.addItems" />
<input type="hidden" name="view" value="adding" />
</form>
<div class="clr"></div>
<?php
	if($config->emailOption){
?>
<a  class="button" href="<?php echo $this->uri->toString(); ?>/?view=email"><button class="button" name="send"><?php echo JText::_('COM_JEXPRICELIST_SEND_CALCULATION'); ?></button></a>
<?php
	}
?>
<br/>
<?php
} else {
	?>
	<span class="no-result"><?php echo JText::_('COM_JEXPRICELIST_NORESULT') ?></span>
	<?php
}