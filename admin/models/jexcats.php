<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('restricted acces');
jimport('joomla.application.component.modellist');

class JexPricelistModelJexCats extends JModelList
{
	/**
	*	model to build a query to get the data
	*	@return	string	een query string
	*/
	protected function getListQuery()
	{
		//nieuw query-object creeeren
		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		
		
		$query->from('#__jexpricelist_class as jp');
		
		$query->select('id, title, text_1,text_2,text_3,params as params');
		
		
		return $query;
	}
	/* public function delete()
	{
		
		parent::delete();
		
	} */
	
}