<?php
	/**
	* site part
	*/
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.controller');

class JexPricelistControllerJexPricelist extends JController
{
	function display($cachable = false)
	{
		parent::display($cachable);
	}
	function compute()
	{
		$this->result = 'testkip';
	}
}