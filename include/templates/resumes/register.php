<?php
$js = plugins_url() . '/incluyeme-login-extension/include/assets/js/';
$img = plugins_url() . '/incluyeme-login-extension/include/assets/img/incluyeme-place.svg';
$css = plugins_url() . '/incluyeme-login-extension/include/assets/css/';
wp_register_script('popper', $js . 'popper.js', ['jquery'], '1.0.0');
wp_register_script('bootstrapJs', $js . 'bootstrap.min.js', ['jquery', 'popper'], '1.0.0');
wp_register_script('dropZ', $js . 'dropzone.min.js', ['jquery', 'popper'], '1.0.0');
wp_register_script('FAwesome', $js . 'fAwesome.js', [], '1.0.0', false);
wp_register_script('vueJS', $js . 'vueDEV.js', ['bootstrapJs'], '1.0.0');
wp_register_script('Axios', $js . 'axios.min.js', [], '2.0.0');
wp_register_script('selectJS', $js . 'bootstrap-select.min.js', ['bootstrapJs'], '2.0.0');
wp_register_script('bootstrap-notify', $js . 'iziToast.js', ['bootstrapJs'], '2.0.0');
wp_register_script('defaults-es_ES', $js . 'defaults-es_ES.js', ['selectJS'], '2.0.0');
//wp_register_script('materializeJS', $js . 'materialize.min.js');

wp_register_style('bootstrap-css', $css . 'bootstrap.min.css', [], '1.0.0', false);
wp_register_style('bootstrap-notify-css', $css . 'iziToast.min.css', [], '1.0.0', false);
wp_register_style('dropzone-css', $css . 'dropzone.min.css', [], '1.0.0', false);
wp_register_style('selectB-css', $css . 'bootstrap-select.min.css', ['bootstrap-css'], '1.0.0', false);

wp_enqueue_script('popper');
wp_enqueue_script('bootstrapJs');
wp_enqueue_script('vueJS');
wp_enqueue_script('bootstrap-notify');
wp_enqueue_script('vueH', $js . 'vue3.2.5.js', ['vueJS', 'FAwesome'], date("h:i:s"), true);
wp_enqueue_script('dropZ');
wp_enqueue_script('Axios');
wp_enqueue_script('selectJS');
wp_enqueue_script('defaults-es_ES');
//wp_enqueue_script('materializeJS');

wp_enqueue_style('bootstrap-css');
wp_enqueue_style('dropzone-css');
wp_enqueue_style('bootstrap-notify-css');
wp_enqueue_style('selectB-css');
$baseurl = wp_upload_dir();
$baseurl = $baseurl['baseurl'];
$incluyemeNames = 'incluyemeNamesCV';
$incluyemeLoginFB = 'incluyemeLoginFB';
$incluyemeLoginGoogle = 'incluyemeLoginGoogle';
$incluyemeLoginCountry = 'incluyemeLoginCountry';
$incluyemeLoginEstado = 'incluyemeLoginEstado';
$incluyemeGoogleAPI = get_option($incluyemeLoginGoogle);
$FBappId = get_option($incluyemeLoginFB);
$incluyemeLoginFBSECRET = 'incluyemeLoginFBSECRET';
$FBversion = 'v7.0';
$defaultCheckTerminos = 'defaultCheckTerminos';
?>
<?php if (get_option($incluyemeLoginGoogle)) { ?>
	<script src="https://apis.google.com/js/api:client.js"></script>
	<script>
        var googleUser = {};
        var startApp = function () {
            gapi.load('auth2', function () {
                // Retrieve the singleton for the GoogleAuth library and set up the client.
                auth2 = gapi.auth2.init({
                    client_id: '<?php echo get_option($incluyemeLoginGoogle); ?>',
                    cookiepolicy: 'single_host_origin',
                    // Request scopes in addition to 'profile' and 'email'
                    //scope: 'additional_scope'
                });
                attachSignin(document.getElementById('customBtn'));
            });
        };

        function attachSignin(element) {
            auth2.attachClickHandler(element, {},
                function (googleUser) {
                    const profile = googleUser.getBasicProfile();
                    app.$data.email = profile.getEmail();
                    app.$data.password = profile.getEmail();
                    app.$data.passwordConfirm = profile.getEmail();
                    app.$data.name = profile.getGivenName();
                    app.$data.lastName = profile.getFamilyName();
                    app.$data.google = googleUser.getAuthResponse().id_token;
                    app.googleChange('<?php echo plugins_url() ?>');
                }, function (error) {
                    alert(JSON.stringify(error, undefined, 2));
                });
        }
	</script>
<?php } ?>
<?php if (get_option($incluyemeLoginFB) && get_option($incluyemeLoginFBSECRET)) { ?>
	<script>
        function statusChangeCallback(response) {
        }

        function checkLoginState() {
            FB.getLoginStatus(function (response) {
                statusChangeCallback(response);
            });
        }

        window.fbAsyncInit = function () {
            FB.init({
                appId: '<?php echo get_option($incluyemeLoginFB); ?>',
                cookie: false,
                xfbml: false,
                version: 'v7.0'
            });

        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function FBLogin() {
            FB.login(function (response) {
                if (response.status === 'connected') {
                    const token = response.authResponse.accessToken
                    app.$data.email = token;
                    app.$data.password = token;
                    app.$data.passwordConfirm = token;
                    app.$data.name = token;
                    app.$data.lastName = token;
                    app.$data.facebook = token;
                    app.googleChange('<?php echo plugins_url() ?>');
                }
            }, {scope: 'public_profile,email'});
        }
	</script>
<?php } ?>
<style>
    #main-content .container:before {
        background: none !important;
    }
    .deleteIncluyeme {
        background-color: #ee7566 !important;
        border-color: #ee7566 !important;
    }

    .dropzone .dz-preview .dz-error-message {
        top: 150px !important;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .dropzone {
        border: 2px dashed rgba(0, 0, 0, .3) !important;
        border-radius: 20px !important;
        color: rgba(0, 0, 0, .3) !important;
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

    .panel-heading {
        position: relative;
    }

    .panel-heading[data-toggle="collapse"]:after {
        font-family: '"Font Awesome 5 Free"';
        content: "\f063";
        position: absolute;
        color: #b0c5d8;
        font-size: 18px;
        line-height: 22px;
        right: 20px;
        top: calc(50% - 10px);

        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading[data-toggle="collapse"].collapsed:after {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .myButton2:hover,
    .myButton2:focus,
    .myButton2:active,
    .myButton2.active {
        background-color: #318de6 !important;
    }

    .myButton2 {
        background-color: #318de6 !important;
    }

    .btn-info:hover,
    .btn-info:focus,
    .btn-info:active,
    .btn-info.active {
        background-color: #318de6 !important;
    }

    .btn-info {
        background-color: #318de6 !important;
    }

    ,

    .btn-link {
        color: black !important;
    }

    .btn-link:hover,
    .btn-link:focus,
    .btn-link:active,
    .btn-link.active {
        background: none !important;
    }

    body:not(.et-tb) #main-content .container, body:not(.et-tb-has-header) #main-content .container {
        padding-top: 0 !important;
    }
</style>
<div class="container m-auto">
	<div id="incluyeme-login-wpjb">
		<div id="searchTOP"></div>
		<div v-if="noDisPage === false" class="container">
			<template id="step1" v-if="currentStep == 1">
				<x-incluyeme class="container text-center">
					<h1>Regístrate</h1>
					<p>Accede a oportunidades laborales para personas con disCAPACIDAD</p>
				</x-incluyeme>
                <?php if (get_option($incluyemeLoginGoogle)) { ?>
					<x-incluyeme class="row text-center justify-content-center">
						<x-incluyeme id='gSignInWrapper' class="col-lg-6 col-sm-12">
							<button id="customBtn" type="button" class="btn myButton w-100">
								<i class="fa fa-google mr-2"></i>
								<span class="text-gray">Sign with Google</span>
							</button>
						</x-incluyeme>
					</x-incluyeme>
                <?php } ?>
                <?php if (get_option($incluyemeLoginFB) && get_option($incluyemeLoginFBSECRET)) { ?>
					<x-incluyeme class="row text-center justify-content-center">
						<x-incluyeme class="col-lg-6 col-sm-12 mt-2">
							<button scope="public_profile,email" onclick="FBLogin()"
							        class="btn btn-primary w-100 myButton2" style="box-shadow: 2px 2px 4px 0px #bfbfbf; border-radius: 4px;
		border: 1px solid #007bff;height: 2.5rem; background-color: #318de6 !important;">
								<i class="fa fa-facebook mr-2"></i>
								<span class="text-gray">Sign with Facebook</span>
							</button>
						</x-incluyeme>
					</x-incluyeme>
                <?php } ?>
				<hr class="w-100">
				<x-incluyeme class="row">
					<x-incluyeme class="form-group col-12">
						<label id="emilLabel" for="emil">Ingresa tu email <span
									style="font-size: 2em;color: black;">*<span></label>
						<input type="email" v-model="email" class="form-control" id="emil"
						       placeholder="Ingresa tu email">
						<p v-if="validation === 1" style="color: red">Este email ya se encuentra registrado</p>
						<p v-if="validation === 2" style="color: red">Por favor, ingrese un Email valido</p>
					</x-incluyeme>
					<x-incluyeme class="form-group col-12">
						<label id="labelPassword4" for="inputPassword4">Elige una contraseña <span
									style="font-size: 2em;color: black;">*<span></label>
						<input type="password" v-model="password" class="form-control" id="inputPassword4"
						       placeholder="Elige una contraseña">
						<p v-if="validation === 3" style="color: red">Su contraseña debe contener cinco(5) caracteres o
						                                              mas</p>
					</x-incluyeme>
					<x-incluyeme class="form-group col-12">
						<label id="repostPLabel" for="repostP">Repite contraseña <span
									style="font-size: 2em;color: black;">*<span></label>
						<input type="password" v-model="passwordConfirm" class="form-control" id="repostP"
						       placeholder="Repite tu contraseña">
						<p v-if="validation === 4" style="color: red">Su contraseña no coincide</p>
					</x-incluyeme>
					<x-incluyeme class="form-group col-12 ml-3">
						<input class="form-check-input" type="checkbox" value="" v-model="defaultCheckDiscapacidad"
						       id="defaultCheckDiscapacidad">
						<label id="defaultCheckDiscapacidadLabel" class="form-check-label"
						       for="defaultCheckDiscapacidad">
							Comprendo que <?php echo
                            ucwords($_SERVER['HTTP_HOST']) ?> es una plataforma para <b>personas con discapacidad</b>
							<p v-if="validation === 'discapacidadTerms'" style="color: red">¿Comprende que <?php echo
                                ucwords($_SERVER['HTTP_HOST']) ?> es una plataforma para <b>personas con
							                                                                discapacidad</b>? </p>
						</label>
						<!--	<input class="form-check-input" type="checkbox" value="" v-model="defaultCheckTerminos"
							       id="defaultCheckTerminos">
							<label id="defaultCheckTerminosLabel" class="form-check-label" for="defaultCheckTerminos">
								Al registrarte estas de acuerdo con nuestros <a
										href="<?php //echo get_option($defaultCheckTerminos); ?>" target="_blank">Términos y
								                                                                            Condiciones</a>
								y nuestra política de privacidad
								<p v-if="validation === 'terms'" style="color: red">Debe aceptar nuestros Términos y
								                                                    Condiciones</p>
							</label> -->
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
						<label id="nameLabel" for="names">Nombres <span
									style="font-size: 2em;color: black;">*<span></label>
						<input v-model="name" type="text" class="form-control" id="names"
						       placeholder="Ingresa tus nombres" onkeydown="return /[a-z, ]/i.test(event.key)">
						<p v-if="validation === 5" style="color: red">Por favor, ingrese su nombre</p>
					</x-incluyeme>
					<x-incluyeme class="form-group col-12">
						<label id="lastNamesLabel" for="lastNames">Apellidos <span
									style="font-size: 2em;color: black;">*<span></label>
						<input v-model="lastName" type="text" class="form-control" id="lastNames"
						       placeholder="Ingresa tus apellidos" onkeydown="return /[a-z, ]/i.test(event.key)">
						<p v-if="validation === 6" style="color: red">Por favor, ingrese su apellido</p>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="container text-center">
					<h1 id="haveDiscap">¿Tienes algún tipo de disCapacidad? <span style="font-size: 2em;color: black;">*<span>
					</h1>
				</x-incluyeme>
				<x-incluyeme class="row">
					<x-incluyeme class="form-group col">
						<x-incluyeme class="form-check form-check-inline">
							<input type="radio" style="transform: scale(1.4) !important;" name="disCap" id="disCap"
							       v-on:click='disCap = true'
							       v-on:click='disClass = "w-50"'
							       class="form-check-input">
							<label for="disCap" class="form-check-label">Tengo una disCapacidad</label>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="form-group col">
						<x-incluyeme class="form-check form-check-inline">
							<input type="radio" style="transform: scale(1.4) !important;" id="disCapF" name="disCap"
							       v-on:click='disCap = false'
							       v-on:click='disClass = "w-100"'
							       class="form-check-input">
							<label class="form-check-label" for="disCapF">NO tengo una disCapacidad</label>
						</x-incluyeme>
					</x-incluyeme>
					<p v-if="validation === 20" style="color: red">Por favor, diganos si tiene una disCapacidad</p>
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
					<x-incluyeme class="col-12">
						<p id="genreP">Género <span style="font-size: 2em;color: black;">*<span></p>
						<x-incluyeme class="form-check form-check-inline">
							<input class="form-check-input" type="radio" style="transform: scale(1.4) !important;"
							       id="inlineCheckbox1"
							       value="Masculino" v-model="genre">
							<label class="form-check-label"
							       for="inlineCheckbox1"
							       style="color: black"><?php _e("Masculino", "incluyeme-login-extension"); ?></label>
						</x-incluyeme>
						<x-incluyeme class="form-check form-check-inline">
							<input class="form-check-input" type="radio" style="transform: scale(1.4) !important;"
							       id="inlineCheckbox2"
							       name="inlineCheckbox1"
							       value="Femenino" v-model="genre">
							<label class="form-check-label"
							       for="inlineCheckbox2"
							       style="color: black"><?php _e("Femenino", "incluyeme-login-extension"); ?></label>
						</x-incluyeme>
						<x-incluyeme class="form-check form-check-inline">
							<input class="form-check-input" type="radio" style="transform: scale(1.4) !important;"
							       id="inlineCheckbox3"
							       name="inlineCheckbox1"
							       value="No Binario" v-model="genre">
							<label class="form-check-label"
							       for="inlineCheckbox3"
							       style="color: black"><?php _e("No Binario", "incluyeme-login-extension"); ?></label>
						</x-incluyeme>
						<p v-if="validation === 7" style="color: red">Por favor, ingrese su genero</p>
					</x-incluyeme>
					<x-incluyeme class="col mt-4 mb-2">
						<label id="labeldateBirthDay"
						       for="dateBirthDay"><?php _e("Fecha de Nacimiento <span style='font-size: 2em;color: black;'>*<span>", "incluyeme-login-extension"); ?></label>
						<input type="date" v-model="dateBirthDay" name="dateBirthDay" class="form-control"
						       id="dateBirthDay"
						       placeholder="Ingresa tus fecha de nacimiento">
						<p v-if="validation === 8" style="color: red">Por favor, ingrese su fecha de nacimiento</p>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme v-if="google==true||facebook==true" class="container text-center">
					<h1 id="haveDiscap">¿Tienes algún tipo de disCapacidad? <span style="font-size: 2em;color: black;">*<span>
					</h1>
				</x-incluyeme>
				<x-incluyeme v-if="google==true||facebook==true" class="row">
					<x-incluyeme class="form-group col">
						<x-incluyeme class="form-check form-check-inline">
							<input type="radio" style="transform: scale(1.4) !important;" name="disCap" id="disCap"
							       v-on:click='disCap = true'
							       v-on:click='disClass = "w-50"'
							       class="form-check-input">
							<label for="disCap" class="form-check-label">Tengo una disCapacidad</label>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="form-group col">
						<x-incluyeme class="form-check form-check-inline">
							<input type="radio" style="transform: scale(1.4) !important;" id="disCapF" name="disCap"
							       v-on:click='disCap = false'
							       v-on:click='disClass = "w-100"'
							       class="form-check-input">
							<label class="form-check-label" for="disCapF">NO tengo una disCapacidad</label>
						</x-incluyeme>
					</x-incluyeme>
					<p v-if="validation === 20" style="color: red">Por favor, diganos si tiene una disCapacidad</p>
				</x-incluyeme>
				<x-incluyeme class="row mt-2">
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
					<label id="labelPhone"
					       for="mPhone"><?php _e("Teléfono Celular <span style='font-size: 2em;color: black;'>*<span>", "incluyeme-login-extension"); ?></label>
					<x-incluyeme class="row align-items-center">
						<x-incluyeme class="col-lg-4 col col-md-12 mb-3 mb-sm-0">
							<input type="number" min='0' v-model="mPhone" class="form-control" id="mPhone"
							       placeholder="Cod. Area">
						</x-incluyeme>
						<x-incluyeme class="col-1 text-center d-none d-lg-block">
							<span><b>-</b></span>
						</x-incluyeme>
						<x-incluyeme class="col-lg-7 col-md-12">
							<label for="Phone" style="display: none"></label>
							<input type="number" min='0' v-model="phone" class="form-control" id="Phone"
							       placeholder="Teléfono Celular">
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row align-items-center">
						<x-incluyeme v-if="validation === 9 || validation === 20"
						             class="col-lg-4 col col-md-12 mb-3 mb-sm-0">
							<p v-if="validation === 9" style="color: red">Por favor, ingrese su Teléfono Celular</p>
						</x-incluyeme>
						<x-incluyeme class="col-1 text-center d-none d-lg-block">
							<span><b></b></span>
						</x-incluyeme>
						<x-incluyeme class="col-lg-7 col-md-12">
							<p v-if="validation === 20" style="color: red">Por favor, ingrese su Teléfono Celular</p>
						</x-incluyeme>
					</x-incluyeme>
				</div>
				<div class="container mt-3 mb-sm-0">
					<label for="fPhone"><?php _e("Teléfono Fijo", "incluyeme-login-extension"); ?></label>
					<x-incluyeme class="row align-items-center">
						<x-incluyeme class="col-lg-4 col col-md-12 mb-3 mb-sm-0">
							<input type="number" min='0' v-model="fPhone" class="form-control" id="fPhone"
							       placeholder="Cod. Area">
						</x-incluyeme>
						<x-incluyeme class="col-1 text-center d-none d-lg-block">
							<span><b>-</b></span>
						</x-incluyeme>
						<x-incluyeme class="col-lg-7 col-md-12">
							<label for="Phone" style="display: none"></label>
							<input type="number" min='0' v-model="fiPhone" class="form-control" id="Phone"
							       placeholder="Teléfono Fijo">
						</x-incluyeme>
					</x-incluyeme>
				
				</div>
                <?php if (!get_option($incluyemeLoginCountry)) { ?>
					<div class="container mt-3 mb-sm-0">
						<x-incluyeme class="row align-items-center">
							<x-incluyeme class="form-group col">
								<label id="labelState"
								       for="state"><?php _e((get_option($incluyemeLoginEstado) ? get_option($incluyemeLoginEstado) : ' Provincia/Estado') . "<span style='font-size: 2em;color: black;'>*<span>", "incluyeme-login-extension"); ?></label>
								<input v-model="state" type="text" class="form-control" id="state">
								<p v-if="validation === 10" style="color: red">Por favor, ingrese
								                                               su <?php (get_option($incluyemeLoginEstado) ? get_option($incluyemeLoginEstado) : ' Provincia/Estado') ?></p>
							</x-incluyeme>
						</x-incluyeme>
					</div>
					<div class="container mt-3 mb-sm-0">
						<x-incluyeme class="row align-items-center">
							<x-incluyeme class="form-group col">
								<label id="labelCity"
								       for="city"><?php _e("Ciudad <span style='font-size: 2em;color: black;'>*<span>", "incluyeme-login-extension"); ?></label>
								<input v-model="city" type="text" class="form-control" id="city">
								<p v-if="validation === 11" style="color: red">Por favor, ingrese su Ciudad</p>
							</x-incluyeme>
						</x-incluyeme>
					</div>
                <?php } else { ?>
					<div class="container mt-3 mb-sm-0">
						<x-incluyeme class="row align-items-center">
							<x-incluyeme class="form-group col">
								<label id="labelState"
								       for="state"><?php _e((get_option($incluyemeLoginEstado) ? get_option($incluyemeLoginEstado) : ' Provincia/Estado') . "<span style='font-size: 2em;color: black;'>*<span>", "incluyeme-login-extension"); ?></label>
								<select v-model="state" type="text" data-live-search="true" data-container="body"
								        class="form-control selectpicker" id="state"
								        v-on:change="getCities()">
									<option v-for="provincias in provincias"
									        :value="provincias.cities_provin" class="text-capitalize">
										{{provincias.cities_provin}}
									</option>
                                    <?php if (get_option($incluyemeLoginCountry) !== 'AR') { ?>
										<option value="Otra">Otro</option>
                                    <?php } ?>
								</select>
								<p v-if="validation === 10" style="color: red">Por favor, ingrese
								                                               su <?php (get_option($incluyemeLoginEstado) ? get_option($incluyemeLoginEstado) : ' Provincia/Estado') ?></p>
							</x-incluyeme>
						</x-incluyeme>
					</div>
					<div class="container mt-3 mb-sm-0">
						<x-incluyeme class="row align-items-center">
							<x-incluyeme class="form-group col">
								<label id="labelCity"
								       for="city"><?php _e("Ciudad <span style='font-size: 2em;color: black;'>*<span>", "incluyeme-login-extension"); ?></label>
								<select v-model="city" type="text" data-live-search="true" data-container="body"
								        class="form-control selectpicker" id="city">
									<option v-for="citiy in cities"
									        v-bind:value="citiy.cities_name" class="text-capitalize">
										{{citiy.cities_name}}
									</option>
									<option value="Otra">Otro</option>
								</select>
								<p v-if="validation === 11" style="color: red">Por favor, ingrese su Ciudad</p>
							</x-incluyeme>
						</x-incluyeme>
					</div>
                <?php } ?>
				<div class="container mt-3 mb-sm-0">
					<x-incluyeme class="row align-items-center">
						<x-incluyeme class="form-group col">
							<label for="street"><?php _e("Calle", "incluyeme-login-extension"); ?></label>
							<input v-model="street" type="text" class="form-control"
							       id="street">
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
					<h1 v-if="disCap" id="disSelects">Indica cual es tu disCapacidad</h1>
				</x-incluyeme>
				<div class="container">
					<div class="container m-auto">
						<x-incluyeme v-if="disCap" class="row ml-5">
							<x-incluyeme class="col mb-2 mb-sm-0">
								<input class="form-check-input" type="checkbox"
								       style="transform: scale(1.4) !important;" v-model="motriz" id="Motriz">
								<label class="form-check-label" for="Motriz">
									Motriz
								</label>
							</x-incluyeme>
							<x-incluyeme class="col-lg-6 col-md-12 mb-2 mb-sm-0">
								<input class="form-check-input" type="checkbox"
								       style="transform: scale(1.4) !important;" v-model="visceral" id="Visceral"
								       name="Visceral">
								<label class="form-check-label" for="Visceral">
									Visceral
								</label>
							</x-incluyeme>
							<x-incluyeme class="col-lg-6 col-md-12 mb-2 mb-sm-0">
								<input class="form-check-input" type="checkbox"
								       style="transform: scale(1.4) !important;" v-model="auditiva" id="Auditiva">
								<label class="form-check-label" for="Auditiva">
									Auditiva
								</label>
							</x-incluyeme>
							<x-incluyeme class="col-lg-6 col-md-12 mb-2 mb-sm-0">
								<input class="form-check-input" type="checkbox"
								       style="transform: scale(1.4) !important;" v-model="psiquica" id="Psíquica">
								<label class="form-check-label" for="Psíquica">
									Psíquica
								</label>
							</x-incluyeme>
							<x-incluyeme class="col-lg-6 col-md-12 mb-2 mb-sm-0">
								<input class="form-check-input" type="checkbox"
								       style="transform: scale(1.4) !important;" v-model="visual" id="Visual">
								<label class="form-check-label" for="Visual">
									Visual
								</label>
							</x-incluyeme>
							<x-incluyeme class="col-lg-6 col-md-12 mb-2 mb-sm-0">
								<input class="form-check-input" type="checkbox"
								       style="transform: scale(1.4) !important;" v-model="habla" id="Habla">
								<label class="form-check-label" for="Habla">
									Habla
								</label>
							</x-incluyeme>
							<x-incluyeme class="col-lg-6 col-md-12 mb-2 mb-sm-0">
								<input class="form-check-input" type="checkbox"
								       style="transform: scale(1.4) !important;" v-model="intelectual"
								       id="Intelectual">
								<label class="form-check-label" for="Intelectual">
									Intelectual
								</label>
							</x-incluyeme>
						</x-incluyeme>
						<p v-if="validation === 12" style="color: red">Por favor, dinos tu tipo de
						                                               disCapacidad</p>
					</div>
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
								<button class="btn btn-link " data-toggle="collapse"
								        data-target="#collapseOne"
								        aria-expanded="true" aria-controls="collapseOne">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Motriz</h5>
								</button>
							</h5>
						</x-incluyeme>
						
						<x-incluyeme id="collapseOne" class="collapse show" aria-labelledby="headingOne"
						             data-parent="#accordion">
							<x-incluyeme class="card-body">
								<div class="container">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span>¿Puedes permanecer de pie?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mPieS"
												       value="Si" v-model="mPie" name="mPie">
												<label class="form-check-label"
												       for="mPieS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mPie"
												       value="No" v-model="mPie" name="mPie">
												<label class="form-check-label"
												       for="mPie"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Puedes mantenerte sentado/a? </span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mSenS"
												       value="Si" v-model="mSen" name="mSen">
												<label class="form-check-label"
												       for="mSenS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mSen"
												       value="No" v-model="mSen" name="mSen">
												<label class="form-check-label"
												       for="mSen"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Puedes subir y bajar escaleras?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mEscaS"
												       value="Si" v-model="mEsca" name="mEsca">
												<label class="form-check-label"
												       for="mEscaS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mEsca"
												       value="No" v-model="mEsca" name="mEsca">
												<label class="form-check-label"
												       for="mEsca"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Tienes movilidad en tus brazos?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mBrazoS"
												       value="Si" v-model="mBrazo" name="mBrazo">
												<label class="form-check-label"
												       for="mBrazoS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mBrazo"
												       value="No" v-model="mBrazo" name="mBrazo">
												<label class="form-check-label"
												       for="mBrazo"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Puedes tomar peso?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="peso"
												       value="No" v-model="peso" name="peso">
												<label class="form-check-label"
												       for="peso"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="pesoKg"
												       value="Hasta 5 Kg" v-model="peso" name="peso">
												<label class="form-check-label"
												       for="pesoKg"
												       style="color: black"><?php _e("Hasta 5 Kg", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="peso10"
												       value="Hasta 10 Kg" v-model="peso" name="peso">
												<label class="form-check-label"
												       for="peso10"
												       style="color: black"><?php _e("Hasta 10 Kg", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="peso20"
												       value="Hasta 20 Kg" v-model="peso" name="peso">
												<label class="form-check-label"
												       for="peso20"
												       style="color: black"><?php _e("Hasta 20 Kg", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Utilizas silla de ruedas?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mRuedaS"
												       value="Si" v-model="mRueda" name="mRueda">
												<label class="form-check-label"
												       for="mRuedaS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mRueda"
												       value="No" v-model="mRueda" name="mRueda">
												<label class="form-check-label"
												       for="mRueda"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Utilizas ayudas técnicas para desplazarte?
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio"
											       style="transform: scale(1.4) !important;" id="desplazarte"
											       value="Bastón" v-model="desplazarte" name="desplazarte">
											<label class="form-check-label"
											       for="desplazarte"
											       style="color: black"><?php _e("Bastón", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio"
											       style="transform: scale(1.4) !important;" id="Muletas"
											       value="Muletas" v-model="desplazarte" name="desplazarte">
											<label class="form-check-label"
											       for="Muletas"
											       style="color: black"><?php _e("Muletas", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio"
											       style="transform: scale(1.4) !important;" id="Otros"
											       value="Otros" v-model="desplazarte" name="desplazarte">
											<label class="form-check-label"
											       for="Otros"
											       style="color: black"><?php _e("Otros", "incluyeme-login-extension"); ?></label>
										</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Puedes realizar tareas de precisión con tus manos, por ejemplo,
										      digitación? </span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mDigiS"
												       value="Si" v-model="mDigi" name="mDigi">
												<label class="form-check-label"
												       for="mDigiS"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="mDigi"
												       value="No" v-model="mDigi" name="mDigi">
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
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collapseTwo"
								        aria-expanded="false" aria-controls="collapseTwo">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Visceral</h5>
								
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
						             data-parent="#accordion">
							<div class="card-body">
								<div class="container">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span> ¿Tienes alguna dificultad en trabajar en ambientes húmedos?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vHumedos"
												       value="Si" v-model="vHumedos" name="vHumedos">
												<label class="form-check-label"
												       for="vHumedos"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vHumedosS"
												       value="No" v-model="vHumedos" name="vHumedos">
												<label class="form-check-label"
												       for="vHumedosS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
								<span>¿Presentas alguna dificultad al trabajar en ambientes con alta o baja
temperatura? </span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vTemp"
												       value="Si" v-model="vTemp" name="vTemp">
												<label class="form-check-label"
												       for="vTemp"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vTempN"
												       value="No" v-model="vTemp" name="vTemp">
												<label class="form-check-label"
												       for="vTempN"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Tienes dificultades para trabajar en ambientes con polvo?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vPolvo"
												       value="Si" v-model="vPolvo" name="vPolvo">
												<label class="form-check-label"
												       for="vPolvo"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vPolvov"
												       value="No" v-model="vPolvo" name="vPolvo">
												<label class="form-check-label"
												       for="vPolvov"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Tienes la posibilidad de trabajar durante una jornada completa sin
dificultad?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vCompleta"
												       value="Si" v-model="vCompleta" name="vCompleta">
												<label class="form-check-label"
												       for="vCompleta"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vCompletaS"
												       value="No" v-model="vCompleta" name="vCompleta">
												<label class="form-check-label"
												       for="vCompletaS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Requieres alguna adaptación para realizar tu trabajo?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vAdap"
												       value="Jornada Parcial" v-model="vAdap" name="vAdap">
												<label class="form-check-label"
												       for="vAdap"
												       style="color: black"><?php _e("Jornada parcial", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vAdapS"
												       value="Turnos Fijos" v-model="vAdap" name="vAdap">
												<label class="form-check-label"
												       for="vAdapS"
												       style="color: black"><?php _e("Turnos fijos", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vAdapAS"
												       value="Permisos para salidas medicas" v-model="vAdap"
												       name="vAdap">
												<label class="form-check-label"
												       for="vAdapAS"
												       style="color: black"><?php _e("Permiso para salidas médicas", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<div class="row">
													<div class="col-lg col-md-12">
														<label class="form-check-label mr-2"
														       style="color: black; font-weight: 400"
														       for='vSalidas'><?php _e("Otro", "incluyeme-login-extension"); ?></label>
													</div>
													<div class="col-lg-12 col-md-12">
														<input class="form-check-input" type="text" id="vSalidas"
														       v-model="vAdap" name="vAdap"
														       placeholder="Escribe aqui">
													</div>
												</div>
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
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collapseThree"
								        aria-expanded="false" aria-controls="collapseThree">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Auditiva</h5>
								
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collapseThree" class="collapse" aria-labelledby="headingThree"
						             data-parent="#accordion">
							<x-incluyeme class="card-body">
								<div class="container">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span>¿Puedes discriminar distintos sonidos del ambiente?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aAmbient"
												       value="Si" v-model="aAmbient" name="aAmbient">
												<label class="form-check-label"
												       for="aAmbient"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aAmbientS"
												       value="No" v-model="aAmbient" name="aAmbient">
												<label class="form-check-label"
												       for="aAmbientS"
												       style="color: black"> <?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Utilizas lenguaje oral?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aOral"
												       value="Si" v-model="aOral" name="aOral">
												<label class="form-check-label"
												       for="aOral"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aOralN"
												       value="No" v-model="aOral" name="aOral">
												<label class="form-check-label"
												       for="aOralN"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Utilizas lengua de señas para comunicarte?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aSennas"
												       value="Si" v-model="aSennas" name="aSennas">
												<label class="form-check-label"
												       for="aSennas"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aSennasS"
												       value="No" v-model="aSennas" name="aSennas">
												<label class="form-check-label"
												       for="aSennasS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Puedes utilizar lectura labial?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aLabial"
												       value="Si" v-model="aLabial" name="aLabial">
												<label class="form-check-label"
												       for="aLabial"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aLabialS"
												       value="No" v-model="aLabial" name="aLabial">
												<label class="form-check-label"
												       for="aLabialS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿En un ambiente con distintas fuentes sonoras (por ejemplo: oficina) puedes establecer una comunicación oral fluida con otra persona?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aBajo"
												       value="Si" v-model="aBajo" name="aBajo">
												<label class="form-check-label"
												       for="aBajo"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aBajoS"
												       value="No" v-model="aBajo" name="aBajo">
												<label class="form-check-label"
												       for="aBajoS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Puedes establecer una comunicación fluida vía telefónica?(sin uso de mensajería o chat)</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aFluida"
												       value="Si" v-model="aFluida" name="aFluida">
												<label class="form-check-label"
												       for="aFluida"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aFluidaS"
												       value="No" v-model="aFluida" name="aFluida">
												<label class="form-check-label"
												       for="aFluidaS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Utilizas alguna ayuda técnica?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aImplante"
												       value="Implante" v-model="aImplante" name="aImplante">
												<label class="form-check-label"
												       for="aImplante"
												       style="color: black"><?php _e("Implante", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="aImplantes"
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
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collapseFive"
								        aria-expanded="false" aria-controls="collapseFive">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Visual</h5>
								
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collapseFive" class="collapse" aria-labelledby="headingFive"
						             data-parent="#accordion">
							<x-incluyeme class="card-body">
								<div class="container">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span> ¿Tienes dificultades para distinguir objetos que estén lejos?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vLejos"
												       value="Si" v-model="vLejos" name="vLejos">
												<label class="form-check-label"
												       for="vLejos"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vLejosS"
												       value="No" v-model="vLejos" name="vLejos">
												<label class="form-check-label"
												       for="vLejosS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
								<span>¿Tienes dificultades en distinguir objetos o textos a una
distancia próxima?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vObservar"
												       value="Si" v-model="vObservar" name="vObservar">
												<label class="form-check-label"
												       for="vObservar"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vObservarS"
												       value="No" v-model="vObservar" name="vObservar">
												<label class="form-check-label"
												       for="vObservarS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Discriminas colores?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vColores"
												       value="Si" v-model="vColores" name="vColores">
												<label class="form-check-label"
												       for="vColores"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vColoresS"
												       value="No" v-model="vColores" name="vColores">
												<label class="form-check-label"
												       for="vColoresS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Puede identificar elementos visuales que se encuentren en
distintos planos, por ejemplo: adelante o atrás (perspectiva)?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vDPlanos"
												       value="Si" v-model="vDPlanos" name="vDPlanos">
												<label class="form-check-label"
												       for="vDPlanos"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vDPlanos"
												       value="No" v-model="vDPlanos" name="vDPlanos">
												<label class="form-check-label"
												       for="vDPlanosS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>¿Utilizas alguna ayuda técnica?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vTecniA"
												       value="Lectores de pantalla
como Jaws o Lupa" v-model="vTecniA" name="vTecniA">
												<label class="form-check-label"
												       for="vTecniA"
												       style="color: black"><?php _e("Lectores de pantalla
como Jaws o Lupa", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vTecniAS"
												       value="Aumentadores de letras" v-model="vTecniA"
												       name="vTecniA">
												<label class="form-check-label"
												       for="vTecniAS"
												       style="color: black"><?php _e("Aumentadores de letras", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="vTecniASS"
												       value="Anteojos" v-model="vTecniA" name="vTecniAS">
												<label class="form-check-label"
												       for="vTecniASS"
												       style="color: black"><?php _e("Anteojos", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<div class="row">
													<div class="col-lg col-md-12">
														<label class="form-check-label mr-2"
														       style="color: black; font-weight: 400"
														       for="vTecniAvAS"><?php _e("Otro", "incluyeme-login-extension"); ?></label>
													</div>
													<div class="col-lg-12 col-md-12">
														<input class="form-check-input" type="text" id="vTecniAvAS"
														       v-model="vTecniA" name="vTecniAvAS"
														       placeholder="Escribe aqui">
													</div>
												</div>
											
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
								<button class="btn btn-link collapsed" data-toggle="collapse"
								        data-target="#collatseFourt"
								        aria-expanded="false" aria-controls="collatseFourt">
									<i class="fas fa-arrow-down"></i>
									<h5 style="display:inline;"> Intelectual</h5>
								
								</button>
							</h5>
						</x-incluyeme>
						<x-incluyeme id="collatseFourt" class="collapse" aria-labelledby="headingFourt"
						             data-parent="#accordion">
							<x-incluyeme class="card-body">
								<div class="container">
									<x-incluyeme class="row">
										<x-incluyeme class="col-12">
											<span>¿Sabes leer y escribir?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteEscri"
												       value="Si" v-model="inteEscri" name="inteEscri">
												<label class="form-check-label"
												       for="inteEscri"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteEscriS"
												       value="No" v-model="inteEscri" name="inteEscri">
												<label class="form-check-label"
												       for="inteEscriS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Usas el transporte público como bus, micro, metro, combi, subte, tren, etc.?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteTransla"
												       value="Si" v-model="inteTransla" name="inteTransla">
												<label class="form-check-label"
												       for="inteTransla"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteTranslaS"
												       value="No" v-model="inteTransla" name="inteTransla">
												<label class="form-check-label"
												       for="inteTranslaS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Cuando te equivocas te enoja que te lo digan?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteActividad"
												       value="Si" v-model="inteActividad" name="inteActividad">
												<label class="form-check-label"
												       for="inteActividad"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteActividadS"
												       value="No" v-model="inteActividad" name="inteActividad">
												<label class="form-check-label"
												       for="inteActividadS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿ Te enoja si en tu trabajo te cambian las tareas?</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteMolesto"
												       value="Si" v-model="inteMolesto" name="inteMolesto">
												<label class="form-check-label"
												       for="inteMolesto"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteMolestoS"
												       value="No" v-model="inteMolesto" name="inteMolesto">
												<label class="form-check-label"
												       for="inteMolestoS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Te gusta trabajar solo?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteTrabajar"
												       value="Si" v-model="inteTrabajar" name="inteTrabajar">
												<label class="form-check-label"
												       for="inteTrabajar"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;" id="inteTrabajarS"
												       value="No" v-model="inteTrabajar"
												       name="inteTrabajar">
												<label class="form-check-label"
												       for="inteTrabajarS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
											<span>¿Te gusta trabajar con otras personas?</span>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarOP"
												       value="Si" v-model="inteTrabajarOP" name="inteTrabajarOP">
												<label class="form-check-label"
												       for="inteTrabajarOP"
												       style="color: black"><?php _e("Si", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarOPS"
												       value="No" v-model="inteTrabajarOP"
												       name="inteTrabajarOP">
												<label class="form-check-label"
												       for="inteTrabajarOPS"
												       style="color: black"><?php _e("No", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
										<x-incluyeme class="col-12">
										<span>Prefieres trabajar en: ¿Dónde te gusta trabajar más?
										</span><br>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;"
												       id="inteTrabajarSolo"
												       value="Lugares cerrados (por ejemplo oficinas)"
												       v-model="inteTrabajarSolo"
												       name="inteTrabajarSolo">
												<label class="form-check-label"
												       for="inteTrabajarSolo"
												       style="color: black"><?php _e("Lugares cerrados (por ejemplo oficinas)", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio"
												       style="transform: scale(1.4) !important;"
												       id="inteTrabajarSoloS"
												       value="Ambientes exteriores (por ejemplo jardines, parques, centros deportivos, otros)"
												       v-model="inteTrabajarSolo" name="inteTrabajarSolo">
												<label class="form-check-label"
												       for="inteTrabajarSoloS"
												       style="color: black"><?php _e("Ambientes exteriores (por ejemplo jardines, parques, centros deportivos, otros)", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
											<x-incluyeme class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="inteTrabajarSoloS2"
												       value="Me da lo mismo o no lo sé" v-model="inteTrabajarSolo"
												       name="inteTrabajarSolo">
												<label class="form-check-label"
												       for="inteTrabajarSoloS2"
												       style="color: black"><?php _e("Me da lo mismo o no lo sé", "incluyeme-login-extension"); ?></label>
											</x-incluyeme>
										</x-incluyeme>
									</x-incluyeme>
								</div>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				<p v-if="motriz || visceral || auditiva || visual || intelectual">No es necesario responder todas las
				                                                                  preguntas listadas arriba</p>
				<div class="container mt-1">
					<x-incluyeme class="w-100 ">
						<label id="disCText" for="exampleFormControlTextarea1">Por favor cuéntanos más sobre tu
						                                                       discapacidad y todo lo que quieras
						                                                       agregar para conocerte más
							<span
									style="font-size: 2em;color: black;">*<span></label>
						<textarea class="form-control" id="exampleFormControlTextarea1" v-model="moreDis"
						          rows="3"></textarea>
						<p v-if="validation === 11" style="color: red">Por favor, cuentanos mas sobre tu
						                                               disCapacidad</p>
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
					<h1>Adjunta tu Foto, CV
					    y <?php echo get_option($incluyemeNames) ? ' ' . get_option($incluyemeNames) : ' Certificado Único de Discapacidad'; ?> </h1>
					<div class="">
						<h3 id="userIMGlabel">Foto de Perfil</h3>
						<x-incluyeme class="row m-auto">
							<x-incluyeme class="col-12">
								<form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload">
									<div class="dz-message needsclick">
										<button type="button" class="dz-button">Suelta tus archivos aquí O haz click
										</button>
										<br>
									</div>
									<div>
									</div>
								</form>
							</x-incluyeme>
						</x-incluyeme>
					</div>
					<div class="">
						<h3 id="dropZoneCVLabel">Curriculum Vitae</h3>
						<x-incluyeme class="row m-auto">
							<x-incluyeme class="col-12">
								<form action="/upload" class="dropzone needsclick dz-clickable" id="CVDROP">
									<div class="dz-message needsclick">
										<button type="button" class="dz-button">Suelta tus archivos aquí O haz click
										</button>
										<br>
									</div>
								</form>
							</x-incluyeme>
						</x-incluyeme>
					</div>
					<div class="">
						<h3 id="drop-zoneCUDLabel"><?php echo get_option($incluyemeNames) ? get_option($incluyemeNames) : 'Certificado Único de Discapacidad'; ?></h3>
						<x-incluyeme class="row m-auto">
							<x-incluyeme class="col-12">
								<form action="/upload" class="dropzone needsclick dz-clickable" id="CUDDROP">
									<div class="dz-message needsclick">
										<button type="button" class="dz-button">Suelta tus archivos aquí O haz click
										</button>
										<br>
									</div>
								</form>
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
							<select id="country_edu" v-model="country_edu[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker"
							        v-on:change="getUniversities(pos)">
								<option v-for="(countries, index) of countries" :value="countries.country_code">
									{{countries.country_name}}
								</option>
							</select>
						</x-incluyeme>
					</div>
					<div class="row mt-2">
						<x-incluyeme class="col">
							<label for="university_edu"><?php _e("Institución Educativa", "incluyeme-login-extension"); ?></label>
							<select id="university_edu" v-model="university_edu[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker">
								<option v-for="university in universities[pos]"
								        :value="university.university" v-on:change="changeUniversity(pos, true)">
									{{university.university}}
								</option>
								<option value="Otro">
									Otra
								</option>
							</select>
						</x-incluyeme>
					</div>
					<div class="row mt-2" v-if="university_edu[pos] =='Otro'">
						<x-incluyeme class="col">
							<label for="university_eduText"><?php _e("Otro", "incluyeme-login-extension"); ?></label>
							<input type="text" v-model="university_otro[pos]" class="form-control"
							       id="university_eduText"
							       placeholder="Institución"
							       v-on:change="changeUniversity(pos, false)">
						</x-incluyeme>
						<x-incluyeme class="col-12"><small>Escriba el nombre de su Institución Educativa si no
						                                   aparece
						                                   en el
						                                   listado</small></x-incluyeme>
					</div>
					<div class="row mt-2">
						<x-incluyeme class="col">
							<label
									for="studies"><?php _e("Area de Estudio", "incluyeme-login-extension"); ?></label>
							<select id="studies" v-model="studies[pos]" data-live-search="true" data-container="body"
							        class="form-control selectpicker">
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
							<input type="text" v-model="titleEdu[pos]" class="form-control" id="titleEdu"
							       placeholder="Ejemplo: Licenciado en Adminsitración">
						</x-incluyeme>
					</div>
					<div class="row mt-2">
						<x-incluyeme class="col">
							<label for="eduLevel"><?php _e("Nivel Educativo", "incluyeme-login-extension"); ?></label>
							<input type="text" v-model="eduLevel[pos]" class="form-control" id="eduLevel"
							       placeholder="Ejemplo: Licenciatura">
						</x-incluyeme>
					</div>
					<div class="row mt-2">
						<x-incluyeme class="col-lg-6 col-md-12">
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
						<x-incluyeme class="col-lg-6 col-md-12">
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<label for="dateStudiesH"><?php _e("Hasta", "incluyeme-login-extension"); ?></label>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<input v-if="!dateStudieB[pos]" type="date" v-model="dateStudiesH[pos]"
										       name="dateStudiesH"
										       class="form-control"
										       id="dateStudiesH" :disabled="dateStudieB[pos]===true"
										       v-on:change='dateStudieB[pos] = false'>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12 ml-3 ml-sm-3 pt-1 ml-lg-1">
									<div class="container">
										<input class="form-check-input" type="checkbox"
										       style="transform: scale(1.4) !important;" :id="dateStudieB[pos]"
										       :name="dateStudieB[pos]"
										       v-model="dateStudieB[pos]" v-on:change='dateStudiesH[pos] = false'>
										<label class="form-check-label"
										       :for="dateStudieB[pos]"
										       style="color: black"><?php _e("¿En curso?", "incluyeme-login-extension"); ?></label>
									</div>
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
					</div>
					<div class='row mt-2'>
						<x-incluyeme class="col-12 text-right mr-0 pr-0">
							<button type="submit" class="btn btn-danger w-100 w-100 mt-3 deleteIncluyeme"
							        @click.prevent="deleteStudies(pos)">
								- Eliminar Estudios
							</button>
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
						<x-incluyeme class="col-lg-6 col-md-12">
							<label for="studies" class="">Area</label>
							<select id="studies" v-model="areaEmployed[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker">
								<option v-for="(estudies, index) of study"
								        :value="estudies.id" class="text-capitalize">
									{{estudies.name_inc_area}}
								</option>
							</select>
						</x-incluyeme>
						<x-incluyeme class="col-lg-6 col-md-12 mt-2 mt-lg-0">
							<label for="names">Puesto </label>
							<input v-model="jobs[pos]" type="text" class="form-control" id="names"
							       placeholder="Puesto">
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col-lg-6 col-md-12">
							<label for="levelExperience" class="">Nivel de Experiencia</label>
							<select id="levelExperience" v-model="levelExperience[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker">
								<option v-for="(experiences, index) of experiences"
								        :value="experiences.id" class="text-capitalize">
									{{experiences.name_incluyeme_exp}}
								</option>
							</select>
						</x-incluyeme>
						<x-incluyeme class="col-lg-6 col-md-12 ml-3 ml-sm-3 ml-lg-0" style="margin: auto; float: left;">
							<div style="position: relative;  top: 3px;">
								<input class="form-check-input" type="checkbox"
								       style="transform: scale(1.4) !important;"
								       :id="actuWork[pos]" :name="actuWork[pos]"
								       v-model="actuWork[pos]">
								<label class="form-check-label"
								       :for="actuWork[pos]"
								       style="color: black"><?php _e("¿Actualmente trabajas aquí?", "incluyeme-login-extension"); ?></label>
							</div>
						</x-incluyeme>
					</x-incluyeme>
					<div class="row mt-2">
						<x-incluyeme class="col-lg-6 col-md-12">
							<x-incluyeme class="row">
								<x-incluyeme class="col-12 pr-0">
									<x-incluyeme class="form-group">
										<label for="dateStudiesDLaboral"><?php _e("Desde", "incluyeme-login-extension"); ?></label>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12 pr-0">
									<x-incluyeme class="form-group">
										<input type="date" v-model="dateStudiesDLaboral[pos]"
										       name="dateStudiesDLaboral"
										       class="form-control"
										       id="dateStudiesDLaboral">
									</x-incluyeme>
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
						<x-incluyeme class="col-lg-6 col-md-12" v-if="!actuWork[pos]">
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<label for="dateStudiesHLaboral"><?php _e("Hasta", "incluyeme-login-extension"); ?></label>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<input type="date" v-model="dateStudiesHLaboral[pos]"
										       name="dateStudiesHLaboral"
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
					<div class="row mt-2">
						<x-incluyeme class="col text-center">
							<button type="submit" class="btn btn-danger w-100 w-100 mt-3 deleteIncluyeme"
							        @click.prevent="deleteExp(pos)">
								- Eliminar Experiencia
							</button>
						</x-incluyeme>
					</div>
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
							<select v-model="idioms[pos]" type="text" data-live-search="true" data-container="body"
							        class="form-control selectpicker" id="idioms"
							        placeholder="Idiomas">
								<option v-for="(idioms, index) of idiom"
								        :value="idioms.id" class="text-capitalize">
									{{idioms.name_idioms}}
								</option>
								<option value="Otro" class="text-capitalize">
									Otro
								</option>
							</select>
							<div class="pt-2">
								<input placeholder="Por favor, escriba el nombre del idioma" id="idioms"
								       v-model="idiomsOther[pos]" class="form-control" type="text"
								       v-if="idioms[pos] == 'Otro'">
							</div>
						</x-incluyeme>
					
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col">
							<label for="lecLevel" class="">Nivel de Lectura</label>
							<select id="lecLevel" v-model="lecLevel[pos]" data-live-search="true" data-container="body"
							        class="form-control selectpicker mt-2">
								<option v-for="(levels, index) of levels"
								        :value="levels.id" class="text-capitalize">
									{{levels.name_level}}
								</option>
							</select>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col">
							<label for="redLevel" class="">Nivel Escrito</label>
							<select id="redLevel" v-model="redLevel[pos]" data-live-search="true" data-container="body"
							        class="form-control selectpicker mt-2">
								<option v-for="(levels, index) of levels"
								        :value="levels.id" class="text-capitalize">
									{{levels.name_level}}
								</option>
							</select>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col">
							<label for="oralLevel" class="">Nivel Oral</label>
							<select id="oralLevel" v-model="oralLevel[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker mt-2">
								<option v-for="(levels, index) of levels"
								        :value="levels.id" class="text-capitalize">
									{{levels.name_level}}
								</option>
							</select>
						</x-incluyeme>
					</x-incluyeme>
					<div class='row mt-2'>
						<x-incluyeme class="col-12 text-right mr-0 pr-0">
							<button type="submit" class="btn btn-danger w-100 w-100 mt-3 deleteIncluyeme"
							        @click.prevent="deleteIdioms(pos)">
								- Eliminar Idiomas
							</button>
						</x-incluyeme>
					</div>
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
							<h1>¿En que área te gustaría trabajar?</h1>
							<select v-if="currentStep == 11" v-model="preferJobs" type="text" data-live-search="true"
							        data-container="body" class="form-control selectpicker" id="preferJobs">
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
					<div class="row">
						<div class="col text-center">
							<h1>¿Cómo conociste Incluyeme.com?</h1>
							<textarea placeholder="Cuéntanos como nos conociste" class="form-control"
							          id="meetingIncluyeme" v-model="meetingIncluyeme"
							          rows="3"></textarea>
						</div>
					</div>
				</div>
				<x-incluyeme class="row mt-2">
					<x-incluyeme class="col">
						<button type="submit" class="btn btn-info w-100"
						        @click.prevent="goToStep(13, '<?php echo plugins_url() ?>')">Finalizar
						</button>
					</x-incluyeme>
				</x-incluyeme>
			</template>
			<template id="step13" v-if="currentStep == 13">
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
		<h1 v-if="noDisPage!==false">Nos enfocamos en la inclusión de personas con disCapacidad</h1>
		<div class="container">
			<h5>Los campos marcados con un <span
						style="font-size: 2em;color: black;">* </span>
			    son obligatorios
			</h5>
		</div>
	</div>
</div>
<?php if (get_option($incluyemeLoginGoogle)) { ?>
	<script>
        function onSignIn(googleUser) {
            const profile = googleUser.getBasicProfile();
            app.$data.email = profile.getEmail();
            app.$data.password = profile.getEmail();
            app.$data.passwordConfirm = profile.getEmail();
            app.$data.name = profile.getGivenName();
            app.$data.lastName = profile.getFamilyName();
            app.googleChange('<?php echo plugins_url() ?>');
        }
	</script>

<?php } ?>

