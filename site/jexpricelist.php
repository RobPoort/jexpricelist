<?php
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.controller');

//Get an instance of the controller prefixed by JexPricelist
$controller = JController::getInstance('JexPricelist');

//perform the request task
$controller->execute(JRequest::getCmd('task'));

//redirect if set by the controller
$controller->redirect();