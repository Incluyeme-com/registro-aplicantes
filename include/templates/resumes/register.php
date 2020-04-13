<?php
$js = plugins_url() . '/incluyeme-login-extension/include/assets/js/';
$img = plugins_url() . '/incluyeme-login-extension/include/assets/img/incluyeme-place.svg';
$css = plugins_url() . '/incluyeme-login-extension/include/assets/css/';
wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], '1.0.0');
wp_register_script('bootstrapJs', $js . 'bootstrap.min.js', ['jquery', 'popper'], '1.0.0');
wp_register_script('vueJS', $js . 'vueDEV.js', ['bootstrapJs'], '1.0.0');
wp_register_script('vueD', $js . 'vueD.js', ['vueJS'], '2.0.0');
wp_register_script('bootstrap-notify', $js . 'iziToast.js', ['bootstrapJs'], '2.0.0');
wp_register_style('bootstrap-css', $css . 'bootstrap.min.css', [], '1.0.0', false);
wp_register_style('bootstrap-notify-css', $css . 'iziToast.min.css', [], '1.0.0', false);
wp_enqueue_script('popper');
wp_enqueue_script('bootstrapJs');
wp_enqueue_script('vueJS');
wp_enqueue_script('bootstrap-notify');
wp_enqueue_script('vueD');
wp_enqueue_style('bootstrap-css');
wp_enqueue_style('bootstrap-notify-css');
$baseurl = wp_upload_dir();
$baseurl = $baseurl['baseurl'];
?>

<div id="incluyeme-login-wpjb">
	<template id="step1" v-if="currentStep == 1">
		<h1>Step 1</h1>
		
		<div>
			<input type="text" name="name" v-model="step1.name" placeholder="name">
		</div>
		<div>
			<input type="text" name="email" v-model="step1.email" placeholder="email">
		</div>
		
		<button type="button" @click.prevent="goToStep(2)">Continue</button>
	</template>
	<template id="step2" v-if="currentStep == 2">
		<h1>Step 2</h1>
		
		<div>
			<input type="text" name="city" v-model="step2.city" placeholder="city">
		</div>
		<div>
			<input type="text" name="state" v-model="step2.state" placeholder="state">
		</div>
		
		<button type="button" @click.prevent="goToStep(3)">Finish</button>
	</template>
	<template id="step3" v-if="currentStep == 3">
		<strong>Name:</strong> {{ step1.name }}<br />
		<strong>Email:</strong> {{ step1.email }}<br />
		<strong>City:</strong> {{ step2.city }}<br />
		<strong>State:</strong> {{ step2.state }}
	</template>
</div>
