<?php
defined('_JEXEC') or die('Restricted Access');

//import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');


class JFormFieldJexKlasse extends JFormFieldList
{
	/**
	*	the form field type
	*	@var string
	*/
	protected $type = 'JexKlasse';
	
	/**
	*	Method to get a list of options for a list input
	*
	*	@return	array	an array of JHtml options
	*/
	protected function getOptions(){
		
		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		$query->select('id, title');
		$query->from('#__jexpricelist_class');
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		
		$options = array();
		if($rows){
			foreach($rows as $row){
				$options[] = JHtml::_('select.option', $row->id, $row->title);
			}
		}
		
		
		return $options;
	}
}