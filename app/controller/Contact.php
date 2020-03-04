<?php
	
	class Contact extends Controller {
		private $mailTo    = MAILTO;
		private $secretKey = SECRET_KEY;
		static  $publicKey = PUBLIC_KEY;

		public function index() {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
					'name'    => trim($_POST['name']),
					'email'   => trim($_POST['email']),
					'phone'   => trim($_POST['phone']),
					'message' => trim($_POST['message']),

					'captcha_error' => '',
					'captcha_class' => '',
					'success'       => 'Message sent'
				];
				if (!$this->validateCaptcha) {
					$data['captcha_error'] = 'ERROR: You must tick this box';
					$data['captcha_class'] = 'error';
				}
				else {
					$this->sendEmail($data);
					$this->sent($data);
				}
			}
			else {
				$data = [
					'name'    => '',
					'email'   => '',
					'phone'   => '',
					'message' => '',

					'captcha_error' => '',
					'captcha_class' => '',
					'success' => 'Message sent'
				];
			}
			$this->view('contact/index', $data);
		}

		public function sent($data) {
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->sendEmail($data);
				$this->view('contact/sent', $data);
			}
			else {
				$this->index();
			}
		}

		private function validateCaptcha() {
			$responseKey = $_POST['g-recaptcha-response'];
			$curl = curl_init();
			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL            => 'https://www.google.com/recaptcha/api/siteverify',
			    CURLOPT_POST           => 1,
			    CURLOPT_POSTFIELDS     => array(
			        'secret'   => $this->secretKey,
			        'response' => $responseKey
			    )
			));
			$response = curl_exec($curl);
			curl_close($curl);

			return (strpos($response, '"success": true') !== FALSE) ? true : false;
		}

		private function sendEmail($data) {
			$subject = 'New message from LisaCeinos.com.';
			$headers = "From: {$data["email"]}";
			$content = "New message:\n\n"        .
			           "Name: {$data["name"]}"   .
			           "Phone: {$data["phone"]}" .
			           "Message: \n\n"           .
			           "{$data["message"]}"
			;
			mail(
				$this->$mailTo,
				$subject,
				$content,
				$headers
			);
		}
	}