<?php
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.view');

class JexPricelistViewJexpricelist extends JView
{
	//overwriting JView display method
	function display($tpl = null)
	{
		//	assign data to the view		
		$this->items = $this->get('Items');
		$this->price_class = $this->get('PriceClass');
		
		// set valuta
		$this->valuta = $this->get('Valuta');

		//configuratie ophalen
		$this->app = JFactory::getApplication();
		$this->input = $this->app->input;
		$this->config = new stdClass();
		$this->config->emailOption = $this->input->get('emailOption');
		$this->config->showTitle = $this->input->get('title');		
		
		$this->config->class_1 = $this->input->get('class_1');
		$this->config->class_2 = $this->input->get('class_2');
		$this->config->class_3 = $this->input->get('class_3');
				
		
		//check for errors
		if(count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		} 
		
		//	display the view
		parent::display($tpl);
	}
}