<?php
	/**
	*	site part
	*/
defined('_JEXEC') or die('restricted access');

jimport('joomla.application.component.controller');

class JexPricelistControllerEmail extends JController
{	
	function emailText($selected,$selector,$totaal)
	{
		$model	= $this->getModel('adding');
		$valuta = $model->getValuta();
		$items = $model->getSelectedItems($selected);
		
		$text = JText::_('COM_JEXPRICELIST_YOUR_SELECTION');
		$text .= '<table width="100%" cellspacing="0" cellpadding="0">';
		$text .= '<tr><td colspan="2">&nbsp;</td></tr>';
		foreach($items as $item){
			$price = array(1=>$item->price_1,2=>$item->price_2,3=>$item->price_3);
			$text .= '<tr><td>'.$item->price_item.'</td><td align="right">'.$valuta->html_char.'&nbsp;'.number_format($price[$selector],2,$valuta->decimal_char,$valuta->m_char).'<td></tr>';
		}
		$text .= '<tr><td colspan="2">&nbsp;</td></tr>';
		$text .= '<tr><td align="right">'.JText::_('COM_JEXPRICELIST_TOTAL').'</td><td align="right">'.$valuta->valuta_char.'&nbsp;'.number_format($totaal,2,$valuta->decimal_char,$valuta->m_char).'</td></tr>';
		$text .= '</table>';
		
		return $text;
		
	}
	function sendMail($email,$body){
		//config data halen
		$app = JFactory::getApplication();
		$mailfrom	= $app->getCfg('mailfrom');
		$sitename	= $app->getCfg('sitename');
	
		//mail functions
		$mailer = JFactory::getMailer();
		$mailer->setSender(array($mailfrom,$sitename)); //uit config sitenaam en email halen
		$mailer->addRecipient($email);
		$mailer->setSubject(JText::_('COM_JEXPRICELIST_YOUR_CALCULATION'));
		$mailer->isHTML(true);
		$mailer->setBody($body);
		$mailer->Send();
	}
	function process(){
		$this->app = JFactory::getApplication();
		$this->option = 'com_jexpricelist';
		$this->data = JRequest::get('post');
		
		$this->state = $this->app->getUserStateFromRequest("$this->option",'');
		$this->app->setUserState("$this->option.email", $this->data['email_customer']);
		
		$email = $this->data['email_customer'];
		$body = $this->emailText($this->state->selected,$this->state->selector, $this->state->totaal);
		
		$db = JFactory::getDBO();
		$query = 
			" INSERT INTO `#__jexpricelist_emails`(`email`,`email_text`)
			VALUES('".$db->escape($email).
			"', '". $db->escape($body).
			"')";
		$db->setQuery($query);
		
		
		//afronden: mail sturen, opslaan, redirect naar begin
		$db->query();
		$this->sendMail($email,$body);
		$this->display();			
		$this->app->redirect($state->last_uri);
	}
}