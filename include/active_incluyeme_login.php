<?php
/**
 * Copyright (c) 2020.
 * Jesus Nuñez <Jesus.nunez2050@gmail.com>
 */


function incluyeme_login_load()
{
	incluyeme_login_files();
	incluyeme_login_sql_Start();
}


function incluyeme_login_files()
{
	$template = plugin_dir_path(__FILE__) . '/templates/resumes/register.php';
	$route = get_template_directory();
	if (!file_exists($route . '/wpjobboard/resumes/register.php')) {
		mkdir($route . '/wpjobboard');
		mkdir($route . '/wpjobboard/resumes');
		copy($template, $route . '/wpjobboard/resumes/register.php');
	} else {
		$templateSize = filesize(plugin_dir_path(__FILE__) . '/templates/resumes/register.php');
		$templateExist = filesize($route . '/wpjobboard/resumes/register.php');
		if ($templateExist !== $templateSize) {
			rmdir($route . '/wpjobboard/resumes/register.php');
			copy($template, $route . '/wpjobboard/resumes/register.php');
		}
	}
}

function incluyeme_login_sql_Start()
{
	global $wpdb;
	$files = plugin_dir_path(__FILE__) . '/resources/';
	$created = $files . 'incluyeme_login.sql';
	$table_name = $wpdb->prefix . 'incluyeme_academies';
	$query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
	if (!$wpdb->get_var($query) == $table_name) {
		$queries = explode("; --", file_get_contents($created));
		foreach ($queries as $query) {
			$query = trim($query);
			if (!empty($query)) {
				$query = str_replace('{$wpdb->prefix}', $wpdb->prefix, $query);
				$query = str_replace('{$wpjb->prefix}', $wpdb->prefix, $query);
				$wpdb->query($query);
			}
		}
	}
}