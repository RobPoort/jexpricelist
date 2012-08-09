<?php
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.modellist');

class JexPricelistModelJexItems extends JModelList
{
	/**
	*	method to build a SQL query to load the list data
	*	@return	string	A sql-query
	*/	
	protected function getListQuery(){
		//create a new query object
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);		
		$query->from('#__jexpricelist as jp');
		$query->join('LEFT', '#__categories as c ON c.id=jp.catid');
		//$query->select('*');
		$query->select('jp.id as id, jp.ordering, jp.published, price_item, price_1, price_2, price_3, catid, jp.params, c.title as title, c.id as cat_id');
		
		
		return $query;
	}
	function publish()
	{
		$data = JRequest::get('post');
		$value = JRequest::getCmd('task');
		$ids = JRequest::getVar('cid', array(), 'post', 'array');
		$where = array();
		foreach($ids as $id){
			$where[] = ' id='.(int)$id;
		}
		switch($value){
			case 'publish':
				$value = 1;
				break;
			case 'unpublish';
				$value = 0;
				break;
			default:
				$value = 1;
				break;
		}
				
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->clear();
		$query->update('#__jexpricelist');
		$query->set('published = '.(int)$value);
		$query->where($where, ' OR ');
		$db->setQuery((string)$query);
		if (!$db->query()) {
            JError::raiseError(500, $db->getErrorMsg());
        	return false;
        } else {
        	return true;
		}	
		 
	}
	
}