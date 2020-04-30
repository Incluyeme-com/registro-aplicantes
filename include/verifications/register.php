<?php
include_once dirname(__DIR__, 1) . '/lib/WP_Incluyeme_Login_Countries.php';
header('Content-type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_POST = json_decode(file_get_contents("php://input"), true);
	if (isset($_POST['email']) && isset($_POST['password']) && !isset($_POST['name']) && !isset($_POST['lastName'])) {
		$verifications = new WP_Incluyeme_Login_Countries();
		$email = sanitize_email($_POST['email']);
		$password = sanitize_email($_POST['password']);
		echo $verifications->json_response(200, $verifications::searchUserExist($email, $password));
		return;
	}
	if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['lastName'])) {
		$verifications = new WP_Incluyeme_Login_Countries();
		$email = sanitize_email($_POST['email']);
		$password = sanitize_email($_POST['password']);
		$name = sanitize_text_field($_POST['name']);
		$lastName = sanitize_text_field($_POST['lastName']);
		echo $verifications->json_response(200, $verifications::registerUser($email, $password, $name, $lastName));
		return;
	}
	if (isset($_POST['userID']) && isset($_POST['country_edu'])) {
		$verifications = new WP_Incluyeme_Login_Countries();
		
		echo $verifications->json_response(200, $verifications::updateUsersEducation($_POST['dateStudieB'],
			$_POST['dateStudiesD'],
			$_POST['dateStudiesH'],
			$_POST['eduLevel'],
			$_POST['studies'],
			$_POST['titleEdu'],
			$_POST['university_edu'],
			$_POST['university_otro'], $_POST['country_edu'], $_POST['userID']));
		return;
	}
	if (isset($_POST['userID']) && isset($_POST['areaEmployed'])) {
		$verifications = new WP_Incluyeme_Login_Countries();
		echo $verifications->json_response(200, $verifications::updateUsersWorks($_POST['actuWork'],
			$_POST['areaEmployed'],
			$_POST['dateStudiesDLaboral'],
			$_POST['dateStudiesHLabor'],
			$_POST['employed'],
			$_POST['jobs'],
			$_POST['jobsDescript'],
			$_POST['levelExperience'],
			$_POST['userID']));
		return;
	}
	if (isset($_POST['userID']) && isset($_POST['genre'])) {
		$verifications = new WP_Incluyeme_Login_Countries();
		echo $verifications->json_response(200, $verifications::updateUsersInformation($_POST['city'],
			$_POST['dateBirthDay'],
			$_POST['fPhone'],
			$_POST['fiPhone,'],
			$_POST['genre'],
			$_POST['mPhone'],
			$_POST['state'],
			$_POST['street'],
			$_POST['phone'],
			$_POST['userID']));
		return;
	}
}
return;