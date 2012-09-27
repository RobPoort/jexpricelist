<?php
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.controller');

class JexPricelistControllerAdding extends JController
{
	
	function addItems(){
		
		
		//prefix voor de setState key
		$this->option = 'com_jexpricelist';
		
		$this->data = JRequest::get('post');
		
		$this->app = JFactory::getApplication();
		
		if(isset($this->data['select'])){
			$r = array_intersect_key($this->data['item_price'], $this->data['select']);
			$this->totaal = 0;
			foreach($r as $p){
				$this->totaal += $p;
			}		
			JRequest::setVar('totaal', $this->totaal);
			
			//set de State
			$this->app->setUserState("$this->option.totaal", $this->totaal);
		}
		$this->display();		
	}
	function selector()
	{
		//prefix voor de setState key
		$this->option = 'com_jexpricelist';
		
		$this->data = JRequest::get('post');
		$this->selector = $this->data['selector'];
		$this->app = JFactory::getApplication();
		$this->app->setUserState("$this->option.selector", $this->selector);
		
		$this->display();
	}
	function display($cachable = false)
	{	
		
		/* JRequest::setVar('layout', 'default');
		JRequest::setVar('view', 'adding'); */
		
		return parent::display($cachable);
	}
}