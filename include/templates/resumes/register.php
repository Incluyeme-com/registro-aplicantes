<?php
$js = plugins_url() . '/incluyeme-login-extension/include/assets/js/';
$img = plugins_url() . '/incluyeme-login-extension/include/assets/img/incluyeme-place.svg';
$css = plugins_url() . '/incluyeme-login-extension/include/assets/css/';
wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], '1.0.0');
wp_register_script('bootstrapJs', $js . 'bootstrap.min.js', ['jquery', 'popper'], '1.0.0');
wp_register_script('vueJS', $js . 'vueDEV.js', ['bootstrapJs', 'FAwesome'], '1.0.0');
wp_register_script('vueD', $js . 'vueF.js', ['vueJS'], '2.0.0');
wp_register_script('bootstrap-notify', $js . 'iziToast.js', ['bootstrapJs'], '2.0.0');
//wp_register_script('materializeJS', $js . 'materialize.min.js');

wp_register_style('bootstrap-css', $css . 'bootstrap.min.css', [], '1.0.0', false);
wp_register_style('bootstrap-notify-css', $css . 'iziToast.min.css', [], '1.0.0', false);
wp_register_script('FAwesome', 'https://kit.fontawesome.com/65c018cf75.js', [], '1.0.0', false);
wp_enqueue_script('popper');
wp_enqueue_script('bootstrapJs');
wp_enqueue_script('vueJS');
wp_enqueue_script('bootstrap-notify');
wp_enqueue_script('vueD');
//wp_enqueue_script('materializeJS');

wp_enqueue_style('bootstrap-css');
wp_enqueue_style('bootstrap-notify-css');
wp_enqueue_script('fAwesome');
$baseurl = wp_upload_dir();
$baseurl = $baseurl['baseurl'];
?>
<style>
	.myButton {
		box-shadow: 2px 2px 4px 0px #bfbfbf;
		background-color: #ffffff;
		border-radius: 4px;
		border: 1px solid #ffffff;
		display: inline-block;
		cursor: pointer;
		color: #bababa;
		padding: 16px 31px;
		height: 2.5rem;
	}
	
	.myButton:hover,
	.myButton:focus,
	.myButton:active,
	.myButton.active {
		background-color: #bababa !important;
	}
	
	.myButton2:hover,
	.myButton2:focus,
	.myButton2:active,
	.myButton2.active {
		background-color: #000BFF !important;
	}
	
	.btn-info:hover,
	.btn-info:focus,
	.btn-info:active,
	.btn-info.active {
		background-color: #0079b8 !important;
	}

</style>
<div id="incluyeme-login-wpjb">
	<x-incluyeme class="container">
		<template id="step1" v-if="currentStep == 1">
			<x-incluyeme class="container text-center">
				<h1>Registrate</h1>
				<p>Accede a oportunindades laborales para personas con disCAPACIDAD</p>
			</x-incluyeme>
			<x-incluyeme class="row text-center justify-content-center">
				<x-incluyeme class="col-lg-6 col-sm-12">
					<button type="button" class="btn myButton w-100">
						<i class="fa fa-google mr-2"></i>
						<span class="text-gray">Sign with Google</span>
					</button>
				</x-incluyeme>
			</x-incluyeme>
			<x-incluyeme class="row text-center justify-content-center">
				<x-incluyeme class="col-lg-6 col-sm-12 mt-2">
					<button type="button" class="btn btn-primary w-100 myButton2" style="box-shadow: 2px 2px 4px 0px #bfbfbf; border-radius: 4px;
		border: 1px solid #007bff;height: 2.5rem; background-color: #455892 !important;">
						<i class="fa fa-facebook mr-2"></i>
						<span class="text-gray">Sign with Facebook</span>
					</button>
				</x-incluyeme>
			</x-incluyeme>
			<hr class="w-100">
			<x-incluyeme class="row">
				<x-incluyeme class="form-group col-12">
					<label for="emil">Email</label>
					<input type="email" class="form-control" id="emil" placeholder="Email">
				</x-incluyeme>
				<x-incluyeme class="form-group col-12">
					<label for="inputPassword4">Contraseña</label>
					<input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
				</x-incluyeme>
				<x-incluyeme class="form-group col-12">
					<label for="inputPassword4">Repite contraseña</label>
					<input type="password" class="form-control" id="inputPassword4"
					       placeholder="Repite tu contraseña">
				</x-incluyeme>
			</x-incluyeme>
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(2)">Registrarse con E-mail
			</button>
		</template>
		<template id="step2" v-if="currentStep == 2">
			<x-incluyeme class="container text-center">
				<h1>¿Cómo te llamas?</h1>
			</x-incluyeme>
			<x-incluyeme class="row">
				<x-incluyeme class="form-group col-12">
					<label for="names">Nombres</label>
					<input type="text" class="form-control" id="names" placeholder="Ingresa tus nombres">
				</x-incluyeme>
				<x-incluyeme class="form-group col-12">
					<label for="lastNames">Apellidos</label>
					<input type="text" class="form-control" id="lastNames" placeholder="Ingresa tus apellidos">
				</x-incluyeme>
			</x-incluyeme>
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(3)">Siguiente</button>
		</template>
		<template id="step3" v-if="currentStep == 3">
			<x-incluyeme class="container text-center">
				<h1>Dinos tu género y fecha de nacimiento</h1>
			</x-incluyeme>
			<x-incluyeme class="row">
				<x-incluyeme class="form-group col-12">
					<p>Género</p>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox1"
						       value="Male" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox1"
						       style="color: black"><?php _e("Masculino", "incluyeme-login-extension"); ?></label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox1"
						       value="Female" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox1"
						       style="color: black"><?php _e("Femenino", "incluyeme-login-extension"); ?></label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox1"
						       value="Bin" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox1"
						       style="color: black"><?php _e("No Binario", "incluyeme-login-extension"); ?></label>
					</div>
				</x-incluyeme>
				<x-incluyeme class="form-group">
					<label for="lastNames"><?php _e("Fecha de Nacimiento", "incluyeme-login-extension"); ?></label>
					<input type="date" class="form-control" id="dateBirthDay" placeholder="Ingresa tus apellidos">
				</x-incluyeme>
			</x-incluyeme>
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(4)">Siguiente</button>
		</template>
		<template id="step4" v-if="currentStep == 4">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(5)">Finish</button>
		</template>
		<template id="step5" v-if="currentStep == 5">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(6)">Finish</button>
		</template>
		<template id="step6" v-if="currentStep == 6">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(7)">Finish</button>
		</template>
		<template id="step7" v-if="currentStep == 7">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(8)">Finish</button>
		</template>
		<template id="step8" v-if="currentStep == 8">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(9)">Finish</button>
		</template>
		<template id="step9" v-if="currentStep == 9">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(10)">Finish</button>
		</template>
		<template id="step10" v-if="currentStep == 10">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(11)">Finish</button>
		</template>
		<template id="step11" v-if="currentStep == 11">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(12)">Finish</button>
		</template>
		<template id="step12" v-if="currentStep == 12">
			<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(13)">Finish</button>
		</template>
	</x-incluyeme>
</div>
