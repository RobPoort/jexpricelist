<?php
	/**
	* site	part
	*/
defined('_JEXEC') or die('restricted access');

jimport('joomla.application.component.view');

class JexPricelistViewEmail extends JView
{
	function display($tpl = null)
	{
		$this->app = JFactory::getApplication();
		$this->option = 'com_jexpricelist';
		
		$this->state = $this->app->getUserStateFromRequest("$this->option", '');
		
		parent::display($tpl);
	}
}