<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('restricted access');
jimport('joomla.application.component.controllerform');

class JexPricelistControllerJexPriceClass extends JControllerForm
{
	//proxy voor getModel
	public function getModel($name="JexPriceClass", $prefix="JexPricelistModel")
	{
		$model = parent::getModel($name, $prefix, array('ignore_request'=>true));
		
		return $model;
	}	
}