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
	
	public function __construct()
	{
		global $wpdb;
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
}