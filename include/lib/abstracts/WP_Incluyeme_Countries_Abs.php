<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/wp-load.php';

abstract class WP_Incluyeme_Countries_Abs
{
	protected static $country;
	protected static $universitiesTable;
	protected static $countriesTable;
	protected static $studies;
	protected static $experiencesAreas;
	protected static $idioms;
	protected static $levelsIdioms;
	protected static $prefersJobs;
	protected static $userName;
	protected static $userLastName;
	protected static $userSlug;
	protected static $userID;
	protected static $wp;
	
	public function __construct()
	{
		global $wpdb;
		self::$wp = $wpdb;
		self::$countriesTable = $wpdb->prefix . 'incluyeme_countries';
		self::$universitiesTable = $wpdb->prefix . 'incluyeme_academies';
		self::$studies = $wpdb->prefix . 'incluyeme_areas';
		self::$experiencesAreas = $wpdb->prefix . 'incluyeme_level_experience';
		self::$levelsIdioms = $wpdb->prefix . 'incluyeme_idioms_level';
		self::$idioms = $wpdb->prefix . 'incluyeme_idioms';
		self::$prefersJobs = $wpdb->prefix . 'incluyeme_prefersJobs';
		self::$country = false;
	}
	
	/**
	 * @return mixed
	 */
	public static function getCountry()
	{
		return '"' . self::$country . '"';
	}
	
	/**
	 * @param mixed $country
	 */
	public static function setCountry($country)
	{
		self::$country = $country;
	}
	
	public static function allCountries()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * from " . self::$countriesTable);
	}
	
	public static function getUniversities()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * from " . self::$universitiesTable . ' where country = ' . self::getCountry());
	}
	
	public static function allStudies()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * from " . self::$studies . " WHERE active = 1");
	}
	
	public static function allExpedienciesAreas()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * from " . self::$experiencesAreas . " WHERE active = 1");
	}
	
	public static function allIdioms()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * from " . self::$idioms . " WHERE active = 1");
	}
	
	public static function allLevels()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * from " . self::$levelsIdioms . " WHERE active = 1");
	}
	
	public static function allPrefersJobs()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * from " . self::$prefersJobs . " WHERE active = 1");
	}
	
	public static function searchUserExist($email, $password)
	{
		$user = email_exists($email);
		if ($user) {
			return true;
		}
		return false;
	}
	
	private static function userRegisterWPBJ()
	{
		global $wpdb;
		$post_id = wp_insert_post([
			"post_title" => trim(self::$userName . " " . self::$userLastName),
			"post_name" => self::$userSlug,
			"post_type" => "resume",
			"post_status" => 'publish',
			"comment_status" => "closed"
		]);
		$wpdb->insert($wpdb->prefix . 'wpjb_resume', [
			'post_id' => $post_id,
			'user_id' => self::$userID,
			'candidate_slug' => self::$userSlug
		]);
		return $wpdb->insert_id;
	}
	
	public static function registerUser($email, $password, $first_name, $last_name)
	{
		self::$userName = $first_name;
		self::$userLastName = $last_name;
		self::$userID = wp_insert_user([
			"user_login" => $email,
			"user_email" => $email,
			"user_pass" => $password,
			"role" => "subscriber"
		]);
		update_user_meta(self::$userID, 'first_name', $first_name);
		update_user_meta(self::$userID, 'last_name', $last_name);
		self::$userSlug = Wpjb_Utility_Slug::generate(Wpjb_Utility_Slug::MODEL_RESUME, $first_name . ' ' . $last_name);
		$temp = wpjb_upload_dir("resume", "", null, "basedir");
		$finl = dirname($temp) . "/" . self::$userID;
		wpjb_rename_dir($temp, $finl);
		
		return self::userRegisterWPBJ();
	}
	
	public static function updateUsersEducation($dateStudieB,
	                                            $dateStudiesD,
	                                            $dateStudiesH,
	                                            $eduLevel,
	                                            $studies,
	                                            $titleEdu,
	                                            $university_edu,
	                                            $university_otro, $country_edu, $userID)
	{
		for ($i = 0; $i < count($titleEdu); $i++) {
			self::$wp->insert(self::$wp->prefix . 'wpjb_resume_detail', [
				'resume_id' => $userID,
				'type' => 2,
				'started_at' => $dateStudiesD[$i] ?? $dateStudiesD[$i] ?? date("Y-m-d H:i:s"),
				'completed_at' => $dateStudiesH[$i] ?? $dateStudiesH[$i] ?? '',
				'is_current' => $dateStudieB[$i] ?? $dateStudieB[$i] ?? '',
				'grantor' => $university_edu[$i] ?? $university_edu[$i] ?? ($university_otro[$i] ?? $university_otro[$i] ?? ''),
				'detail_title' => $titleEdu[$i] ?? $titleEdu[$i] ?? '',
				'detail_description' => 'Nivel: ' . ($eduLevel[$i] ?? $eduLevel[$i] ?? ' No Posee. ') . ' Area de Estudio: ' . ($studies[$i] ?? $studies[$i] ?? 'No Posee. ') . ' Pais de estudio: ' . ($country_edu[$i] ?? $country_edu[$i] ?? ' No Posee. ')
			]);
		}
		return $userID;
	}
	
	public static function updateUsersWorks($actuWork,
	                                        $areaEmployed,
	                                        $dateStudiesDLaboral,
	                                        $dateStudiesHLabor,
	                                        $employed,
	                                        $jobs,
	                                        $jobsDescript,
	                                        $levelExperience,
	                                        $userID)
	{
		for ($i = 0; $i < count($jobs); $i++) {
			self::$wp->insert(self::$wp->prefix . 'wpjb_resume_detail', [
				'resume_id' => $userID,
				'type' => 1,
				'started_at' => $dateStudiesDLaboral[$i] ?? $dateStudiesDLaboral[$i] ?? date("Y-m-d H:i:s"),
				'completed_at' => $dateStudiesHLabor[$i] ?? $dateStudiesHLabor[$i] ?? '',
				'is_current' => $actuWork[$i] ?? $actuWork[$i] ?? '',
				'grantor' => $employed[$i] ?? $employed[$i] ?? ($employed[$i] ?? $employed[$i] ?? ''),
				'detail_title' => $jobs[$i] ?? $jobs[$i] ?? '',
				'detail_description' => 'Nivel de Experiencia: ' . ($levelExperience[$i] ?? $levelExperience[$i] ?? ' No Posee. ') . ' Area de Empleo: ' . ($areaEmployed[$i] ?? $areaEmployed[$i] ?? 'No Posee. ') . ' Descripcion: ' . ($jobsDescript[$i] ?? $jobsDescript[$i] ?? 'No Posee. ')
			]);
		}
		
		return $userID;
	}
}