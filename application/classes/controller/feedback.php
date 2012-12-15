<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Feedback extends Controller_Index {
	
	
	public function action_sendmessage()
	{	
	  $feedback = View::factory('v_form_feedback');
      $this->template->block_center = array('feedback'=>$feedback);
	}

	public function action_mailsend(){
   
   $to = 'santech777@yandex.ru';
   $message = '<br>Контактный телефон '.$_POST['phone'].'<br>';
   $message.= 'Контактный email '.trim($_POST['email']).'<br>';
   $message.= trim($_POST['comment']);
   $subject= "Сообщение из сайта";
   $headers = 'MIME-Version: 1.0' . "\r\n";
   $headers.= 'Content-type: text/html; charset=utf8' . "\r\n";
   $headers.= 'From: info@santech77.ru' . "\r\n" . 'Reply-To: info@santech77.ru' . "\r\n" .  'X-Mailer: PHP/' . phpversion();
   if(isset($_POST['submit'])){
      mail($to, $subject, $message, $headers);
	 
	$this->template->block_center =array("ok"=>'Ваша сообщение отправлено');  
	  
   }
   }
} // End 
