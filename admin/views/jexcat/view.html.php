<?php
	/**
	*	admin part
	*/
defined('_JEXEC') or die('restricted access');
jimport('joomla.application.component.view');

class JexPricelistViewJexCat extends JView
{
	function display($tpl = null)
	{
		//get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		$script = $this->get('Script');
		
		//check for errors
		if(count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />',$errors));
			return false;
		}
		
		//assign the data
		$this->item = $item;
		$this->form = $form;
		$this->script = $script;
		
		//set the toolbar
		$this->addToolBar();
		
		//display the template
		parent::display($tpl);
		
		//set the document
		$this->setDocument();
	}
	
	//setting the toolbar
	protected function addToolBar()
	{
		JRequest::setVar('hidemainmenu', true);
		$user = JFactory::getUser();
		$userId = $user->id;
		$isNew = $this->item->id == 0;
		$canDo = JexPricelistHelper::getActions($this->item->id);
		JToolBarHelper::title($isNew ? JText::_('COM_JEXPRICELIST_MANAGER_JEXCAT_NEW')
									: JText::_('COM_JEXPRICELIST_MANAGER_JEXCAT_EDIT'), 'jexpricelist');
		//built the actions for new and existings records
		if($isNew)
		{
			//for new records, check the create permission
			if($canDo->get('core.create'))
			{
				JToolBarHelper::apply('jexcat.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('jexcat.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('jexcat.save2new', 'save-new.png', 'save-new_f2.png',
										'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('jexcat.cancel', 'JTOOLBAR_CANCEL');
		} else
		{
			if($canDo->get('core.edit'))
			{
				//we can save the new record
				JToolBarHelper::apply('jexcat.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('jexcat.save', 'JTOOLBAR_SAVE');
				
				//we can save this record, but check the create permission to see
				//if we can return to make a new one
				if($canDo->get('core.create'))
				{
					JToolBarHelper::custom('jexcat.save2new', 'save-new.png', 'save-new_f2.png',
											'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if($canDo->get('core.create'))
			{
				JToolBarHelper::custom('jexcat.save2copy', 'save-copy.png', 'save-copy_f2.png',
										'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('jexcat.cancel', 'JTOOLBAR_CLOSE');
		}
	}
	
	protected function setDocument()
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_JEXPRICELIST_JEXITEM_CREATING') : JTEXT::_('COM_JEXPRICELIST_JEXITEM_EDITING'));
		
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_jexpricelist/views/jexitem/submitbutton.js");
		JText::script('COM_JEXPRICELIST_JEXPRICELIST_ERROR_UNACCEPTABLE');
	}
}