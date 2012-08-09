<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('restricted access');

jimport('joomla.application.component.controllerform');

class JexPricelistControllerJexCat extends JControllerForm
{
	/**
	*	proxy voor getModel
	*/
	public function getModel($name="jexcat", $prefix="JexPricelistModel")
	{
		$model = parent::getModel($name,$prefix,array('ignore_request'=>true));
		
		return $model;
	}
	
}