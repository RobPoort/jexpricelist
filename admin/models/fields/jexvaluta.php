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
		// $options = array();
		
		// $options[] = JHtml::_('select.option','1','Euro');
		// $options[] = JHtml::_('select.option','2','Dollar');
		// $options[] = JHtml::_('select.option','3','Yen');
		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,name');
		$query->from('#__jexpricelist_valuta');
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		
		$options = array();
		if($rows)
		{
			foreach($rows as $row)
			{
				$options[] = JHtml::_('select.option', $row->id, ucwords($row->name));
			}
		}
		
		return $options;
	}
}