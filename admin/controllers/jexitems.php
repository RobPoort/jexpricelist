<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.controlleradmin');

class JexPricelistControllerJexItems extends JControllerAdmin
{
	/**
	*	Proxy for getModel
	*	since 2.5
	*/
	public function getModel($name='JexItem', $prefix='JexPricelistModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
			
		return $model;
	}
}