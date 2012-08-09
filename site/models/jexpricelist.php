<?php
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.modelitem');

class JexPricelistModelJexPricelist extends JModelItem
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
	
	public function getItem()
	{
		if(!isset($this->item)){
			// ook hier kijken naar message.id
			$id = $this->getState('message.id');
			$this->_db->setQuery($this->_db->getQuery(true)
					->from('#__jexpricelist as p')
					->leftJoin('#__categories as c ON p.catid=c.id')
					->select('p.price_item, p.params, c.title as category')
					->where('p.id=' . (int)$id));
			if(!$this->item = $this->_db->loadObject())
			{
				$this->setError($this->_db->getError());
			} else
			{
				//load the JSON string
				$params = new JRegistry;
				//loadJSON is @deprecated	12.1	Use loadString passing JSON as the format instead.
				$params->loadString($this->item->params, 'JSON');
				//$params->loadJSON($this->item->params);
				$this->item->params = $params;
				
				//merge global params with item params
				$params = clone $this->getState('params');
				$params->merge($this->item->params);
				$this->item->params = $params;
			}
			
			
		}
		
		return $this->item;
	}
	public function getItems()
	{
		if(!isset($this->items))
		{
			$id = $this->getState('category.id');
			if($id == '' || $id == null){
				$id = 0;
			}
			$this->_db->setQuery($this->_db->getQuery(true)
				->from('#__jexpricelist')
				->select('*')
				->order('ordering')
				->where('published=1')
				->where('catid='. (int)$id));
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