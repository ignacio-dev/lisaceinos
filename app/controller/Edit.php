<?php
	
	class Edit extends Controller {
		public function __construct() {
			$this->userModel = $this->model("User");
		}
		public function index() {
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$data = [
					"username" => trim($_POST["username"]),
					"password" => trim($_POST["password"]),

					"username_error" => "",
					"password_error" => ""
				];
				// Validation
				if (empty($data["username"])) {
					$data["username_error"] = "Please enter your username";
				}
				if (empty($data["password"])) {
					$data["password_error"] = "Please enter your password";
				}

				// Check Username In Database
				if (!empty($data["username"])) {
					if ($this->userModel->findByUsername($data["username"])) {
						// User Found
					}
					else {
						$data["username_error"] = "Wrong username";
					}
				}
				// Check Password In Database
				if (empty($data["username_error"]) AND empty($data["password_error"])) {
					$loggedInUser = $this->userModel->login($data["username"], $data["password"]);
					if ($loggedInUser) {
						$this->createUserSession($loggedInUser);
						$this->photo();
						exit();
					}
					else {
						$data["password_error"] = "Wrong password";
					}
				}
			}
			else {
				$data = [
					"username" => "",
					"password" => "",

					"username_error" => "",
					"password_error" => ""
				];
			}

			if ($this->isLoggedIn()) {
				$this->view("edit/photo", $data);
			}
			else {
				$this->view("edit/index", $data);
			}
		}

		public function logout() {
			if ($this->isLoggedIn()) {
				unset($_SESSION["user_id"]);
				unset($_SESSION["user_name"]);
				unset($_SESSION["user_email"]);
				session_destroy();
			}
			$this->index();
		}

		private function isLoggedIn() {
			return (isset($_SESSION["user_id"])) ? true : false;
		}

		private function createUserSession($user) {
			$_SESSION["user_id"]    = $user->id;
			$_SESSION["user_name"]  = $user->username;
			$_SESSION["user_email"] = $user->email;
		}

		public function photo() {
			if ($this->isLoggedIn()) {
				$this->photoModel = $this->model("Photos");
				$photosData = $this->photoModel->getPhotosData();
				$data = [
					"photo1" => $photosData[0],
					"photo2" => $photosData[1],
					"photo3" => $photosData[2],
					"photo4" => $photosData[3],
					"photo5" => $photosData[4],
					"photo6" => $photosData[5],
					"photo7" => $photosData[6],
					"photo8" => $photosData[7]
				];
				$this->view("edit/photo", $data);
			}
			else {
				$this->index();
			}
		}

		public function update_photo() {
			if (sizeof($_FILES) > 0) {
				$this->updatePhotoModel = $this->model("Photos");
				var_dump($this->updatePhotoModel->getPhotosData());
				$status = [];
				if (isset($_FILES["chooseFileBtn1"])) {
					$photo1 = $_FILES["chooseFileBtn1"];
					if (move_uploaded_file($photo1["tmp_name"], "../public/img/photo/photo1.jpg")) {
						$currentVersion = $this->updatePhotoModel->getPhotosData()[0]->version;
						$newVersion = $currentVersion + 1;
						$this->updatePhotoModel->updatePhotoVersion($newVersion, 1);
						$status[0] = "Success";
					}
					else {
						$status[0] = "Fail";
					}
				}
				if (isset($_FILES["chooseFileBtn2"])) {
					$photo2 = $_FILES["chooseFileBtn2"];
					if (move_uploaded_file($photo2["tmp_name"], "../public/img/photo/photo2.jpg")) {
						$currentVersion = $this->updatePhotoModel->getPhotosData()[1]->version;
						$newVersion = $currentVersion + 1;
						$this->updatePhotoModel->updatePhotoVersion($newVersion, 2);
						$status[1] = "Success";
					}
					else {
						$status[1] = "Fail";
					}
				}
				if (isset($_FILES["chooseFileBtn3"])) {
					$photo3 = $_FILES["chooseFileBtn3"];
					if (move_uploaded_file($photo3["tmp_name"], "../public/img/photo/photo3.jpg")) {
						$currentVersion = $this->updatePhotoModel->getPhotosData()[2]->version;
						$newVersion = $currentVersion + 1;
						$this->updatePhotoModel->updatePhotoVersion($newVersion, 3);
						$status[2] = "Success";
					}
					else {
						$status[2] = "Fail";
					}
				}
				if (isset($_FILES["chooseFileBtn4"])) {
					$photo4 = $_FILES["chooseFileBtn4"];
					if (move_uploaded_file($photo4["tmp_name"], "../public/img/photo/photo4.jpg")) {
						$currentVersion = $this->updatePhotoModel->getPhotosData()[3]->version;
						$newVersion = $currentVersion + 1;
						$this->updatePhotoModel->updatePhotoVersion($newVersion, 4);
						$status[3] = "Success";
					}
					else {
						$status[3] = "Fail";
					}
				}
				if (isset($_FILES["chooseFileBtn5"])) {
					$photo5 = $_FILES["chooseFileBtn5"];
					if (move_uploaded_file($photo5["tmp_name"], "../public/img/photo/photo5.jpg")) {
						$currentVersion = $this->updatePhotoModel->getPhotosData()[4]->version;
						$newVersion = $currentVersion + 1;
						$this->updatePhotoModel->updatePhotoVersion($newVersion, 5);
						$status[4] = "Success";
					}
					else {
						$status[4] = "Fail";
					}
				}
				if (isset($_FILES["chooseFileBtn6"])) {
					$photo6 = $_FILES["chooseFileBtn6"];
					if (move_uploaded_file($photo6["tmp_name"], "../public/img/photo/photo6.jpg")) {
						$currentVersion = $this->updatePhotoModel->getPhotosData()[5]->version;
						$newVersion = $currentVersion + 1;
						$this->updatePhotoModel->updatePhotoVersion($newVersion, 6);
						$status[5] = "Success";
					}
					else {
						$status[5] = "Fail";
					}
				}
				if (isset($_FILES["chooseFileBtn7"])) {
					$photo7 = $_FILES["chooseFileBtn7"];
					if (move_uploaded_file($photo7["tmp_name"], "../public/img/photo/photo7.jpg")) {
						$currentVersion = $this->updatePhotoModel->getPhotosData()[6]->version;
						$newVersion = $currentVersion + 1;
						$this->updatePhotoModel->updatePhotoVersion($newVersion, 7);
						$status[6] = "Success";
					}
					else {
						$status[6] = "Fail";
					}
				}
				if (isset($_FILES["chooseFileBtn8"])) {
					$photo8 = $_FILES["chooseFileBtn8"];
					if (move_uploaded_file($photo8["tmp_name"], "../public/img/photo/photo8.jpg")) {
						$currentVersion = $this->updatePhotoModel->getPhotosData()[7]->version;
						$newVersion = $currentVersion + 1;
						$this->updatePhotoModel->updatePhotoVersion($newVersion, 8);
						$status[7] = "Success";
					}
					else {
						$status[7] = "Fail";
					}
				}
				unset($_FILES);
			}
		}

		public function video() {
			if ($this->isLoggedIn()) {
				$this->view("edit/video");
			}
			else {
				$this->index;
			}
		}

		public function about() {
			if ($this->isLoggedIn()) {
				$this->bioModel = $this->model("Bio");
				if (isset($_POST["bio"])) {
					if ($this->bioModel->updateBio($_POST["bio"])) {
						$bio = $this->bioModel->getBio();
						echo nl2br($bio->body);
						exit();
					}
					else {
						echo "Couldn't update bio. Refresh page and try again.";
						exit();
					}
				}
				else {
					$bio = $this->bioModel->getBio();
				}
				$data = ["bio" => $bio];
				$this->view("edit/about", $data);
			}
			else {
				$this->index();
			}
		}
	}