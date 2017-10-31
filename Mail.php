<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Mailgun\Mailgun;

class Mail
{

	public $mgClient = '';
	public $domain = '';

	public function __construct()
	{
		$this->CI = & get_instance();
		$this->mgClient = new Mailgun('your-api-key');
		$this->domain = "your.domain-name.com";
	}

	/*
	*
	* example
	*
	* $data = array(
	* 	'from' => 'Name <email@test.com>',
	* 	'to' => 'Name <email@test.com>',
	* 	'subject' => 'Subject',
	* 	'text' => 'Plain text email',
	* 	'template' => 'location/to/template-view-file',
	* 	'template_variables' => array(),
	* 	'tags' => array()
	* );
	*
	*	$this->mail->send(null,$data);
	*
	**/

	public function send($data)
	{
		
		if($data['from']){
			$mailData['from']    = $data['from'];	
		}else{
			$mailData['from']    = $this->config->item('email_from');
		}
		$mailData['to']      = $data['to'];
		$mailData['subject'] = $data['subject'];
		$mailData['text']    = $data['text'];
		if($data['template'] != null){
			$mailData['html']    = $this->CI->load->view('emails/'.$data['template'], $data['template_variables']);
		}
		$mailData['o:tag']   = $data['tags'];
		
		# Make the call to the client.
		$result = $this->mgClient->sendMessage($this->domain, $mailData);
	}
}
