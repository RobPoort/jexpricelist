<?php
	/**
	*	admin part Helper file
	*/
defined('_JEXEC') or die('Restricted Access');

	/**
	*	jexpricelist component Helper
	*/
abstract class JexPricelistHelper
{
	/**
	*	Configure the linkbar
	*/
	public static function addSubmenu($submenu)
	{
		JSubMenuHelper::addEntry(JText::_('COM_JEXPRICELIST_SUBMENU_JEXITEMS'), 'index.php?option=com_jexpricelist', $submenu == 'items');
		JSubMenuHelper::addEntry(JText::_('COM_JEXPRICELIST_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_jexpricelist', $submenu == 'categories');
		JSubMenuHelper::addEntry(JText::_('COM_JEXPRICELIST_SUBMENU_JEXPRICECLASSES'), 'index.php?option=com_jexpricelist&view=jexcats', $submenu == 'jexcats');
		
		
		//set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-jexpricelist'.'{background-image:url(../media/com_jexpricelist/images/jexPricelist-48x48.png);}');
		if($submenu == 'categories')
		{
			$document->setTitle(JText::_('COM_JEXPRICELIST_ADMINISTRATION_CATEGORIES'));
		}
	}
	
	/**
	*	get the actions
	*/
	public static function getActions($messageId = 0)
	{
		jimport('joomla.access.access');
		$user = JFactory::getUser();
		$result = new JObject;
		
		if(empty($messageId))
		{
			$assetName = 'com_jexpricelist';
		} else
		{
			$assetName = 'com_jexpricelist.message.'.(int)$messageId;
		}
		
		$actions = JAccess::getActions('com_jexpricelist', 'component');
		foreach($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}
		return $result;
	}
}