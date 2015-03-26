<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function process_si_contact_form()
	{
        $captcha = $_POST['ct_captcha']; 
        $errors = array();

        if (sizeof($errors) == 0) {
            require_once 'scripts/securimage.php';
            $securimage = new Securimage();

            if ($securimage->check($captcha) == false) {
                $errors['captcha_error'] = 'captcha contiene un error';
            }
        }

        if (sizeof($errors) == 0) {
        	echo 'Captcha correcto, debes insertar aqui';
        } else {
            echo 'Captcha incorrecto, no inserta';
        }

	} 
}
