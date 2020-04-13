<?php
/**
 * Copyright (c) 2020.
 * Jesus Nuñez <Jesus.nunez2050@gmail.com>
 */
include_once plugin_dir_path(__FILE__) . 'lib/WP_Incluyeme.php';
function incluyeme_login_load()
{
	incluyeme_login_files();
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