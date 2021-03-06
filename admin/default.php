<?php
defined('_JEXEC') or die('restricted access');
jimport('joomla.html.html');
?>

<?php
//var_dump($this->price_class);
if($this->items){
?>
<h1>
	Kostenoverzicht
</h1>
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
					<td >
						<?php		
						echo $item->price_item;						
						?>
					</td>
					<td class="priceCheck" align="right">
						<?php echo '&euro; '.number_format($price[$this->selector],2,',','.'); ?>
					</td>
					<td class="priceCheck" align="right">
						<?php if($checked != ''){
						echo '&euro; '.number_format($price[$this->selector],2,',','.');  ?>						
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
			<td align="right">
				<?php echo '&euro; '.number_format($this->state->totaal,2,',','.'); ?>
			</td>
		</tr>
	<?php
	}
	?>
	
</table>

<?php echo JHtml::_('form.token'); ?>
<button class="button" onClick="this.form.submit()" name="sendList">Bereken</button>
<input type="hidden" name="option" value="com_jexpricelist" />
<input type="hidden" name="task" value="adding.test" />
<!--<input type="hidden" name="item_price[]" value="<?php $this->item_price; ?>" />-->
<input type="hidden" name="view" value="adding" />
</form>
<div class="clr"></div>
<!--<a href="wat-kost-een-uitvaart-0-18/?view=email" target="_blank">email</a>-->
<a  class="sub" href="<?php echo $this->uri->toString(); ?>/?view=email">Stuur berekening</a>
<hr />
<?php
}
?>
<pre>
	<?php
		$var = $this->app->getUserStateFromRequest("$this->option", 'selected_in_request');
		//$uri = JFactory::getURI();
		//var_dump($this->uri->toString());
	?>
</pre>
