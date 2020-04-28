<?php
$js = plugins_url() . '/incluyeme-login-extension/include/assets/js/';
$img = plugins_url() . '/incluyeme-login-extension/include/assets/img/incluyeme-place.svg';
$css = plugins_url() . '/incluyeme-login-extension/include/assets/css/';
wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], '1.0.0');
wp_register_script('bootstrapJs', $js . 'bootstrap.min.js', ['jquery', 'popper'], '1.0.0');
wp_register_script('vueJS', $js . 'vueDEV.js', ['bootstrapJs', 'FAwesome'], '1.0.0');
wp_register_script('vueD', $js . 'vueH.js', ['vueJS'], '2.0.0');
wp_register_script('Axios', $js . 'axios.min.js', [], '2.0.0');
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
wp_enqueue_script('Axios');
//wp_enqueue_script('materializeJS');

wp_enqueue_style('bootstrap-css');
wp_enqueue_style('bootstrap-notify-css');
wp_enqueue_script('fAwesome');
$baseurl = wp_upload_dir();
$baseurl = $baseurl['baseurl'];
?>
<script>

</script>
<style>
	#drop-zone {
		border: 2px dashed rgba(0, 0, 0, .3);
		border-radius: 20px;
		text-align: center;
		line-height: 180px;
		font-size: 20px;
		color: rgba(0, 0, 0, .3);
	}
	
	#drop-zone input {
		/*Important*/
		position: absolute;
		/*Important*/
		cursor: pointer;
		left: 0;
		top: 0;
		/*Important This is only comment out for demonstration purposes.
		opacity:0; */
	}
	
	/*Important*/
	#drop-zone.mouse-over {
		border: 2px dashed rgba(0, 0, 0, .5);
		color: rgba(0, 0, 0, .5);
	}
	
	
	/*If you dont want the button*/
	#clickHere {
		position: absolute;
		cursor: pointer;
		left: 50%;
		top: 50%;
		margin-left: -50px;
		margin-top: 20px;
		line-height: 26px;
		color: white;
		font-size: 12px;
		width: 100px;
		height: 26px;
		border-radius: 4px;
		background-color: #3b85c3;
		
	}
	
	#clickHere:hover {
		background-color: #4499DD;
		
	}
	
	#drop-zoneCV {
		border: 2px dashed rgba(0, 0, 0, .3);
		border-radius: 20px;
		text-align: center;
		line-height: 180px;
		font-size: 20px;
		color: rgba(0, 0, 0, .3);
	}
	
	#drop-zoneCV input {
		/*Important*/
		position: absolute;
		/*Important*/
		cursor: pointer;
		left: 0;
		top: 0;
		/*Important This is only comment out for demonstration purposes.
		opacity:0; */
	}
	
	/*Important*/
	#drop-zoneCV.mouse-over {
		border: 2px dashed rgba(0, 0, 0, .5);
		color: rgba(0, 0, 0, .5);
	}
	
	
	/*If you dont want the button*/
	#clickHereCV {
		position: absolute;
		cursor: pointer;
		left: 50%;
		top: 50%;
		margin-left: -50px;
		margin-top: 20px;
		line-height: 26px;
		color: white;
		font-size: 12px;
		width: 100px;
		height: 26px;
		border-radius: 4px;
		background-color: #3b85c3;
		
	}
	
	#clickHereCV:hover {
		background-color: #4499DD;
		
	}
	
	#drop-zoneCUD {
		border: 2px dashed rgba(0, 0, 0, .3);
		border-radius: 20px;
		text-align: center;
		line-height: 180px;
		font-size: 20px;
		color: rgba(0, 0, 0, .3);
	}
	
	#drop-zoneCUD input {
		/*Important*/
		position: absolute;
		/*Important*/
		cursor: pointer;
		left: 0;
		top: 0;
		/*Important This is only comment out for demonstration purposes.
		opacity:0; */
	}
	
	/*Important*/
	#drop-zoneCUD.mouse-over {
		border: 2px dashed rgba(0, 0, 0, .5);
		color: rgba(0, 0, 0, .5);
	}
	
	
	/*If you dont want the button*/
	#clickHereCUD {
		position: absolute;
		cursor: pointer;
		left: 50%;
		top: 50%;
		margin-left: -50px;
		margin-top: 20px;
		line-height: 26px;
		color: white;
		font-size: 12px;
		width: 100px;
		height: 26px;
		border-radius: 4px;
		background-color: #3b85c3;
		
	}
	
	#clickHereCUD:hover {
		background-color: #4499DD;
		
	}
	
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
					<label for="emil">Email *</label>
					<input type="email" v-model="email" class="form-control" id="emil" placeholder="Email">
				</x-incluyeme>
				<x-incluyeme class="form-group col-12">
					<label for="inputPassword4">Contraseña *</label>
					<input type="password" v-model="password" class="form-control" id="inputPassword4"
					       placeholder="Contraseña">
				</x-incluyeme>
				<x-incluyeme class="form-group col-12">
					<label for="inputPassword4">Repite contraseña *</label>
					<input type="password" v-model="passwordConfirm" class="form-control" id="inputPassword4"
					       placeholder="Repite tu contraseña">
				</x-incluyeme>
				<x-incluyeme class="form-group col-12">
					<button type="submit" class="btn btn-info w-100 w-100"
					        @click.prevent="goToStep(2, '<?php echo plugins_url() ?>')">Registrarse con
					                                                                    E-mail
					</button>
				</x-incluyeme>
			</x-incluyeme>
		
		</template>
		<template id="step2" v-if="currentStep == 2">
			<x-incluyeme class="container text-center">
				<h1>¿Cómo te llamas?</h1>
			</x-incluyeme>
			<x-incluyeme class="row">
				<x-incluyeme class="form-group col-12">
					<label for="names">Nombres *</label>
					<input v-model="name" type="text" class="form-control" id="names" placeholder="Ingresa tus nombres">
				</x-incluyeme>
				<x-incluyeme class="form-group col-12">
					<label for="lastNames">Apellidos *</label>
					<input v-model="lastName" type="text" class="form-control" id="lastNames"
					       placeholder="Ingresa tus apellidos">
				</x-incluyeme>
			</x-incluyeme>
			<button type="submit" class="btn btn-info w-100 w-100 mt-3"
			        @click.prevent="goToStep(3, '<?php echo plugins_url() ?>')">
				Siguiente
			</button>
		</template>
		<template id="step3" v-if="currentStep == 3">
			<x-incluyeme class="container text-center">
				<h1>Dinos tu género y fecha de nacimiento</h1>
			</x-incluyeme>
			<x-incluyeme class="row">
				<x-incluyeme class="form-group col-12">
					<p>Género *</p>
					<x-incluyeme class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox1"
						       value="Male" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox1"
						       style="color: black"><?php _e("Masculino", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox2"
						       name="inlineCheckbox1"
						       value="Female" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox2"
						       style="color: black"><?php _e("Femenino", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="inlineCheckbox3"
						       name="inlineCheckbox1"
						       value="Bin" v-model="genre">
						<label class="form-check-label"
						       for="inlineCheckbox3"
						       style="color: black"><?php _e("No Binario", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="form-group">
					<label for="dateBirthDay"><?php _e("Fecha de Nacimiento *", "incluyeme-login-extension"); ?></label>
					<input type="date" v-model="dateBirthDay" name="dateBirthDay" class="form-control" id="dateBirthDay"
					       placeholder="Ingresa tus apellidos">
				</x-incluyeme>
			</x-incluyeme>
			<x-incluyeme class="row mt-2">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100"
					        @click.prevent="goToStep(2, '<?php echo plugins_url() ?>')">Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100"
					        @click.prevent="goToStep(4, '<?php echo plugins_url() ?>')">Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step4" v-if="currentStep == 4">
			<x-incluyeme class="container text-center">
				<h1>Datos de contacto</h1>
			</x-incluyeme>
			<div class="container">
				<label for="mPhone"><?php _e("Teléfono Celular *", "incluyeme-login-extension"); ?></label>
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
						<label for="country"><?php _e("Pais *", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<select id="country" v-model="country" class="form-control">
							<option v-for="(countries, index) of countries" value="countries.country_code">
								{{countries.country_name}}
							</option>
						</select>
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<div class="container mt-2">
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="col-6">
						<label for="state"><?php _e("Provincia/Estado *", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<input v-model="state" type="text" class="form-control" id="state">
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<div class="container mt-2">
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="col-6">
						<label for="city"><?php _e("Ciudad *", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<input v-model="city" type="text" class="form-control" id="city">
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<div class="container mt-2">
				<x-incluyeme class="row align-items-center">
					<x-incluyeme class="col-12">
						<label for="street"><?php _e("Calle", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="form-group col-12">
						<input v-model="street" type="text" class="form-control" id="street">
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 mt-3"
					        @click.prevent="goToStep(3, '<?php echo plugins_url() ?>')">Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 mt-3"
					        @click.prevent="goToStep(5, '<?php echo plugins_url() ?>')"> Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step5" v-if="currentStep == 5">
			<x-incluyeme class="container text-center">
				<h1>¿Tienes algún tipo de disCapacidad? *</h1>
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
						<input type="radio" id="disCapF" name="disCap" v-on:click='disCap = false'
						       v-on:click='disClass = "w-100"'
						       class="form-check-input">
						<label class="form-check-label" for="disCapF">NO tengo una disCapacidad</label>
					</x-incluyeme>
				</x-incluyeme>
			</x-incluyeme>
			<div class="container">
				<h5 v-if="disCap">Indica cuales</h5>
				<div class="container m-auto">
					<x-incluyeme v-if="disCap" class="row ml-5">
						<x-incluyeme class="col">
							<input class="form-check-input" type="checkbox" v-model="motriz" id="Motriz">
							<label class="form-check-label" for="Motriz">
								Motriz
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" v-model="visceral" id="Visceral"
							       name="Visceral">
							<label class="form-check-label" for="Visceral">
								Visceral
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" v-model="auditiva" id="Auditiva">
							<label class="form-check-label" for="Auditiva">
								Auditiva
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" v-model="psiquica" id="Psíquica">
							<label class="form-check-label" for="Psíquica">
								Psíquica
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" v-model="visual" id="Visual">
							<label class="form-check-label" for="Visual">
								Visual
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" v-model="habla" id="Habla">
							<label class="form-check-label" for="Habla">
								Habla
							</label>
						</x-incluyeme>
						<x-incluyeme class="col-6">
							<input class="form-check-input" type="checkbox" v-model="intelectual" id="Intelectual">
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
					        @click.prevent="goToStep(4, '<?php echo plugins_url() ?>')">
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
				<x-incluyeme v-if="motriz" class="card">
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
				<x-incluyeme v-if="visceral" class="card">
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
						<div class="card-body">
							<div class="container">
								<x-incluyeme class="row">
									<x-incluyeme class="col-12">
										<span> ¿Tienes alguna dificultad en trabajar en ambientes húmedos?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vHumedos"
											       value="true" v-model="vHumedos" name="vHumedos">
											<label class="form-check-label"
											       for="vHumedos"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vHumedosS"
											       value="false" v-model="vHumedos" name="vHumedos">
											<label class="form-check-label"
											       for="vHumedosS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
								<span>¿Presentas alguna dificultad al trabajar en ambientes con alta o baja
temperatura? </span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vTemp"
											       value="true" v-model="vTemp" name="vTemp">
											<label class="form-check-label"
											       for="vTemp"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vTempN"
											       value="false" v-model="vTemp" name="vTemp">
											<label class="form-check-label"
											       for="vTempN"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Tienes dificultades para trabajar en ambientes con polvo?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vPolvo"
											       value="true" v-model="vPolvo" name="vPolvo">
											<label class="form-check-label"
											       for="vPolvo"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vPolvov"
											       value="false" v-model="vPolvo" name="vPolvo">
											<label class="form-check-label"
											       for="vPolvov"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Tienes la posibilidad de trabajar durante una jornada completa sin
dificultad?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vCompleta"
											       value="true" v-model="vCompleta" name="vCompleta">
											<label class="form-check-label"
											       for="vCompleta"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vCompletaS"
											       value="false" v-model="vCompleta" name="vCompleta">
											<label class="form-check-label"
											       for="vCompletaS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Requieres alguna adaptación para realizar tu trabajo?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vAdap"
											       value="Jornada Parcial" v-model="vAdap" name="vAdap">
											<label class="form-check-label"
											       for="vAdap"
											       style="color: black"><?php _e("Jornada parcial", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vAdapS"
											       value="Turnos Fijos" v-model="vAdap" name="vAdap">
											<label class="form-check-label"
											       for="vAdapS"
											       style="color: black"><?php _e("Turnos fijos", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vAdapAS"
											       value="Permisos para salidas medicas" v-model="vAdap" name="vAdap">
											<label class="form-check-label"
											       for="vAdapAS"
											       style="color: black"><?php _e("Permiso para salidas médicas", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<label class="form-check-label mr-2"
											       style="color: black; font-weight: 400"
											       for='vSalidas'><?php _e("Otro", "incluyeme-login-extension"); ?></label>
											<input class="form-check-input" type="text" id="vSalidas"
											       v-model="vAdap" name="aImplante" placeholder="Escribe aqui">
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
							</div>
						</div>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme v-if="auditiva" class="card">
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
							<div class="container">
								<x-incluyeme class="row">
									<x-incluyeme class="col-12">
										<span>¿Puedes discriminar sonidos del ambiente?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aAmbient"
											       value="true" v-model="aAmbient" name="aAmbient">
											<label class="form-check-label"
											       for="aAmbient"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aAmbientS"
											       value="false" v-model="aAmbient" name="aAmbient">
											<label class="form-check-label"
											       for="aAmbientS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Utilizas lenguaje oral?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aOral"
											       value="true" v-model="aOral" name="aOral">
											<label class="form-check-label"
											       for="aOral"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aOralN"
											       value="false" v-model="aOral" name="aOral">
											<label class="form-check-label"
											       for="aOralN"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Utilizas lengua de señas para comunicarse?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aSennas"
											       value="true" v-model="aSennas" name="aSennas">
											<label class="form-check-label"
											       for="aSennas"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aSennasS"
											       value="false" v-model="aSennas" name="aSennas">
											<label class="form-check-label"
											       for="aSennasS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Puedes utilizar lectura labial?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aLabial"
											       value="true" v-model="aLabial" name="aLabial">
											<label class="form-check-label"
											       for="aLabial"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aLabialS"
											       value="false" v-model="aLabial" name="aLabial">
											<label class="form-check-label"
											       for="aLabialS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿En un ambiente con bajo ruido (por ejemplo: oficina) puedes
establecer una comunicación oral fluida con otra persona?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aBajo"
											       value="true" v-model="aBajo" name="aBajo">
											<label class="form-check-label"
											       for="aBajo"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aBajoS"
											       value="false" v-model="aBajo" name="aBajo">
											<label class="form-check-label"
											       for="aBajoS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Utilizas alguna ayuda técnica?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aImplante"
											       value="Implante" v-model="aImplante" name="aImplante">
											<label class="form-check-label"
											       for="aImplante"
											       style="color: black"><?php _e("Implante", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="aImplantes"
											       value="Audífonos" v-model="aImplante" name="aImplante">
											<label class="form-check-label"
											       for="aImplantes"
											       style="color: black"><?php _e("Audífonos", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<label class="form-check-label mr-2"
											       style="color: black; font-weight: 400"
											       for="aImplantesText"><?php _e("Otro", "incluyeme-login-extension"); ?></label>
											<input class="form-check-input" type="text" id="aImplantesText"
											       v-model="aImplante" name="aImplante" placeholder="">
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
							</div>
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme v-if='visual' class="card">
					<x-incluyeme class="card-header m-0 p-0" id="headingFive">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive"
							        aria-expanded="false" aria-controls="collapseFive">
								Visual
							</button>
						</h5>
					</x-incluyeme>
					<x-incluyeme id="collapseFive" class="collapse" aria-labelledby="headingFive"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							<div class="container">
								<x-incluyeme class="row">
									<x-incluyeme class="col-12">
										<span> ¿Tienes dificultades para distinguir objetos que estén lejos?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vLejos"
											       value="true" v-model="vLejos" name="vLejos">
											<label class="form-check-label"
											       for="vLejos"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vLejosS"
											       value="false" v-model="vLejos" name="vLejos">
											<label class="form-check-label"
											       for="vLejosS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
								<span>¿Tienes dificultades en distinguir u observar objetos o textos a una
distancia próxima?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vObservar"
											       value="true" v-model="vObservar" name="vObservar">
											<label class="form-check-label"
											       for="vObservar"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vObservarS"
											       value="false" v-model="vTemp" name="vObservar">
											<label class="form-check-label"
											       for="vObservarS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Discriminas colores?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vColores"
											       value="true" v-model="vColores" name="vColores">
											<label class="form-check-label"
											       for="vColores"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vColoresS"
											       value="false" v-model="vColores" name="vColores">
											<label class="form-check-label"
											       for="vColoresS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Puede identificar elementos visuales que se encuentren en
distintos planos, por ejemplo: adelante o atrás (perspectiva)?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vDPlanos"
											       value="true" v-model="vDPlanos" name="vDPlanos">
											<label class="form-check-label"
											       for="vDPlanos"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vDPlanos"
											       value="false" v-model="vDPlanos" name="vDPlanos">
											<label class="form-check-label"
											       for="vDPlanosS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Utilizas alguna ayuda técnica?
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vTecniA"
											       value="Lectores de pantalla
como Jaws o Lupa" v-model="vTecniA" name="vTecniA">
											<label class="form-check-label"
											       for="vTecniA"
											       style="color: black"><?php _e("Lectores de pantalla
como Jaws o Lupa", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vTecniAS"
											       value="Aumentadores de letras" v-model="vTecniA" name="vTecniA">
											<label class="form-check-label"
											       for="vTecniAS"
											       style="color: black"><?php _e("Aumentadores de letras", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="vTecniASS"
											       value="Anteojos" v-model="vTecniA" name="vTecniAS">
											<label class="form-check-label"
											       for="vTecniASS"
											       style="color: black"><?php _e("Anteojos", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<label class="form-check-label mr-2"
											       style="color: black; font-weight: 400"
											       for="aImplantes"><?php _e("Otro", "incluyeme-login-extension"); ?></label>
											<input class="form-check-input" type="text" id="aImplantes"
											       v-model="vTecniA" name="aImplante" placeholder="Escribe aqui">
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
							</div>
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme v-if="intelectual" class="card">
					<x-incluyeme class="card-header m-0 p-0" id="headingFourt">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collatseFourt"
							        aria-expanded="false" aria-controls="collatseFourt">
								Intelectual
							</button>
						</h5>
					</x-incluyeme>
					<x-incluyeme id="collatseFourt" class="collapse" aria-labelledby="headingFourt"
					             data-parent="#accordion">
						<x-incluyeme class="card-body">
							<div class="container">
								<x-incluyeme class="row">
									<x-incluyeme class="col-12">
										<span>¿Sabes leer y escribir?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteEscri"
											       value="true" v-model="inteEscri" name="inteEscri">
											<label class="form-check-label"
											       for="inteEscri"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteEscriS"
											       value="false" v-model="inteEscri" name="inteEscri">
											<label class="form-check-label"
											       for="inteEscriS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Te trasladas solo/a en transporte público? </span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteTransla"
											       value="true" v-model="inteTransla" name="inteTransla">
											<label class="form-check-label"
											       for="inteTransla"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteTranslaS"
											       value="false" v-model="inteTransla" name="inteTransla">
											<label class="form-check-label"
											       for="inteTranslaS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Necesitas ayuda para empezar y terminar una tarea?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteTarea"
											       value="true" v-model="inteTarea" name="inteTarea">
											<label class="form-check-label"
											       for="inteTarea"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteTareaS"
											       value="false" v-model="inteTarea" name="inteTarea">
											<label class="form-check-label"
											       for="inteTareaS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Te molesta que te corrijan cuando realizas una actividad?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteActividad"
											       value="true" v-model="inteActividad" name="inteActividad">
											<label class="form-check-label"
											       for="inteActividad"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteActividadS"
											       value="false" v-model="inteActividad" name="inteActividad">
											<label class="form-check-label"
											       for="inteActividadS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>¿Te molesta si te cambian las actividades durante la jornada
laboral?</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteMolesto"
											       value="true" v-model="inteMolesto" name="inteMolesto">
											<label class="form-check-label"
											       for="inteMolesto"
											       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteMolestoS"
											       value="false" v-model="inteMolesto" name="inteMolesto">
											<label class="form-check-label"
											       for="inteMolestoS"
											       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>Te gustra trabajar:
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteTrabajar"
											       value="true" v-model="inteTrabajar" name="inteTrabajar">
											<label class="form-check-label"
											       for="inteTrabajar"
											       style="color: black"><?php _e("Solo", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteTrabajarS"
											       value="false" v-model="inteTrabajar" name="inteTrabajar">
											<label class="form-check-label"
											       for="inteTrabajarS"
											       style="color: black"><?php _e("Con otras personas", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
									<x-incluyeme class="col-12">
										<span>Prefieres trabajar en:
										</span>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteTrabajarSolo"
											       value="Lugares cerrados (oficinas)" v-model="inteTrabajarSolo"
											       name="inteTrabajarSolo">
											<label class="form-check-label"
											       for="inteTrabajarSolo"
											       style="color: black"><?php _e("Lugares cerrados (oficinas)", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="inteTrabajarSoloS"
											       value="Ambientes
exteriores (jardines, parques, centros deportivos, otros)" v-model="inteTrabajarSolo" name="inteTrabajarSolo">
											<label class="form-check-label"
											       for="inteTrabajarSoloS"
											       style="color: black"><?php _e("Ambientes
exteriores (jardines, parques, centros deportivos, otros)", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
							</div>
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
			</x-incluyeme>
			<div class="container mt-1">
				<x-incluyeme class="w-100 ">
					<label for="exampleFormControlTextarea1">Cuentanos mas sobre tu disCapacidad *</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" v-model="moreDis"
					          rows="3"></textarea>
				</x-incluyeme>
			</div>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(5, '<?php echo plugins_url() ?>')">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(7, '<?php echo plugins_url() ?>')">Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step7" v-if="currentStep == 7">
			<div class="container">
				<h1>Adjunta tu Foto, CV y Certificado Único de Discapacidad</h1>
				<div class="container">
					<h3>Foto de Perfil</h3>
					<x-incluyeme class="row m-auto">
						<x-incluyeme class="col-8">
							<div id="drop-zone">
								Drop files here...
								<div id="clickHere">
									or click here..
									<input v-on:change="cargaImg()" type="file" name="userIMG" id="userIMG"/>
								</div>
							</div>
						</x-incluyeme>
						<x-incluyeme class="col-4">
							<img :src="img" class="rounded-circle" alt="Imagen"
							     v-if="img!==null">
						</x-incluyeme>
					</x-incluyeme>
				</div>
				<div class="container">
					<h3>Curriculum Vitae</h3>
					<x-incluyeme class="row m-auto">
						<x-incluyeme class="col-8">
							<div id="drop-zoneCV">
								Drop files here...
								<div id="clickHereCV">
									or click here..
									<input v-on:change="cargaCV()" type="file" name="userCV" id="userCV"/>
								</div>
							</div>
						</x-incluyeme>
						<x-incluyeme class="col-4">
							<embed :src="cvSHOW"/>
						</x-incluyeme>
					</x-incluyeme>
				</div>
				<div class="container">
					<h3>Certificado Único de Discapacidad</h3>
					<x-incluyeme class="row m-auto">
						<x-incluyeme class="col-8">
							<div id="drop-zoneCUD">
								Drop files here...
								<div id="clickHereCUD">
									or click here..
									<input v-on:change="cargaCUD()" type="file" name="userCUD" id="userCUD"/>
								</div>
							</div>
						</x-incluyeme>
						<x-incluyeme class="col-4">
							<embed :src="cudSHOW"/>
						</x-incluyeme>
					</x-incluyeme>
				</div>
			</div>
			<div class="container">
				<x-incluyeme class="row m-auto">
					<x-incluyeme class="col">
						<button type="submit" class="btn btn-info w-100 w-100 mt-3"
						        @click.prevent="goToStep(6, '<?php echo plugins_url() ?>')">
							Atras
						</button>
					</x-incluyeme>
					<x-incluyeme class="col">
						<button type="submit" class="btn btn-info w-100 w-100 mt-3"
						        @click.prevent="goToStep(8, '<?php echo plugins_url() ?>')">
							Siguiente
						</button>
					</x-incluyeme>
				</x-incluyeme>
			</div>
		</template>
		<template id="step8" v-if="currentStep == 8">
			<div class="container">
				<h1>Educación</h1>
			</div>
			<div v-for="(fieldName, pos) in formFields" :key="pos" class="container">
				<div class="row">
					<x-incluyeme class="col">
						<label for="country_edu"><?php _e("Pais", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<select id="country_edu" v-model="country_edu[pos]" class="form-control"
						        v-on:change="getUniversities(pos)">
							<option v-for="(countries, index) of countries" :value="countries.country_code">
								{{countries.country_name}}
							</option>
						</select>
					</x-incluyeme>
				</div>
				<div class="row mt-2">
					<x-incluyeme class="col">
						<label
								for="university_edu"><?php _e("Institución Educativa", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<select id="university_edu" v-model="university_edu[pos]" class="form-control">
							<option v-for="(university, index) of universities[pos]"
							        :value="university.university" v-on:change="changeUniversity(pos, true)">
								{{university.university}}
							</option>
						</select>
					</x-incluyeme>
				</div>
				<div class="row mt-2">
					<x-incluyeme class="col">
						<label for="university_eduText"><?php _e("Otro", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<input type="text" v-model="university_otro[pos]" class="form-control" id="university_eduText"
						       placeholder="Institución"
						       v-on:change="changeUniversity(pos, false)">
					</x-incluyeme>
					<x-incluyeme class="col-12"><small>Escriba el nombre de su Institución Educativa si no aparece en el
					                                   listado</small></x-incluyeme>
				</div>
				<div class="row mt-2">
					<x-incluyeme class="col">
						<label
								for="studies"><?php _e("Area de Estudio", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<select id="studies" v-model="studies[pos]" class="form-control">
							<option v-for="(studies, index) of study"
							        :value="studies.id" class="text-capitalize">
								{{studies.name_inc_area}}
							</option>
						</select>
					</x-incluyeme>
				</div>
				<div class="row mt-2">
					<x-incluyeme class="col">
						<label for="titleEdu"><?php _e("Título", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<input type="text" v-model="titleEdu[pos]" class="form-control" id="titleEdu"
						       placeholder="Título">
					</x-incluyeme>
				</div>
				<div class="row mt-2">
					<x-incluyeme class="col">
						<label for="eduLevel"><?php _e("Nivel Educativo", "incluyeme-login-extension"); ?></label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<input type="text" v-model="eduLevel[pos]" class="form-control" id="eduLevel"
						       placeholder="Nivel Educativo">
					</x-incluyeme>
				</div>
				<div class="row mt-2">
					<x-incluyeme class="col-6">
						<x-incluyeme class="row">
							<x-incluyeme class="col-12">
								<x-incluyeme class="form-group">
									<label for="dateStudiesD"><?php _e("Desde", "incluyeme-login-extension"); ?></label>
								</x-incluyeme>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<x-incluyeme class="form-group">
									<input type="date" v-model="dateStudiesD[pos]" name="dateStudiesD"
									       class="form-control"
									       id="dateStudiesD">
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<x-incluyeme class="row">
							<x-incluyeme class="col-12">
								<x-incluyeme class="form-group">
									<label for="dateStudiesH"><?php _e("Hasta", "incluyeme-login-extension"); ?></label>
								</x-incluyeme>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<x-incluyeme class="form-group">
									<input type="date" v-model="dateStudiesH[pos]" name="dateStudiesH"
									       class="form-control"
									       id="dateStudiesH" :disabled="dateStudieB[pos]===true">
								</x-incluyeme>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<div class="container">
									<input class="form-check-input" type="checkbox" id="dateStudieB"
									       v-model="dateStudieB[pos]">
									<label class="form-check-label"
									       for="dateStudieB"
									       style="color: black"><?php _e("¿En curso?", "incluyeme-login-extension"); ?></label>
								</div>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
				</div>
				<hr class="w-100" v-if="formFields.length !== 1">
			</div>
			
			<div class="container">
				<x-incluyeme class="row">
					<x-incluyeme class="col text-center">
						<button type="submit" class="btn btn-info w-100 w-100 mt-3"
						        @click.prevent="addStudies()">
							+ Agregar Estudios
						</button>
					</x-incluyeme>
			</div>
			<div class="container">
				<x-incluyeme class="row">
					<x-incluyeme class="col">
						<button type="submit" class="btn btn-info w-100 w-100 mt-3"
						        @click.prevent="goToStep(7, '<?php echo plugins_url() ?>')">
							Atras
						</button>
					</x-incluyeme>
					<x-incluyeme class="col">
						<button type="submit" class="btn btn-info w-100 w-100 mt-3"
						        @click.prevent="goToStep(9, '<?php echo plugins_url() ?>')">
							Siguiente
						</button>
					</x-incluyeme>
				</x-incluyeme>
			</div>
		</template>
		<template id="step9" v-if="currentStep == 9">
			<div class="container">
				<h1>Experiencia Laboral</h1>
			</div>
			<div class="container" v-for="(formFields2, pos) in formFields2" :key="pos">
				<x-incluyeme class="row">
					<x-incluyeme class="col">
						<label for="companies">Empresa</label>
						<input v-model="employed[pos]" type="text" class="form-control" id="companies"
						       placeholder="Empresa">
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="row mt-2">
					<x-incluyeme class="col-6">
						<label for="studies" class="">Area</label>
						<select id="studies" v-model="areaEmployed[pos]" class="form-control mt-2">
							<option v-for="(estudies, index) of study"
							        :value="estudies.id" class="text-capitalize">
								{{estudies.name_inc_area}}
							</option>
						</select>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<label for="names">Puesto </label>
						<input v-model="jobs[pos]" type="text" class="form-control" id="names"
						       placeholder="Puesto">
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="row mt-2">
					<x-incluyeme class="col-6">
						<label for="studies" class="">Nivel de Experiencia</label>
						<select id="studies" v-model="levelExperience[pos]" class="form-control">
							<option v-for="(experiences, index) of experiences"
							        :value="experiences.id" class="text-capitalize">
								{{experiences.name_incluyeme_exp}}
							</option>
						</select>
					</x-incluyeme>
					<x-incluyeme class="col-6" style="margin: auto; float: left;">
						<div style="position: relative;  top: 3px;">
							<input class="form-check-input" type="checkbox" :id="actuWork[pos]" v-model="actuWork[pos]">
							<label class="form-check-label"
							       :for="actuWork[pos]"
							       style="color: black"><?php _e("¿Actualmente trabajas aquí?", "incluyeme-login-extension"); ?></label>
						</div>
					</x-incluyeme>
				</x-incluyeme>
				<div class="row mt-2">
					<x-incluyeme class="col-6">
						<x-incluyeme class="row">
							<x-incluyeme class="col-12">
								<x-incluyeme class="form-group">
									<label for="dateStudiesDLaboral"><?php _e("Desde", "incluyeme-login-extension"); ?></label>
								</x-incluyeme>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<x-incluyeme class="form-group">
									<input type="date" v-model="dateStudiesDLaboral[pos]" name="dateStudiesDLaboral"
									       class="form-control"
									       id="dateStudiesDLaboral">
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<x-incluyeme class="row">
							<x-incluyeme class="col-12">
								<x-incluyeme class="form-group">
									<label for="dateStudiesHLaboral"><?php _e("Hasta", "incluyeme-login-extension"); ?></label>
								</x-incluyeme>
							</x-incluyeme>
							<x-incluyeme class="col-12">
								<x-incluyeme class="form-group">
									<input type="date" v-model="dateStudiesHLaboral[pos]" name="dateStudiesHLaboral"
									       class="form-control"
									       id="dateStudiesHLaboral" :disabled="actuWork[pos]===true">
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
				</div>
				<x-incluyeme class="row mt-2">
					<x-incluyeme class="col-12">
						<label for="jobsDescript">Descripción del Puesto</label>
						<textarea class="form-control" id="jobsDescript" v-model="jobsDescript[pos]"
						          rows="3"></textarea>
					</x-incluyeme>
				</x-incluyeme>
				<hr class="w-100" v-if="formFields2.length !== 1">
			</div>
			<div class="container">
				<x-incluyeme class="row">
					<x-incluyeme class="col text-center">
						<button type="submit" class="btn btn-info w-100 w-100 mt-3"
						        @click.prevent="addExp()">
							+ Agregar Experiencia
						</button>
					</x-incluyeme>
			</div>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(8, '<?php echo plugins_url() ?>')">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(10, '<?php echo plugins_url() ?>')">
						Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step10" v-if="currentStep == 10">
			<div class="container">
				<h1>Idiomas</h1>
			</div>
			<div class="container" v-for="(formFields3, pos) in formFields3" :key="pos">
				<x-incluyeme class="row">
					<x-incluyeme class="col">
						<label for="idioms">Idioma</label>
						<select v-model="idioms[pos]" type="text" class="form-control" id="idioms"
						        placeholder="Idiomas">
							<option v-for="(idioms, index) of idiom"
							        :value="idioms.id" class="text-capitalize">
								{{idioms.name_idioms}}
							</option>
						</select>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="row mt-2">
					<x-incluyeme class="col-6">
						<label for="lecLevel" class="">Nivel de Lectura</label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<select id="lecLevel" v-model="lecLevel[pos]" class="form-control mt-2">
							<option v-for="(levels, index) of levels"
							        :value="levels.id" class="text-capitalize">
								{{levels.name_level}}
							</option>
						</select>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="row mt-2">
					<x-incluyeme class="col-6">
						<label for="redLevel" class="">Nivel Escrito</label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<select id="redLevel" v-model="redLevel[pos]" class="form-control mt-2">
							<option v-for="(levels, index) of levels"
							        :value="levels.id" class="text-capitalize">
								{{levels.name_level}}
							</option>
						</select>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="row mt-2">
					<x-incluyeme class="col-6">
						<label for="oralLevel" class="">Nivel de Lectura</label>
					</x-incluyeme>
					<x-incluyeme class="col-6">
						<select id="oralLevel" v-model="oralLevel[pos]" class="form-control mt-2">
							<option v-for="(levels, index) of levels"
							        :value="levels.id" class="text-capitalize">
								{{levels.name_level}}
							</option>
						</select>
					</x-incluyeme>
				</x-incluyeme>
				<hr class="w-100" v-if="formFields3.length !== 1">
			</div>
			<div class="container">
				<x-incluyeme class="row">
					<x-incluyeme class="col text-center">
						<button type="submit" class="btn btn-info w-100 w-100 mt-3"
						        @click.prevent="addIdioms()">
							+ Agregar Idioma
						</button>
					</x-incluyeme>
			</div>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(9, '<?php echo plugins_url() ?>')">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(11, '<?php echo plugins_url() ?>')">
						Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step11" v-if="currentStep == 11">
			<div class="container">
				<x-incluyeme class="row">
					<x-incluyeme class="col text-center">
						<h1>¿De qué te gustaría trabajar?</h1>
						<select v-model="preferJobs" type="text" class="form-control" id="preferJobs">
							<option v-for="(preferJobs, index) of preferJob"
							        :value="preferJobs.id" class="text-capitalize">
								{{preferJobs.jobs_prefers}}
							</option>
						</select>
					</x-incluyeme>
				</x-incluyeme>
			</div>
			<x-incluyeme class="row">
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(10, '<?php echo plugins_url() ?>')">
						Atras
					</button>
				</x-incluyeme>
				<x-incluyeme class="col">
					<button type="submit" class="btn btn-info w-100 w-100 mt-3"
					        @click.prevent="goToStep(12, '<?php echo plugins_url() ?>')">
						Siguiente
					</button>
				</x-incluyeme>
			</x-incluyeme>
		</template>
		<template id="step12" v-if="currentStep == 12">
			<div class="container">
				<x-incluyeme class="row">
					<x-incluyeme class="col-12 text-center">
						<h1>¡Gracias por Registrarte!</h1>
						<p>Pronto seras redirigido a nuestra lista de ofertas laborales.</p>
					</x-incluyeme>
				</x-incluyeme>
			</div>
		</template>
	</div>
</div>
