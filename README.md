# mailgun-ci
Codeigniter Mailgun Library


## Required

- Codigniter 3
- Mailgun PHP library

## Installation

 - After installing the mailgun PHP library, simply put the Mail.php file in your codeigniter library folder.
 
 ## Usage
 
    $this->load->library('mail');
 
    $data = array(
    'from' => 'Name <email@test.com>',
    'to' => 'Name <email@test.com>',
    'subject' => 'Subject',
    'text' => 'Plain text email',
    'template' => 'location/to/template-view-file',
    'template_variables' => array(),
    'tags' => array()
    );
    
    $this->mail->send(null,$data);
 
 
