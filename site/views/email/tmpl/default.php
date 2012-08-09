<?php
	/**
	*	site part
	*/
defined('_JEXEC') or die('restricted access');
jimport('joomla.html.html');
JHTML::_('behavior.formvalidation');
?>
<script language="javascript">
function myValidate(f) {
   if (document.formvalidator.isValid(f)) {
      f.check.value='<?php echo JUtility::getToken(); ?>'; //send token
      return true; 
   }
   else {
      var msg = 'Some values are not acceptable.  Please retry.';
 
      //Example on how to test specific fields
      if($('email').hasClass('invalid')){msg += '\n\n\t* Invalid E-Mail Address';}
 
      alert(msg);
   }
   return false;
}
</script>
<form action="" method="post" class="form-validate" onSubmit="return myValidate(this);">
	<?php
		echo JText::_('COM_JEXPRICELIST_EMAIL_INPUT_LABEL');
	?>
	<input type="text" name="email_customer" class="required validate-email" />
	<?php echo JHtml::_('form.token'); ?>
	<button class="button" onClick="this.form.submit()" name="sendList">verzend</button>
	<input type="hidden" name="task" value="email.process" />
</form>
<pre>
	<?php //var_dump($this->state); ?>
</pre>
