<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('restricted access');
jimport('joomla.application.component.view');

class JexPricelistViewJexCats extends JView
{
	function display($tpl = null)
	{	
		
		$items = $this->get('Items');;
		$pagination = $this->get('Pagination');
		$act = JRequest::getVar('act');
		
		//op fouten controleren
		if(count($this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		//data naar view
		$this->items = $items;
		$this->pagination = $pagination;
		switch($act)
		{
			case 'class':
				$this->act = 'jexpriceclass';
				break;
			case 'texts':
				$this->act = 'jexpricetexts';
				break;
		}
		
			
		
		//set the toolbar
		$this->addToolBar();
		
		// set the template		
		parent::display($tpl);
		
		//set the document
		$this->setDocument();
	}
	protected function addToolBar()
	{
		$canDo = JexPricelistHelper::getActions(); //optioneel om actions te kunnen doen
		JToolBarHelper::title(JText::_('COM_JEXPRICELIST_MANAGER_JEXCLASSES'), 'jexpricelist');
		if($canDo->get('core.create'))
		{
			JToolBarHelper::addNew('jexcat.add', 'JTOOLBAR_NEW');
		}
		if($canDo->get('core.edit'))
		{
			JToolBarHelper::editList('jexcat.edit', 'JTOOLBAR_EDIT');
		}
		if($canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'jexcats.delete', 'JTOOLBAR_DELETE');
		}
	}
	protected function setDocument()
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEXPRICELIST_ADMINISTRATION'));
	}
}