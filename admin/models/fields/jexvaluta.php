<?php
defined('_JEXEC') or die ('move along now, nothing to see');

//import the help files
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldJexValuta extends JFormFieldList
{
	/**
	*	the form field type
	*	@return	string
	*/
	
	protected $type = 'jexvaluta';
	
	protected function getOptions()
	{
		$options = array();
		
		$options[] = JHtml::_('select.option','1','Euro');
		$options[] = JHtml::_('select.option','2','Dollar');
		$options[] = JHtml::_('select.option','3','Yen');
		
		return $options;
	}
}