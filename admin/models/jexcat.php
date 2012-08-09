<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('restricted acces');
jimport('joomla.application.component.modeladmin');

class JexPricelistModelJexCat extends JModelAdmin
{
	/**
	*	method to override to check if you can edit an existing field
	*	@param	array	$data	an array of input data
	*	@param	string	$key	the name of the key for the primary ley
	*
	*	@return	boolean
	*	@since 2.5
	*/
	protected function allowEdit($data = array(), $key = 'id')
	{
		//check specific edit permissions, then general permissions
		return JFactory::getUser()->authorise('core.edit', 'com_jexpricelist.message.'.
												((int) isset($data[$key]) ? $data[$key] : 0))
									or parent::allowEdit($data, $key);
	}
	
	/**
	*	Returns a reference to a Table object, always creating it
	*
	*	@param	type	the table type to instantiate
	*	@param	string	a prefix for the table class name. Optional
	*	@param	array	configuration array for the model. Optional
	*	@param	JTable	a database object
	*/
	public function getTable($type = 'JexPriceClass', $prefix = 'JexPricelistTable', $config = array())
	{
		return JTable::getInstance($type,$prefix,$config);
	}
	
	/**
	*	Method to get the record from
	*	@param	array	$data	Data for the form
	*	@param	boolean	$loadData true if the form is to load its own data(default case), false if not
	*	@param	mixed	a JForm object on success, false on failure
	*/
	public function getForm($data = array(), $loadData = true)
	{
		//get the form
		$form = $this->loadForm('com_jexpricelist.jexcat', 'jexcat', array('control'=>'jform', 'load_data'=>$loadData));
		if(empty($form))
		{
			return false;
		}
		return $form;
	}
	protected function loadFormData()
	{
		//check the session for previously entered form data
		$data = JFactory::getApplication()->getUserState('com_jexpricelist.edit.jexcat.data', array());
		if(empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
	public function delete(){
		
		$ids = JRequest::getVar('cid', array(), 'post', 'array');
		
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
	} 
	
}