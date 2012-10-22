<?php
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.view');

class JexPricelistViewAdding extends JView
{
	function display($tpl = null)
	{
		
		$id = JRequest::getInt('id');
		
		
		//prefix voor de setState key
		$this->option = 'com_jexpricelist';
		
		$this->selected = array();
		
		$this->app = JFactory::getApplication();
		$this->state = $this->app->getUserStateFromRequest("$this->option", 'selected_in_request');
		
		//config ophalen
		$this->input = $this->app->input;
		$this->config = new stdClass();
		$this->config->emailOption = $this->input->get('emailOption');
		$this->config->showTitle = $this->input->get('title');	
		$this->config->showSelector = $this->input->get('showSelector');
		$this->config->useSelector = $this->input->get('useSelector');
		$this->config->showCss = $this->input->get('showCss');
		$this->config->css_file = $this->input->get('useCss');
		
		
		
		$this->data = JRequest::get('post');
		if(!isset($this->state->selector)){
			$this->selector = 1;
		} elseif(isset($this->state->selector)){
			$selector = $this->state->selector;
		}		
		if($this->config->showSelector == 0){
			$this->selector = $this->config->useSelector;
			$selector = $this->selector;
		}
		$this->selector = $selector;
		
		$this->items = $this->get('Items');
		$this->price_class = $this->get('PriceClass');
		
		$this->ids = array();
		foreach($this->items as $item){
			$this->ids[] = $item->id;
		}
		if(isset($this->data['select'])){
			$this->selected = $this->data['select'];
		}
		// set valuta
		$this->valuta = $this->get('Valuta');		
		
		//set user data
		$this->app->setUserState("$this->option.selected", $this->selected);
		$this->app->setUserState("$this->option.selector", $this->selector);
		
		$this->uri =& JURI::getInstance();
		$this->app->setUserState("$this->option.last_uri",$this->uri->toString());
		
		parent::display($tpl);
	}
}