<?php
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.modelitem');

class JexPricelistModelAdding extends JModelItem
{
	/**
	*	$var string	item
	*/
	protected $items;
	protected $item;
	
	/**
	*	Method to auto-populate the model-state.
	*	
	*	This method should only be called once per instantiation and is designed
	*	to be called on the first call to the getState() method unless the model
	*	configuration flag to ignore the call is set.
	*
	*	Note: Calling getState in this method will result in recursion
	*
	*	@return	void
	*	since 2.5
	*/
	protected function populateState()
	{
		$app = JFactory::getApplication();
		
		//get the message id
		$id = JRequest::getInt('id');
		$catid = JRequest::getInt('catid');
		$this->setState('message.id', $id); //message moet misschien jexitem worden
		$this->setState('category.id', $id);
		$this->setState('jexklasse.id', $catid);
		
		//load the parameters
		$params = $app->getParams();
		$this->setState('params',$params);
		parent::populateState();
	}
	
	/**
	*	returns a reference to the Table object, always creating it
	*
	*	$param	type	the table type to instantiate
	*	$param	string	a prefix for the table class name. Optional
	*	$param	array	configuration array for model. Optional
	*	$return	JTable	a database object
	*/
	public function getTable($type = 'JexPricelist', $prefix = 'JexPricelistTable', $config = array()){
		return JTable::getInstance($type,$prefix,$config);
	}	
	public function getSelectedItems($ids)
	{
		$where = array();
		$select = 'price_item,price_1,price_2,price_3';
		foreach($ids as $id){
			$where[] = 'id='.$id;
		}
		if(!isset($this->items)){
			$this->_db->setQuery($this->_db->getQuery(true)
				->from('#__jexpricelist')
				->select($select)
				->where($where,'OR'));
				if(!$this->items = $this->_db->loadObjectList())
			{
				$this->setError($this->_db->getError());
			}
			return $this->items;
		}
	}
	public function getItems()
	{
		$data = JRequest::get('post');		
		if(!isset($this->items))
		{
			$catid = $this->getState('category.id');
			if($catid == '' || $catid == null){
				$catid = 0;
			}			
			$this->_db->setQuery($this->_db->getQuery(true)
				->from('#__jexpricelist')
				->select('*')
				->order('ordering')
				->where('published=1')
				->where('catid='. (int)$catid));
			
			if(!$this->items = $this->_db->loadObjectList())
			{
				$this->setError($this->_db->getError());
			}			
		}
		return $this->items;
	}
	public function getPriceClass()
	{
		
		if(!isset($this->price_class))
		{
			$r = $this->getState('jexklasse.id');
			$this->_db->setQuery($this->_db->getQuery(true)
				->from('#__jexpricelist_class')
				->select('text_1,text_2,text_3')
				->where('id='.(int)$r));
			if(!$this->price_class = $this->_db->loadObject())
			{
				$this->setError($this->_db->getError());
			}
		}
		
		return $this->price_class;
	}
}