<?php
defined('_JEXEC') or die('Restricted Access');

	/**
	*	script file of the jexpricelist component
	*/
class com_jexpricelistInstallerScript
{
	/**
	*	method to install the component
	*
	*	@return void
	*/
	function install($parent)
	{
		// $parent is the class calling this method
		$parent->getParent()->setRedirectUrl('index.php?option=com_jexpricelist');
	}
	
	/**
	*	method to uninstall the component
	*	@return void
	*/
	function uninstall($parent)
	{
		echo '<p>'.JText::_('COM_JEXPRICELIST_UNINSTALL_TEXT').'</p>';
	}
	
	/**
	*	method to update the component
	*
	*	@return	void
	*/
	function update($parent)
	{
		echo '<p>'.JText::sprintf('COM_JEXPRICELIST_UPDATE_TEXT', $parent->get('manifest')->version).'</p>';
	}
	
	/**
	*	method to run before an install/uninstall/update method
	*	@retunr	void
	*/
	function preflight($type, $parent)
	{
		//$parent is the class calling the method
		//$type is the type of change (install, uninstall, update)
		echo '<p>'.JText::_('COM_JEXPRICELIST_PREFLIGHT_'.$type.'_TEXT').'</p>';
	}
	
	/**
	*	method to run after an install/uninstall/update method
	*	@return	void
	*/
	function postflight($type, $parent)
	{
		echo '<p>'.JText::_('COM_JEXPRICELIST_POSTFLIGHT_'.$type.'_TEXT').'</p>';
	}
}