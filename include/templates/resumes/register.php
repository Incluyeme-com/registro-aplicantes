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
	
	.btn-link {
		color: black !important;
	}
	
	.btn-link:hover,
	.btn-link:focus,
	.btn-link:active,
	.btn-link.active {
		background: none !important;
	}

</style>
<div id="incluyeme-login-wpjb">
	<div class="container">
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
			<button type="submit" class="btn btn-info w-100 w-100" @click.prevent="goToStep(2)">Registrarse con E-mail
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
			<button type="submit" class="btn btn-info w-100 w-100 mt-3" @click.prevent="goToStep(3)">Siguiente</button>
		</template>
		<template id="step3" v-if="currentStep == 3">
			<x-incluyeme class="container text-center">
				<h1>Dinos tu género y fecha de nacimiento</h1>
			</x-incluyeme>
			<x-incluyeme class="row">
				<x-incluyeme class="form-group col-12">
					<p>Género</p>
					<x-incluyeme class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox1"
						       value="Male" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox1"
						       style="color: black"><?php _e("Masculino", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox1"
						       value="Female" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox1"
						       style="color: black"><?php _e("Femenino", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox1"
						       value="Bin" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox1"
						       style="color: black"><?php _e("No Binario", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="form-group">
					<label for="lastNames"><?php _e("Fecha de Nacimiento", "incluyeme-login-extension"); ?></label>
					<input type="date" class="form-control" id="dateBirthDay" placeholder="Ingresa tus apellidos">
				</x-incluyeme>
			</x-incluyeme>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(2)">Atras</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100" @click.prevent="goToStep(4)">Siguiente</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step4" v-if="currentStep == 4">
			<x-incluyeme class="container text-center">
				<h1>Datos de contacto</h1>
			</x-incluyeme>
			<div class="container">
				<label for="mPhone"><?php _e("Teléfono Celular", "incluyeme-login-extension"); ?></label>
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="form-group col-4">
						<input type="number" v-model="mPhone" class="form-control" id="mPhone" placeholder="Cod. Area">
					</x-incluyeme>
					<x-incluyeme class="form-group col-1 text-center">
						<span><b>-</b></span>
					</x-incluyeme>
					<x-incluyeme class="form-group col">
						<label for="Phone" style="display: none"></label>
						<input type="number" v-model="phone" class="form-control" id="Phone"
						       placeholder="Teléfono Celular">
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<div class="container">
				<label for="fPhone"><?php _e("Teléfono Fijo", "incluyeme-login-extension"); ?></label>
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="form-group col-4">
						<input type="number" v-model="fPhone" class="form-control" id="fPhone" placeholder="Cod. Area">
					</x-incluyeme>
					<x-incluyeme class="form-group col-1 text-center">
						<span><b>-</b></span>
					</x-incluyeme>
					<x-incluyeme class="form-group col">
						<label for="Phone" style="display: none"></label>
						<input type="number" v-model="fiPhone" class="form-control" id="Phone"
						       placeholder="Teléfono Fijo">
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<div class="container">
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="col">
						<label for="country"><?php _e("Pais", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<select id="country" class="form-control">
							<option>Argentina</option>
						</select>
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<div class="container">
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="col-6">
						<label for="state"><?php _e("Provincia/Estado", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<input type="text" class="form-control" id="state">
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<div class="container">
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="col-6">
						<label for="city"><?php _e("Ciudad", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<input type="text" class="form-control" id="city">
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<div class="container">
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="col-12">
						<label for="city"><?php _e("Calle", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-group col-12">
						<input type="text" class="form-control" id="city">
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 mt-3" @click.prevent="goToStep(3)">Atras</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 mt-3" @click.prevent="goToStep(5)">Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step5" v-if="currentStep == 5">
			<x-incluyeme class="container text-center">
				<h1>¿Tienes algún tipo de disCapacidad?</h1>
			</x-incluyeme>
			<x-incluyeme class="row">
				<x-incluyeme class="form-group col">
					<x-incluyeme class="form-check form-check-inline">
						<input type="radio" name="disCap" id="disCap" v-on:click='disCap = true'
						       v-on:click='disClass = "w-50"'
						       class="form-check-input">
						<label for="disCap" class="form-check-label">Tengo una disCapacidad</label>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="form-group col">
					<x-incluyeme class="form-check form-check-inline">
						<input type="radio" id="disCap" name="disCap" v-on:click='disCap = false'
						       v-on:click='disClass = "w-100"'
						       class="form-check-input">
						<label class="form-check-label" for="disCap">NO tengo una disCapacidad</label>
					</x-incluyeme>
				</x-incluyeme>
			</x-incluyeme>
			<div class="container">
				<h5 v-if="disCap">Indica cuales</h5>
				<div class="container">
					<x-incluyeme v-if="disCap" class="row">
						<x-incluyeme class="col">
							<input class="form-check-input" type="checkbox" value="" id="Motriz">
							<label class="form-check-label" for="Motriz">
								Motriz
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" value="" id="Visceral">
							<label class="form-check-label" for="Visceral">
								Visceral
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" value="" id="Auditiva">
							<label class="form-check-label" for="Auditiva">
								Auditiva
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" value="" id="Psíquica">
							<label class="form-check-label" for="Psíquica">
								Psíquica
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" value="" id="Visual">
							<label class="form-check-label" for="Visual">
								Visual
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" value="" id="Habla">
							<label class="form-check-label" for="Habla">
								Habla
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" value="" id="Intelectual">
							<label class="form-check-label" for="Intelectual">
								Intelectual
							</label>
						</x-incluyeme>
					</x-incluyeme>
				</div>
				<span v-if="disCap===false">Nos enfocamos en la inclusión de personas con disCapacidad</span>
			</div>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button v-if="disCap===true" type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(4)">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 mt-3" v-bind:class="[disClass]"
					        @click.prevent="goToStep(disCap ? 6 : false)">
						{{disCap ? 'Siguiente' : 'Finalizar'}}
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step6" v-if="currentStep == 6">
			<x-incluyeme id="accordion">
				<x-incluyeme class="card">
					<x-incluyeme class="card-header p-0 m-0" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
							        aria-expanded="true" aria-controls="collapseOne">
								Motriz
							</button>
						</h5>
					</x-incluyeme>
					
					<x-incluyeme id="collapseOne" class="collapse show" aria-labelledby="headingOne"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							<div class="container">
								<x-incluyeme class="row">
									<x-incluyeme class="col-12">
										<span>¿Puedes permanecer de pie?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mPieS"
											       value="true" v-model="mPie" name="mPie">
											<label class="form-check-label"
											       for="mPieS"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mPie"
											       value="false" v-model="mPie" name="mPie">
											<label class="form-check-label"
											       for="mPie"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Puedes mantenerte sentado/a? </span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mSenS"
											       value="true" v-model="mSen" name="mSen">
											<label class="form-check-label"
											       for="mSenS"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mSen"
											       value="false" v-model="mSen" name="mSen">
											<label class="form-check-label"
											       for="mSen"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Puedes subir y bajar escaleras?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mEscaS"
											       value="true" v-model="mEsca" name="mEsca">
											<label class="form-check-label"
											       for="mEscaS"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mEsca"
											       value="false" v-model="mEsca" name="mEsca">
											<label class="form-check-label"
											       for="mEsca"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Tienes movilidad en tus brazos?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mBrazoS"
											       value="true" v-model="mBrazo" name="mBrazo">
											<label class="form-check-label"
											       for="mBrazoS"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mBrazo"
											       value="false" v-model="mBrazo" name="mBrazo">
											<label class="form-check-label"
											       for="mBrazo"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Puedes tomar peso?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="peso"
											       value="0" v-model="peso" name="peso">
											<label class="form-check-label"
											       for="peso"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="pesoKg"
											       value="1" v-model="peso" name="peso">
											<label class="form-check-label"
											       for="pesoKg"
											       style="color: black"><?php _e("Hasta 5 Kg", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="peso10"
											       value="2" v-model="peso" name="peso">
											<label class="form-check-label"
											       for="peso10"
											       style="color: black"><?php _e("Hasta 10 Kg", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="peso20"
											       value="3" v-model="peso" name="peso">
											<label class="form-check-label"
											       for="peso20"
											       style="color: black"><?php _e("Hasta 20 Kg", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Utilizas silla de ruedas?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mRuedaS"
											       value="true" v-model="mRueda" name="mRueda">
											<label class="form-check-label"
											       for="mRuedaS"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mRueda"
											       value="false" v-model="mBrazo" name="mRueda">
											<label class="form-check-label"
											       for="mRueda"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Utilizas ayudas técnicas para desplazarte?
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="desplazarte"
											       value="0" v-model="desplazarte" name="desplazarte">
											<label class="form-check-label"
											       for="desplazarte"
											       style="color: black"><?php _e("Bastón", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="Muletas"
											       value="1" v-model="desplazarte" name="desplazarte">
											<label class="form-check-label"
											       for="Muletas"
											       style="color: black"><?php _e("Muletas", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="Otros"
											       value="2" v-model="desplazarte" name="desplazarte">
											<label class="form-check-label"
											       for="Otros"
											       style="color: black"><?php _e("Otros", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Puedes realizar tareas de precisión con tus manos, por ejemplo,
										      digitación? </span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mDigiS"
											       value="true" v-model="mDigi" name="mDigi">
											<label class="form-check-label"
											       for="mDigiS"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="mDigi"
											       value="false" v-model="mDigi" name="mDigi">
											<label class="form-check-label"
											       for="mDigi"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
							</div>
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="card">
					<x-incluyeme class="card-header m-0 p-0" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
							        aria-expanded="false" aria-controls="collapseTwo">
								Visceral
							</button>
						</h5>
					</x-incluyeme>
					<x-incluyeme id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
							squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
							nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
							single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
							beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
							lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
							probably haven't heard of them accusamus labore sustainable VHS.
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="card">
					<x-incluyeme class="card-header m-0 p-0" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
							        aria-expanded="false" aria-controls="collapseThree">
								Auditiva
							</button>
						</h5>
					</x-incluyeme>
					<x-incluyeme id="collapseThree" class="collapse" aria-labelledby="headingThree"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
							squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
							nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
							single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
							beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
							lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
							probably haven't heard of them accusamus labore sustainable VHS.
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="card">
					<x-incluyeme class="card-header p-0 m-0" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
							        aria-expanded="true" aria-controls="collapseOne">
								Psíquica
							</button>
						</h5>
					</x-incluyeme>
					
					<x-incluyeme id="collapseOne" class="collapse show" aria-labelledby="headingOne"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
							squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
							nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
							single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
							beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
							lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
							probably haven't heard of them accusamus labore sustainable VHS.
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="card">
					<x-incluyeme class="card-header m-0 p-0" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
							        aria-expanded="false" aria-controls="collapseTwo">
								Visual
							</button>
						</h5>
					</x-incluyeme>
					<x-incluyeme id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
							squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
							nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
							single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
							beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
							lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
							probably haven't heard of them accusamus labore sustainable VHS.
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="card">
					<x-incluyeme class="card-header m-0 p-0" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
							        aria-expanded="false" aria-controls="collapseThree">
								Habla
							</button>
						</h5>
					</x-incluyeme>
					<x-incluyeme id="collapseThree" class="collapse" aria-labelledby="headingThree"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
							squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
							nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
							single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
							beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
							lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
							probably haven't heard of them accusamus labore sustainable VHS.
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="card">
					<x-incluyeme class="card-header m-0 p-0" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
							        aria-expanded="false" aria-controls="collapseThree">
								Intelectual
							</button>
						</h5>
					</x-incluyeme>
					<x-incluyeme id="collapseThree" class="collapse" aria-labelledby="headingThree"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
							squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
							nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
							single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
							beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
							lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
							probably haven't heard of them accusamus labore sustainable VHS.
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
			</x-incluyeme>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(6)">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3" @click.prevent="goToStep(7)">Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step7" v-if="currentStep == 7">
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(6)">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3" @click.prevent="goToStep(8)">Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step8" v-if="currentStep == 8">
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(7)">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3" @click.prevent="goToStep(9)">Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step9" v-if="currentStep == 9">
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(8)">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3" @click.prevent="goToStep(10)">
						Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step10" v-if="currentStep == 10">
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(9)">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3" @click.prevent="goToStep(11)">
						Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step11" v-if="currentStep == 11">
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(10)">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3" @click.prevent="goToStep(12)">
						Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step12" v-if="currentStep == 12">
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(11)">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100" @click.prevent="goToStep(13)">Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
	</div>
</div>
