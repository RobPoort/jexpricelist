<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.view');

class JexPricelistViewJexItems extends JView
{
	/**
	*	JexItems view display method
	*	@return void
	*/
	function display($tpl = null){
		
			
		//get the data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');
		
		//check for errors
		if(count($this->get('Errors'))){
			JError::raiseError(500, implode('br />', $errors));
			return false;
		}
		
		//assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;
		
		//set the toolbar
		$this->addToolBar();
		
		//display the template
		parent::display($tpl);
		
		//set the document
		$this->setDocument();
	}
	
	/**
	*	setting the toolbar
	*/
	protected function addToolBar()
	{
		$canDo = JexPricelistHelper::getActions();
		JToolBarHelper::title(JText::_('COM_JEXPRICELIST_MANAGER_JEXITEMS'), 'jexpricelist');
		if($canDo->get('core.create'))
		{
			JToolBarHelper::addNew('jexitem.add', 'JTOOLBAR_NEW');
		}
		if($canDo->get('core.edit'))
		{
			JToolBarHelper::editList('jexitem.edit', 'JTOOLBAR_EDIT');
		}
		if($canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'jexitems.delete', 'JTOOLBAR_DELETE');
		}
		if($canDo->get('core.admin'))
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_jexpricelist');
		}
		
		

	}
	/**
	*	method to set up the document properties
	*	@return	void
	*/
	protected function setDocument()
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEXPRICELIST_ADMINISTRATION'));
	}
}