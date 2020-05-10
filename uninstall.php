<?php

/**
 * Copyright (c) 2020.
 * Jesus Nuñez <Jesus.nunez2050@gmail.com>
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
	die;
}

global $wpdb;
$template = plugin_dir_path(__FILE__) . '/templates/resumes/register.php';
$route = get_template_directory();
$route = $route . '/wpjobboard';
deleteDirectory($route);
$template = plugin_dir_path(__FILE__) . '/templates/resumes/resume.php';
$route = get_template_directory();
$route = $route . '/wpjobboard';
deleteDirectory($route);
$template = plugin_dir_path(__FILE__) . '/templates/resumes/my-resume.php';
$route = get_template_directory();
$route = $route . '/wpjobboard';
deleteDirectory($route);
function deleteDirectory($dir)
{
	if (!file_exists($dir)) {
		return true;
	}
	
	if (!is_dir($dir)) {
		return unlink($dir);
	}
	
	foreach (scandir($dir) as $item) {
		if ($item == '.' || $item == '..') {
			continue;
		}
		
		if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
			return false;
		}
		
	}
	
	return rmdir($dir);
}

$deleteAll = new deleteIncluyemeLogin();
$deleteAll::deleteAll();

class deleteIncluyemeLogin
{
	
	protected static $universitiesTable;
	protected static $countriesTable;
	protected static $studies;
	protected static $experiencesAreas;
	protected static $idioms;
	protected static $levelsIdioms;
	protected static $prefersJobs;
	protected static $wp;
	protected static $usersDiscapTable;
	protected static $usersDisQuestions;
	protected static $usersIdioms;
	protected static $incluyemeUsersInformation;
	
	public function __construct()
	{
		global $wpdb;
		self::$wp = $wpdb;
		self::$dataPrefix = $wpdb->prefix;
		self::$countriesTable = $wpdb->prefix . 'incluyeme_countries';
		self::$universitiesTable = $wpdb->prefix . 'incluyeme_academies';
		self::$studies = $wpdb->prefix . 'incluyeme_areas';
		self::$experiencesAreas = $wpdb->prefix . 'incluyeme_level_experience';
		self::$levelsIdioms = $wpdb->prefix . 'incluyeme_idioms_level';
		self::$idioms = $wpdb->prefix . 'incluyeme_idioms';
		self::$prefersJobs = $wpdb->prefix . 'incluyeme_prefersJobs';
		self::$usersDiscapTable = $wpdb->prefix . 'incluyeme_users_dicapselect';
		self::$usersDisQuestions = $wpdb->prefix . 'incluyeme_users_questions';
		self::$usersIdioms = $wpdb->prefix . 'incluyeme_users_idioms';
		self::$incluyemeUsersInformation = $wpdb->prefix . 'incluyeme_users_information';
	}
	
	public static function deleteAll()
	{
		self::$wp->get_results('drop table if exists ' . self::$countriesTable . ' ;'
			. 'drop table if exists ' . self::$universitiesTable . ' ;'
			. 'drop table if exists ' . self::$studies . ' ;'
			. 'drop table if exists ' . self::$experiencesAreas . ' ;'
			. 'drop table if exists ' . self::$levelsIdioms . ' ;'
			. 'drop table if exists ' . self::$idioms . ' ;'
			. 'drop table if exists ' . self::$prefersJobs . ' ;'
			. 'drop table if exists ' . self::$usersDiscapTable . ' ;'
			. 'drop table if exists ' . self::$usersDisQuestions . ' ;'
			. 'drop table if exists ' . self::$usersIdioms . ' ;'
			. 'drop table if exists ' . self::$incluyemeUsersInformation . ' ;');
	}
}