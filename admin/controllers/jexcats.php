<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.controlleradmin');

class JexPricelistControllerJexCats extends JControllerAdmin
{
	/**
	*	Proxy for getModel
	*	since 2.5
	*/
	public function getModel($name='JexCat', $prefix='JexPricelistModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
			
		return $model;
	}
	/* public function delete(){
		//$cid = JRequest::getVar('cid');
		$ids = JRequest::getVar('cid', array(), 'post', 'array');
		//$id = implode(' OR id=', $cid);
		$where = array();
		foreach($ids as $id){
			$where[] = 'id='.$id;
		}
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);		
		$query->delete('#__jexpricelist_class');
		$query->where($where, ' OR ');
		
		$db->setQuery((string)$query);
		$db->query();
		if (!$db->query()) {
            JError::raiseError(500, $db->getErrorMsg());
        	return false;
        } else {
        	return true;
		}
		$this->display();		
	} */
	function display($cachable = false)
	{	
		
		/* JRequest::setVar('layout', 'default');
		JRequest::setVar('view', 'adding'); */
		
		return parent::display($cachable);
	}
	
}