<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('Restricted Access');

//import the controller library
jimport('joomla.application.component.controller');

class JexPriceListController extends JController
{
	/**
	*	display task
	*	@return void
	*/
	function display($cachable = false)
	{
		//set default view if not set by the task
		JRequest::setVar('view',JRequest::getCmd('view','JexItems'));
		
		//call parent behavior
		parent::display($cachable);
		
		//set the submenu
		JexPricelistHelper::addSubmenu('jexitems');
	}
}