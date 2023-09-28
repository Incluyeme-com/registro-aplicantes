<?php
$js  = plugins_url() . '/incluyeme-login-extension/include/assets/js/';
$img = plugins_url() . '/incluyeme-login-extension/include/assets/img/incluyeme-place.svg';
$css = plugins_url() . '/incluyeme-login-extension/include/assets/css/';
wp_register_script( 'popper', $js . 'popper.js', [ 'jquery' ], '1.0.0' );
wp_register_script( 'bootstrapJs', $js . 'bootstrap.min.js', [ 'jquery', 'popper' ], '1.0.0' );
wp_register_script( 'dropZ', $js . 'dropzone.min.js', [ 'jquery', 'popper' ], '1.0.0' );
wp_register_script( 'FAwesome', $js . 'fAwesome.js', [], '1.0.0', false );
wp_register_script( 'vueJS', $js . 'vueDEV.js', [ 'bootstrapJs' ], '1.0.0' );
wp_register_script( 'Axios', $js . 'axios.min.js', [], '2.0.0' );
wp_register_script( 'selectJS', $js . 'bootstrap-select.min.js', [ 'bootstrapJs' ], '2.0.0' );
wp_register_script( 'bootstrap-notify', $js . 'iziToast.js', [ 'bootstrapJs' ], '2.0.0' );
wp_register_script( 'defaults-es_ES', $js . 'defaults-es_ES.js', [ 'selectJS' ], '2.0.0' );
//wp_register_script('materializeJS', $js . 'materialize.min.js');

wp_register_style( 'bootstrap-css', $css . 'bootstrap.min.css', [], '1.0.0', false );
wp_register_style( 'bootstrap-notify-css', $css . 'iziToast.min.css', [], '1.0.0', false );
wp_register_style( 'dropzone-css', $css . 'dropzone.min.css', [], '1.0.0', false );
wp_register_style( 'selectB-css', $css . 'bootstrap-select.min.css', [ 'bootstrap-css' ], '1.0.0', false );

wp_enqueue_script( 'popper' );
wp_enqueue_script( 'bootstrapJs' );
wp_enqueue_script( 'vueJS' );
wp_enqueue_script( 'bootstrap-notify' );
wp_enqueue_script( 'vueH', $js . 'vue4.0.6.js', [ 'vueJS', 'FAwesome' ], date( "h:i:s" ), true );
wp_enqueue_script( 'dropZ' );
wp_enqueue_script( 'Axios' );
wp_enqueue_script( 'selectJS' );
wp_enqueue_script( 'defaults-es_ES' );
//wp_enqueue_script('materializeJS');

wp_enqueue_style( 'bootstrap-css' );
wp_enqueue_style( 'dropzone-css' );
wp_enqueue_style( 'bootstrap-notify-css' );
wp_enqueue_style( 'selectB-css' );
$baseurl                = wp_upload_dir();
$baseurl                = $baseurl['baseurl'];
$incluyemeNames         = 'incluyemeNamesCV';
$incluyemeLoginFB       = 'incluyemeLoginFB';
$incluyemeLoginGoogle   = 'incluyemeLoginGoogle';
$incluyemeLoginCountry  = 'incluyemeLoginCountry';
$incluyemeLoginEstado   = 'incluyemeLoginEstado';
$incluyemeGoogleAPI     = get_option( $incluyemeLoginGoogle );
$FBappId                = get_option( $incluyemeLoginFB );
$incluyemeLoginFBSECRET = 'incluyemeLoginFBSECRET';
$FBversion              = 'v7.0';
$defaultCheckTerminos   = 'defaultCheckTerminos';
?>
<?php if ( get_option( $incluyemeLoginGoogle ) ) { ?>
	<script src="https://apis.google.com/js/api:client.js"></script>
	<script>
        var googleUser = {};
        var startApp = function () {
            gapi.load('auth2', function () {
                // Retrieve the singleton for the GoogleAuth library and set up the client.
                auth2 = gapi.auth2.init({
                    client_id: '<?php echo get_option( $incluyemeLoginGoogle ); ?>',
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
                },
                function (error) {
                    alert(JSON.stringify(error, undefined, 2));
                });
        }
	</script>
<?php } ?>
<?php if ( get_option( $incluyemeLoginFB ) && get_option( $incluyemeLoginFBSECRET ) ) { ?>
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
                appId: '<?php echo get_option( $incluyemeLoginFB ); ?>',
                cookie: false,
                xfbml: false,
                version: 'v7.0'
            });

        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
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
            }, {
                scope: 'public_profile,email'
            });
        }
	</script>
<?php } ?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap");

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    small,
    label,
    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: "Montserrat", sans-serif !important;
    }

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

    input {
        accent-color: #278EFF !important;
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

    input[type=radio],
    input[type=checkbox] {
        transform: scale(1.4) !important;
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

    .btn-link {
        color: black !important;
    }

    .btn-link:hover,
    .btn-link:focus,
    .btn-link:active,
    .btn-link.active {
        background: none !important;
    }

    .btn-social-net {
        width: 230px;
        color: #24303f !important;
        background: #fff !important;
        border: 1px solid #24303f !important;
        border-radius: 10px !important;
        display: grid !important;
        grid-auto-flow: column !important;
        grid-template-columns: 50px 1fr 50px !important;
        align-items: center !important;
    }

    .btn-social-net > img {
        width: 48px;
    }

    .btn-social-net:hover,
    .btn-social-net:focus,
    .btn-social-net:active,
    .btn-social-net.active {
        background: #ececec !important;
    }

    .padding-container {
        padding-left: 6rem !important;
        padding-right: 6rem !important;
    }

    .padding-container-full {
        padding: 6rem !important;
    }

    .radius-btn {
        border-radius: 60px !important;
        padding: 10px 40px 10px 40px !important;
    }

    .text-error {
        color: #A90000 !important;
    }

    body:not(.et-tb) #main-content .container,
    body:not(.et-tb-has-header) #main-content .container {
        padding-top: 0 !important;
    }

    .stepper-wapper {
        display: grid;
        grid-template-columns: repeat(13, 1fr);
        grid-gap: 5px;
    }

    .stepper {
        background-color: #278EFF;
        height: 8px;
    }

    .active {
        background-color: #E1E1E1;
    }

    .disc-wrapper {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(5, auto);
        grid-gap: 12px 6px;
    }
</style>
<div class="container m-auto">
	<div id="incluyeme-login-wpjb">
		<div id="searchTOP"></div>
		<div v-if="noDisPage === false" class="container padding-container">
			<template v-if="currentStep != 1">
				<div class="stepper-wapper">
					<div v-for="i in 12" :key="i" class="text-center">
						<div class="stepper" :class="{ 'active': currentStep - 1 < i }">
						</div>
						<small v-if="i === 1 || i === 12">Paso {{i}}</small>
					</div>
				</div>
			</template>
			<template id="step1" v-if="currentStep == 1">
				<x-incluyeme class="container text-center">
					<h1 class="font-weight-bold">Regístrate</h1>
					<h5>Accede a oportunidades laborales para personas con disCAPACIDAD</h5>
				</x-incluyeme>
				<x-incluyeme class="row justify-content-center">
					<?php if ( get_option( $incluyemeLoginGoogle ) ) { ?>
						<x-incluyeme id='gSignInWrapper' class="col-4">
							<button id="customBtn" type="button" class="btn btn-social-net">
								<img src="<?php echo plugins_url() . '/incluyeme-login-extension/include/assets/img/logo-google.svg' ?>"
								     alt="visual" class="img-fluid">
								<span class="text-gray">Google</span>
							</button>
						</x-incluyeme>
					<?php } ?>
					<?php if ( get_option( $incluyemeLoginFB ) && get_option( $incluyemeLoginFBSECRET ) ) { ?>
						<x-incluyeme class="col-4">
							<button scope="public_profile,email" onclick="FBLogin()" class="btn btn-social-net">
								<img src="<?php echo plugins_url() . '/incluyeme-login-extension/include/assets/img/logo-facebook.svg' ?>"
								     alt="visual" class="img-fluid">
								<span class="text-gray">Facebook</span>
							</button>
						</x-incluyeme>
					<?php } ?>
				</x-incluyeme>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4">
					<h5 class="font-weight-bold">O regístrate con tu correo electrónico</h5>
				</x-incluyeme>
				<x-incluyeme class="row">
					<x-incluyeme class="form-group col-12">
						<label class="font-weight-bold" id="emilLabel" for="emil">Ingresa tu email*</label>
						<input type="email" v-model="email" class="form-control p-3"
						       style="background-color: #f9f9f9!important;" id="emil"
						       placeholder="por ejemplo: ejemplo@ejemplo.com">
						<small v-if="validation === 1" class="form-text text-error">Este email ya se encuentra
						                                                            registrado</small>
						<small v-if="validation === 2" class="form-text text-error">Por favor, ingrese un Email
						                                                            valido</small>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<label class="font-weight-bold" id="labelPassword4" for="inputPassword4">Elige una
						                                                                         contraseña*</label>
						<input type="password" v-model="password" class="form-control p-3"
						       style="background-color: #f9f9f9!important;" id="inputPassword4"
						       placeholder="Elige tu contraseña">
						<small v-if="validation === 3" class="form-text text-error">Su contraseña debe contener
						                                                            cinco(5) caracteres o
						                                                            mas</small>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<label class="font-weight-bold" id="repostPLabel" for="repostP">Repite tu
						                                                                contraseña*</label>
						<input type="password" v-model="passwordConfirm" class="form-control p-3"
						       style="background-color: #f9f9f9!important;" id="repostP"
						       placeholder="Repite tu contraseña">
						<small v-if="validation === 4" class="form-text text-error">Su contraseña no
						                                                            coincide</small>
					</x-incluyeme>
					<x-incluyeme class="form-group col-12">
						<x-incluyeme class="form-check">
							<input class="form-check-input" type="checkbox" value=""
							       v-model="defaultCheckDiscapacidad" id="defaultCheckDiscapacidad">
							<label id="defaultCheckDiscapacidadLabel" class="form-check-label ml-2"
							       for="defaultCheckDiscapacidad">Comprendo que me estoy registrando en una
							                                      plataforma para personas con discapacidad</label>
							<small v-if="validation === 'discapacidadTerms'" class="form-text text-error">¿Comprende
							                                                                              que <?php echo ucwords( $_SERVER['HTTP_HOST'] ) ?>
							                                                                              es una
							                                                                              plataforma
							                                                                              para <b>personas
							                                                                                      con
							                                                                                      discapacidad</b>?</small>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4">
						<button type="submit" class="btn btn-info radius-btn"
						        @click.prevent="goToStep(2, '<?php echo plugins_url() ?>')">Comenzar registro
						</button>
					</x-incluyeme>
				</x-incluyeme>
			</template>
			<template id="step2" v-if="currentStep == 2">
				<x-incluyeme class="container text-center">
					<h2 class="font-weight-bold">¿Cómo te llamas?</h2>
				</x-incluyeme>
				<x-incluyeme class="row">
					<x-incluyeme class="form-group col-6">
						<label class="font-weight-bold" id="nameLabel" for="names">Nombres*</label>
						<input v-model="name" type="text" class="form-control p-3"
						       style="background-color: #f9f9f9!important;" id="names"
						       placeholder="Ingresa tus nombres" onkeydown="return /[a-z, ]/i.test(event.key)">
						<small v-if="validation === 5" class="form-text text-error">Por favor, ingrese su
						                                                            nombre</small>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<label class="font-weight-bold" id="lastNamesLabel" for="lastNames">Apellidos*</label>
						<input v-model="lastName" type="text" class="form-control p-3"
						       style="background-color: #f9f9f9!important;" id="lastNames"
						       placeholder="Ingresa tus apellidos" onkeydown="return /[a-z, ]/i.test(event.key)">
						<small v-if="validation === 6" class="form-text text-error">Por favor, ingrese su
						                                                            apellido</small>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="container text-center">
					<h2 id="haveDiscap" class="font-weight-bold">¿Tienes algún tipo de disCapacidad?*</h2>
				</x-incluyeme>
				<x-incluyeme class="row">
					<x-incluyeme class="form-group col text-center">
						<x-incluyeme class="form-check form-check-inline">
							<input type="radio" name="disCap" id="disCap" v-on:click='disCap = true'
							       v-on:click='disClass = "w-50"' class="form-check-input">
							<label for="disCap" class="form-check-label">Tengo una disCapacidad</label>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="form-group col text-center">
						<x-incluyeme class="form-check form-check-inline">
							<input type="radio" id="disCapF" name="disCap" v-on:click='disCap = false'
							       v-on:click='disClass = "w-100"' class="form-check-input">
							<label class="form-check-label" for="disCapF">NO tengo una disCapacidad</label>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="form-group col-12 text-center">
						<small v-if="validation === 20" class="form-text text-error">Por favor, diganos si tiene una
						                                                             disCapacidad</small>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
				             style="gap: 12px">
					<button type="submit" class="btn btn-light radius-btn"
					        @click.prevent="goToStep(1, '<?php echo plugins_url() ?>')">
						Volver a la página anterior
					</button>
					<button type="submit" class="btn btn-info radius-btn"
					        @click.prevent="goToStep(3, '<?php echo plugins_url() ?>')">
						Avanzar a la siguiente pagina
					</button>
				</x-incluyeme>
			</template>
			<template id="step3" v-if="currentStep == 3">
				<x-incluyeme class="container text-center">
					<h2 class="font-weight-bold">Dinos tu género y fecha de nacimiento</h2>
				</x-incluyeme>
				<x-incluyeme class="row">
					<x-incluyeme class="form-group col-12">
						<label id="genreP" class="font-weight-bold">Género*</label>
						<x-incluyeme class="d-flex justify-content-between flex-fill">
							<x-incluyeme class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="inlineCheckbox1" value="Masculino"
								       v-model="genre">
								<label class="form-check-label" for="inlineCheckbox1"
								       style="color: black"><?php _e( "Masculino", "incluyeme-login-extension" ); ?></label>
							</x-incluyeme>
							<x-incluyeme class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="inlineCheckbox2"
								       name="inlineCheckbox1" value="Femenino" v-model="genre">
								<label class="form-check-label" for="inlineCheckbox2"
								       style="color: black"><?php _e( "Femenino", "incluyeme-login-extension" ); ?></label>
							</x-incluyeme>
							<x-incluyeme class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="inlineCheckbox3"
								       name="inlineCheckbox1" value="No Binario" v-model="genre">
								<label class="form-check-label" for="inlineCheckbox3"
								       style="color: black"><?php _e( "No Binario", "incluyeme-login-extension" ); ?></label>
							</x-incluyeme>
							<x-incluyeme class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="inlineCheckbox3"
								       name="inlineCheckbox1" value="Sin respuesta" v-model="genre">
								<label class="form-check-label" for="inlineCheckbox3"
								       style="color: black"><?php _e( "Prefiero no responder", "incluyeme-login-extension" ); ?></label>
							</x-incluyeme>
						</x-incluyeme>
						<small v-if="validation === 7" class="form-text text-error">Por favor, ingrese su
						                                                            genero</small>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<label id="labeldateBirthDay" for="dateBirthDay"
						       class="font-weight-bold"><?php _e( "Fecha de Nacimiento*", "incluyeme-login-extension" ); ?></label>
						<input type="date" v-model="dateBirthDay" name="dateBirthDay" class="form-control"
						       style="background-color: #f9f9f9!important;" id="dateBirthDay"
						       placeholder="Ingresa tus fecha de nacimiento">
						<small v-if="validation === 8" class="form-text text-error">Por favor, ingrese su fecha de
						                                                            nacimiento</small>
					</x-incluyeme>
					<x-incluyeme class="form-group col-6">
						<label for="country_nac"
						       class="font-weight-bold"><?php _e( "¿En qué país naciste?*", "incluyeme-login-extension" ); ?></label>
						<select id="country_nac" v-model="country_nac" data-live-search="true" data-container="body"
						        class="show-important form-control selectpicker" style="display: block !important;">
							<option v-for="(countries, index) of countries" :value="countries.country_name">
								{{countries.country_name}}
							</option>
						</select>
						<small v-if="validation === 3026" class="form-text text-error">Por favor, ingrese su país de
						                                                               nacimiento.</small>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme v-if="google==true||facebook==true" class="container text-center">
					<h1 id="haveDiscap">¿Tienes algún tipo de disCapacidad? <span
								style="font-size: 2em;color: black;">*<span>
					</h1>
				</x-incluyeme>
				<x-incluyeme v-if="google==true||facebook==true" class="row">
					<x-incluyeme class="form-group col">
						<x-incluyeme class="form-check form-check-inline">
							<input type="radio" name="disCap" id="disCap" v-on:click='disCap = true'
							       v-on:click='disClass = "w-50"' class="form-check-input">
							<label for="disCap" class="form-check-label">Tengo una disCapacidad</label>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="form-group col">
						<x-incluyeme class="form-check form-check-inline">
							<input type="radio" id="disCapF" name="disCap" v-on:click='disCap = false'
							       v-on:click='disClass = "w-100"' class="form-check-input">
							<label class="form-check-label" for="disCapF">NO tengo una disCapacidad</label>
						</x-incluyeme>
					</x-incluyeme>
					<small v-if="validation === 20" class="form-text text-error">Por favor, diganos si tiene una
					                                                             disCapacidad</small>
				</x-incluyeme>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
				             style="gap: 12px">
					<button type="submit" class="btn btn-light radius-btn"
					        @click.prevent="goToStep(2, '<?php echo plugins_url() ?>')">
						Volver a la página anterior
					</button>
					<button type="submit" class="btn btn-info radius-btn"
					        @click.prevent="goToStep(4, '<?php echo plugins_url() ?>')">
						Avanzar a la siguiente pagina
					</button>
				</x-incluyeme>
			</template>
			<template id="step4" v-if="currentStep == 4">
				<x-incluyeme class="container text-center">
					<h2 class="font-weight-bold">Datos de contacto</h2>
				</x-incluyeme>
				<x-incluyeme class="row">
					<x-incluyeme class="form-group col-sm-12 col-md-6">
						<label class="font-weight-bold"
						       for="mPhone"><?php _e( "Teléfono Celular*", "incluyeme-login-extension" ); ?></label>
						<x-incluyeme class="row">
							<x-incluyeme class="col-4">
								<input type="number" min='0' v-model="mPhone" class="form-control"
								       style="background-color: #f9f9f9!important;" id="mPhone"
								       placeholder="Cod. Area">
							</x-incluyeme>
							<x-incluyeme class="col-8">
								<input type="number" min='0' v-model="phone" class="form-control"
								       style="background-color: #f9f9f9!important;" id="phone"
								       placeholder="Teléfono Celular">
							</x-incluyeme>
						</x-incluyeme>
						<small v-if="validation === 9 || validation === 20" class="form-text text-error">Por favor,
						                                                                                 ingrese su
						                                                                                 Teléfono
						                                                                                 Celular.</small>
					</x-incluyeme>
					<x-incluyeme class="form-group col-sm-12 col-md-6">
						<label for="fPhone"
						       class="font-weight-bold"><?php _e( "Teléfono Fijo", "incluyeme-login-extension" ); ?></label>
						<x-incluyeme class="row">
							<x-incluyeme class="col-4">
								<input type="number" min='0' v-model="fPhone" class="form-control"
								       style="background-color: #f9f9f9!important;" id="fPhone"
								       placeholder="Cod. Area">
							</x-incluyeme>
							<x-incluyeme class="col-8">
								<input type="number" min='0' v-model="fiPhone" class="form-control"
								       style="background-color: #f9f9f9!important;" id="fiPhone"
								       placeholder="Teléfono Celular">
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
				</x-incluyeme>
				
				<?php if ( ! get_option( $incluyemeLoginCountry ) ) { ?>
					<x-incluyeme class="row">
						<x-incluyeme class="form-group col-sm-12 col-md-6">
							<label class="font-weight-bold" id="labelState"
							       for="state"><?php _e( ( get_option( $incluyemeLoginEstado ) ? get_option( $incluyemeLoginEstado ) : ' Provincia/Estado' ) . "*", "incluyeme-login-extension" ); ?></label>
							<input v-model="state" type="text" class="form-control p-3"
							       style="background-color: #f9f9f9!important;" id="state">
							<small v-if="validation === 10" class="form-text text-error">Por favor, ingrese
							                                                             su <?php ( get_option( $incluyemeLoginEstado ) ? get_option( $incluyemeLoginEstado ) : ' Provincia/Estado' ) ?></small>
						</x-incluyeme>
						<x-incluyeme class="form-group col-sm-12 col-md-6">
							<label id="labelCity" for="city"
							       class="font-weight-bold"><?php _e( "Ciudad*", "incluyeme-login-extension" ); ?></label>
							<input v-model="city" type="text" class="form-control p-3"
							       style="background-color: #f9f9f9!important;" id="city">
							<small v-if="validation === 11" class="form-text text-error">Por favor, ingrese su
							                                                             Ciudad</small>
						</x-incluyeme>
					</x-incluyeme>
				<?php } else { ?>
					<x-incluyeme class="row">
						<x-incluyeme class="form-group col-sm-12 col-md-6">
							<label id="labelState" for="state"
							       class="font-weight-bold"><?php _e( ( get_option( $incluyemeLoginEstado ) ? get_option( $incluyemeLoginEstado ) : ' Provincia/Estado' ) . "*", "incluyeme-login-extension" ); ?></label>
							<select v-model="state" type="text" data-live-search="true" data-container="body"
							        class="form-control selectpicker" id="state" v-on:change="getCities()">
								<option v-for="provincias in provincias" :value="provincias.cities_provin"
								        class="text-capitalize">
									{{provincias.cities_provin}}
								</option>
								<?php if ( get_option( $incluyemeLoginCountry ) !== 'AR' ) { ?>
									<option value="Otra">Otro</option>
								<?php } ?>
							</select>
							<x-incluyeme class="form-group col-12">
								<input type="text" v-if="showTextInputState" v-model="state"
								       class="form-control p-3" style="background-color: #f9f9f9!important;"
								       placeholder="OTRO">
							</x-incluyeme>
							<small v-if="validation === 10" class="form-text text-error">Por favor, ingrese
							                                                             su <?php ( get_option( $incluyemeLoginEstado ) ? get_option( $incluyemeLoginEstado ) : ' Provincia/Estado' ) ?></small>
						</x-incluyeme>
						<x-incluyeme class="form-group col-sm-12 col-md-6">
							<label id="labelCity" for="city"
							       class="font-weight-bold"><?php _e( "Ciudad*", "incluyeme-login-extension" ); ?></label>
							<select v-model="city" type="text" data-live-search="true" data-container="body"
							        class="form-control selectpicker" id="city">
								<option v-for="citiy in cities" v-bind:value="citiy.cities_name"
								        class="text-capitalize">
									{{citiy.cities_name}}
								</option>
								<option value="Otra">Otro</option>
							</select>
							<x-incluyeme class="form-group col-12">
								<input type="text" v-if="showTextInputCity" v-model="city" class="form-control p-3"
								       style="background-color: #f9f9f9!important;" placeholder="OTRO">
							</x-incluyeme>
							<small v-if="validation === 11" class="form-text text-error">Por favor, ingrese su
							                                                             Ciudad</small>
						</x-incluyeme>
					</x-incluyeme>
				<?php } ?>
				<x-incluyeme class="row">
					<x-incluyeme class="form-group col-12">
						<label id="livingZone" class="font-weight-bold">La zona donde vives ¿Es rural o
						                                                urbana?*</label>
						<x-incluyeme class="d-flex flex-fill">
							<x-incluyeme class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="inlineCheckbox1" value="Rural"
								       v-model="livingZone">
								<label class="form-check-label" for="inlineCheckbox1"
								       style="color: black"><?php _e( "Rural", "incluyeme-login-extension" ); ?></label>
							</x-incluyeme>
							<x-incluyeme class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="inlineCheckbox2"
								       name="inlineCheckbox1" value="Urbana" v-model="livingZone">
								<label class="form-check-label" for="inlineCheckbox2"
								       style="color: black"><?php _e( "Urbana", "incluyeme-login-extension" ); ?></label>
							</x-incluyeme>
						</x-incluyeme>
						<small v-if="validation === 25" class="form-text text-error">Por favor, coloque la zona
						                                                             donde vive.</small>
					</x-incluyeme>
				</x-incluyeme>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
				             style="gap: 12px">
					<button type="submit" class="btn btn-light radius-btn"
					        @click.prevent="goToStep(3, '<?php echo plugins_url() ?>')">
						Volver a la página anterior
					</button>
					<button type="submit" class="btn btn-info radius-btn"
					        @click.prevent="goToStep(5, '<?php echo plugins_url() ?>')">
						Avanzar a la siguiente pagina
					</button>
				</x-incluyeme>
			</template>
			<template id="step5" v-if="currentStep == 5">
				<x-incluyeme class="container text-center">
					<h2 v-if="disCap" id="disSelects" class="font-weight-bold">Indica cual es tu disCapacidad</h2>
				</x-incluyeme>
				<div class="container">
					<x-incluyeme v-if="disCap" class="row">
						<x-incluyeme class="form-group col-12">
							<label class="font-weight-bold" id="repostPLabel" for="repostP">Selecciona todas las que
							                                                                apliquen*</label>
							<x-incluyeme class="form-check">
								<x-incluyeme class="disc-wrapper">
									<x-incluyeme>
										<input class="form-check-input" type="checkbox" v-model="motriz"
										       id="Motriz">
										<label class="form-check-label" for="Motriz">
											Motriz
										</label>
									</x-incluyeme>
									<x-incluyeme>
										<input class="form-check-input" type="checkbox" v-model="visceral"
										       id="Visceral" name="Visceral">
										<label class="form-check-label" for="Visceral">
											Visceral
										</label>
									</x-incluyeme>
									<x-incluyeme>
										<input class="form-check-input" type="checkbox" v-model="auditiva"
										       id="Auditiva">
										<label class="form-check-label" for="Auditiva">
											Auditiva
										</label>
									</x-incluyeme>
									<x-incluyeme>
										<input class="form-check-input" type="checkbox" v-model="psiquica"
										       id="Psíquica">
										<label class="form-check-label" for="Psíquica">
											Psíquica
										</label>
									</x-incluyeme>
									<x-incluyeme>
										<input class="form-check-input" type="checkbox" v-model="visual"
										       id="Visual">
										<label class="form-check-label" for="Visual">
											Visual
										</label>
									</x-incluyeme>
									<x-incluyeme>
										<input class="form-check-input" type="checkbox" v-model="habla" id="Habla">
										<label class="form-check-label" for="Habla">
											Habla
										</label>
									</x-incluyeme>
									<x-incluyeme>
										<input class="form-check-input" type="checkbox" v-model="intelectual"
										       id="Intelectual">
										<label class="form-check-label" for="Intelectual">
											Intelectual
										</label>
									</x-incluyeme>
								</x-incluyeme>
							</x-incluyeme>
							<small v-if="validation === 12" class="form-text text-error">Por favor, dinos tu tipo de
							                                                             disCapacidad</small>
						</x-incluyeme>
					</x-incluyeme>
				</div>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
				             style="gap: 12px">
					<button v-if="disCap===true" type="submit" class="btn btn-light radius-btn"
					        @click.prevent="goToStep(4, '<?php echo plugins_url() ?>')">
						Volver a la página anterior
					</button>
					<!-- <button type="submit" //v-bind:class="[disClass]" class="btn btn-info radius-btn" @click.prevent="goToStep(disCap ? 6 : false)"> -->
					<button type="submit" class="btn btn-info radius-btn"
					        @click.prevent="goToStep(disCap ? 6 : false)">
						{{disCap ? 'Avanzar a la siguiente pagina' : 'Finalizar'}}
					</button>
				</x-incluyeme>
			</template>
			<template id="step6" v-if="currentStep == 6">
				<x-incluyeme class="container pt-5">
					<x-incluyeme class="row">
						<x-incluyeme class="col">
							<x-incluyeme id="accordion">
								<x-incluyeme v-if="motriz" class="card">
									<x-incluyeme class="card-header" id="headingOne">
										<h5 class="mb-0 p-0">
											<button class="btn btn-link btn-block text-left " data-toggle="collapse"
											        data-target="#collapseOne" aria-expanded="true"
											        aria-controls="collapseOne">
												<i class="fas fa-arrow-down"></i>
												<span> Motriz</span>
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
															<input class="form-check-input" type="radio" id="mPieS"
															       value="Si" v-model="mPie" name="mPie">
															<label class="form-check-label" for="mPieS"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mPie"
															       value="No" v-model="mPie" name="mPie">
															<label class="form-check-label" for="mPie"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Puedes mantenerte sentado/a? </span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mSenS"
															       value="Si" v-model="mSen" name="mSen">
															<label class="form-check-label" for="mSenS"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mSen"
															       value="No" v-model="mSen" name="mSen">
															<label class="form-check-label" for="mSen"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Puedes subir y bajar escaleras?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mEscaS"
															       value="Si" v-model="mEsca" name="mEsca">
															<label class="form-check-label" for="mEscaS"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mEsca"
															       value="No" v-model="mEsca" name="mEsca">
															<label class="form-check-label" for="mEsca"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Tienes movilidad en tus brazos?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="mBrazoS" value="Si" v-model="mBrazo"
															       name="mBrazo">
															<label class="form-check-label" for="mBrazoS"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mBrazo"
															       value="No" v-model="mBrazo" name="mBrazo">
															<label class="form-check-label" for="mBrazo"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Puedes tomar peso?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="peso"
															       value="No" v-model="peso" name="peso">
															<label class="form-check-label" for="peso"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="pesoKg"
															       value="Hasta 5 Kg" v-model="peso" name="peso">
															<label class="form-check-label" for="pesoKg"
															       style="color: black"><?php _e( "Hasta 5 Kg", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="peso10"
															       value="Hasta 10 Kg" v-model="peso" name="peso">
															<label class="form-check-label" for="peso10"
															       style="color: black"><?php _e( "Hasta 10 Kg", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="peso20"
															       value="Hasta 20 Kg" v-model="peso" name="peso">
															<label class="form-check-label" for="peso20"
															       style="color: black"><?php _e( "Hasta 20 Kg", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Utilizas silla de ruedas?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="mRuedaS" value="Si" v-model="mRueda"
															       name="mRueda">
															<label class="form-check-label" for="mRuedaS"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mRueda"
															       value="No" v-model="mRueda" name="mRueda">
															<label class="form-check-label" for="mRueda"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Utilizas ayudas técnicas para desplazarte?
															<x-incluyeme class="form-check form-check-inline">
																<input class="form-check-input" type="radio"
																       id="desplazarte" value="Bastón"
																       v-model="desplazarte" name="desplazarte">
																<label class="form-check-label" for="desplazarte"
																       style="color: black"><?php _e( "Bastón", "incluyeme-login-extension" ); ?></label>
															</x-incluyeme>
															<x-incluyeme class="form-check form-check-inline">
																<input class="form-check-input" type="radio"
																       id="Muletas" value="Muletas"
																       v-model="desplazarte" name="desplazarte">
																<label class="form-check-label" for="Muletas"
																       style="color: black"><?php _e( "Muletas", "incluyeme-login-extension" ); ?></label>
															</x-incluyeme>
															<x-incluyeme class="form-check form-check-inline">
																<input class="form-check-input" type="radio" id="Otros"
																       value="Otros" v-model="desplazarte"
																       name="desplazarte">
																<label class="form-check-label" for="Otros"
																       style="color: black"><?php _e( "Otros", "incluyeme-login-extension" ); ?></label>
															</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Puedes realizar tareas de precisión con tus manos, por ejemplo,
															digitación? </span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mDigiS"
															       value="Si" v-model="mDigi" name="mDigi">
															<label class="form-check-label" for="mDigiS"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="mDigi"
															       value="No" v-model="mDigi" name="mDigi">
															<label class="form-check-label" for="mDigi"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
												</x-incluyeme>
											</div>
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme v-if="visceral" class="card">
									<x-incluyeme class="card-header" id="headingTwo">
										<h5 class="mb-0 p-0">
											<button class="btn btn-link btn-block text-left collapsed"
											        data-toggle="collapse" data-target="#collapseTwo"
											        aria-expanded="false" aria-controls="collapseTwo">
												<i class="fas fa-arrow-down"></i>
												<span> Visceral</span>
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
															       id="vHumedos" value="Si" v-model="vHumedos"
															       name="vHumedos">
															<label class="form-check-label" for="vHumedos"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vHumedosS" value="No" v-model="vHumedos"
															       name="vHumedos">
															<label class="form-check-label" for="vHumedosS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Presentas alguna dificultad al trabajar en ambientes con alta o baja
															temperatura? </span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="vTemp"
															       value="Si" v-model="vTemp" name="vTemp">
															<label class="form-check-label" for="vTemp"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="vTempN"
															       value="No" v-model="vTemp" name="vTemp">
															<label class="form-check-label" for="vTempN"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Tienes dificultades para trabajar en ambientes con polvo?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="vPolvo"
															       value="Si" v-model="vPolvo" name="vPolvo">
															<label class="form-check-label" for="vPolvo"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vPolvov" value="No" v-model="vPolvo"
															       name="vPolvo">
															<label class="form-check-label" for="vPolvov"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Tienes la posibilidad de trabajar durante una jornada completa sin
															dificultad?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vCompleta" value="Si" v-model="vCompleta"
															       name="vCompleta">
															<label class="form-check-label" for="vCompleta"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vCompletaS" value="No" v-model="vCompleta"
															       name="vCompleta">
															<label class="form-check-label" for="vCompletaS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Requieres alguna adaptación para realizar tu trabajo?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="vAdap"
															       value="Jornada Parcial" v-model="vAdap"
															       name="vAdap">
															<label class="form-check-label" for="vAdap"
															       style="color: black"><?php _e( "Jornada parcial", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="vAdapS"
															       value="Turnos Fijos" v-model="vAdap"
															       name="vAdap">
															<label class="form-check-label" for="vAdapS"
															       style="color: black"><?php _e( "Turnos fijos", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vAdapAS"
															       value="Permisos para salidas medicas"
															       v-model="vAdap" name="vAdap">
															<label class="form-check-label" for="vAdapAS"
															       style="color: black"><?php _e( "Permiso para salidas médicas", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<div class="row">
																<div class="col-lg col-md-12">
																	<label class="form-check-label mr-2"
																	       style="color: black; font-weight: 400"
																	       for='vSalidas'><?php _e( "Otro", "incluyeme-login-extension" ); ?></label>
																</div>
																<div class="col-lg-12 col-md-12">
																	<input class="form-check-input" type="text"
																	       id="vSalidas" v-model="vAdap"
																	       name="vAdap" placeholder="Escribe aqui">
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
									<x-incluyeme class="card-header" id="headingThree">
										<h5 class="mb-0 p-0">
											<button class="btn btn-link btn-block text-left collapsed"
											        data-toggle="collapse" data-target="#collapseThree"
											        aria-expanded="false" aria-controls="collapseThree">
												<i class="fas fa-arrow-down"></i>
												<span> Auditiva</span>
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
															       id="aAmbient" value="Si" v-model="aAmbient"
															       name="aAmbient">
															<label class="form-check-label" for="aAmbient"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aAmbientS" value="No" v-model="aAmbient"
															       name="aAmbient">
															<label class="form-check-label" for="aAmbientS"
															       style="color: black"> <?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Utilizas lenguaje oral?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="aOral"
															       value="Si" v-model="aOral" name="aOral">
															<label class="form-check-label" for="aOral"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="aOralN"
															       value="No" v-model="aOral" name="aOral">
															<label class="form-check-label" for="aOralN"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Utilizas lengua de señas para comunicarte?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aSennas" value="Si" v-model="aSennas"
															       name="aSennas">
															<label class="form-check-label" for="aSennas"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aSennasS" value="No" v-model="aSennas"
															       name="aSennas">
															<label class="form-check-label" for="aSennasS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Puedes utilizar lectura labial?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aLabial" value="Si" v-model="aLabial"
															       name="aLabial">
															<label class="form-check-label" for="aLabial"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aLabialS" value="No" v-model="aLabial"
															       name="aLabial">
															<label class="form-check-label" for="aLabialS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿En un ambiente con distintas fuentes sonoras (por ejemplo: oficina) puedes establecer una comunicación oral fluida con otra persona?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="aBajo"
															       value="Si" v-model="aBajo" name="aBajo">
															<label class="form-check-label" for="aBajo"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio" id="aBajoS"
															       value="No" v-model="aBajo" name="aBajo">
															<label class="form-check-label" for="aBajoS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Puedes establecer una comunicación fluida vía telefónica?(sin uso de mensajería o chat)</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aFluida" value="Si" v-model="aFluida"
															       name="aFluida">
															<label class="form-check-label" for="aFluida"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aFluidaS" value="No" v-model="aFluida"
															       name="aFluida">
															<label class="form-check-label" for="aFluidaS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Utilizas alguna ayuda técnica?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aImplante" value="Implante"
															       v-model="aImplante" name="aImplante">
															<label class="form-check-label" for="aImplante"
															       style="color: black"><?php _e( "Implante", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="aImplantes" value="Audífonos"
															       v-model="aImplante" name="aImplante">
															<label class="form-check-label" for="aImplantes"
															       style="color: black"><?php _e( "Audífonos", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<label class="form-check-label mr-2"
															       style="color: black; font-weight: 400"
															       for="aImplantesText"><?php _e( "Otro", "incluyeme-login-extension" ); ?></label>
															<input class="form-check-input" type="text"
															       id="aImplantesText" v-model="aImplante"
															       name="aImplante" placeholder="">
														</x-incluyeme>
													</x-incluyeme>
												</x-incluyeme>
											</div>
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme v-if='visual' class="card">
									<x-incluyeme class="card-header" id="headingFive">
										<h5 class="mb-0 p-0">
											<button class="btn btn-link btn-block text-left collapsed"
											        data-toggle="collapse" data-target="#collapseFive"
											        aria-expanded="false" aria-controls="collapseFive">
												<i class="fas fa-arrow-down"></i>
												<span> Visual</span>
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
															<input class="form-check-input" type="radio" id="vLejos"
															       value="Si" v-model="vLejos" name="vLejos">
															<label class="form-check-label" for="vLejos"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vLejosS" value="No" v-model="vLejos"
															       name="vLejos">
															<label class="form-check-label" for="vLejosS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Tienes dificultades en distinguir objetos o textos a una distancia próxima?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vObservar" value="Si" v-model="vObservar"
															       name="vObservar">
															<label class="form-check-label" for="vObservar"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vObservarS" value="No" v-model="vObservar"
															       name="vObservar">
															<label class="form-check-label" for="vObservarS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Discriminas colores?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vColores" value="Si" v-model="vColores"
															       name="vColores">
															<label class="form-check-label" for="vColores"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vColoresS" value="No" v-model="vColores"
															       name="vColores">
															<label class="form-check-label" for="vColoresS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Puede identificar elementos visuales que se encuentren en
															distintos planos, por ejemplo: adelante o atrás (perspectiva)?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vDPlanos" value="Si" v-model="vDPlanos"
															       name="vDPlanos">
															<label class="form-check-label" for="vDPlanos"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vDPlanos" value="No" v-model="vDPlanos"
															       name="vDPlanos">
															<label class="form-check-label" for="vDPlanosS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Utilizas alguna ayuda técnica?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vTecniA"
															       value="Lectores de pantalla como Jaws o Lupa"
															       v-model="vTecniA" name="vTecniA">
															<label class="form-check-label" for="vTecniA"
															       style="color: black"><?php _e( "Lectores de pantalla como Jaws o Lupa", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vTecniAS" value="Aumentadores de letras"
															       v-model="vTecniA" name="vTecniA">
															<label class="form-check-label" for="vTecniAS"
															       style="color: black"><?php _e( "Aumentadores de letras", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="vTecniASS" value="Anteojos" v-model="vTecniA"
															       name="vTecniAS">
															<label class="form-check-label" for="vTecniASS"
															       style="color: black"><?php _e( "Anteojos", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<div class="row">
																<div class="col-lg col-md-12">
																	<label class="form-check-label mr-2"
																	       style="color: black; font-weight: 400"
																	       for="vTecniAvAS"><?php _e( "Otro", "incluyeme-login-extension" ); ?></label>
																</div>
																<div class="col-lg-12 col-md-12">
																	<input class="form-check-input" type="text"
																	       id="vTecniAvAS" v-model="vTecniA"
																	       name="vTecniAvAS"
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
									<x-incluyeme class="card-header" id="headingFourt">
										<h5 class="mb-0 p-0">
											<button class="btn btn-link btn-block text-left collapsed"
											        data-toggle="collapse" data-target="#collatseFourt"
											        aria-expanded="false" aria-controls="collatseFourt">
												<i class="fas fa-arrow-down"></i>
												<span> Intelectual</span>
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
															       id="inteEscri" value="Si" v-model="inteEscri"
															       name="inteEscri">
															<label class="form-check-label" for="inteEscri"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteEscriS" value="No" v-model="inteEscri"
															       name="inteEscri">
															<label class="form-check-label" for="inteEscriS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Usas el transporte público como bus, micro, metro, combi, subte, tren, etc.?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTransla" value="Si" v-model="inteTransla"
															       name="inteTransla">
															<label class="form-check-label" for="inteTransla"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTranslaS" value="No"
															       v-model="inteTransla" name="inteTransla">
															<label class="form-check-label" for="inteTranslaS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Cuando te equivocas te enoja que te lo digan?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteActividad" value="Si"
															       v-model="inteActividad" name="inteActividad">
															<label class="form-check-label" for="inteActividad"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteActividadS" value="No"
															       v-model="inteActividad" name="inteActividad">
															<label class="form-check-label" for="inteActividadS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿ Te enoja si en tu trabajo te cambian las tareas?</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteMolesto" value="Si" v-model="inteMolesto"
															       name="inteMolesto">
															<label class="form-check-label" for="inteMolesto"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteMolestoS" value="No"
															       v-model="inteMolesto" name="inteMolesto">
															<label class="form-check-label" for="inteMolestoS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Te gusta trabajar solo?</span>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTrabajar" value="Si"
															       v-model="inteTrabajar" name="inteTrabajar">
															<label class="form-check-label" for="inteTrabajar"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTrabajarS" value="No"
															       v-model="inteTrabajar" name="inteTrabajar">
															<label class="form-check-label" for="inteTrabajarS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>¿Te gusta trabajar con otras personas?</span>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTrabajarOP" value="Si"
															       v-model="inteTrabajarOP" name="inteTrabajarOP">
															<label class="form-check-label" for="inteTrabajarOP"
															       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTrabajarOPS" value="No"
															       v-model="inteTrabajarOP" name="inteTrabajarOP">
															<label class="form-check-label" for="inteTrabajarOPS"
															       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
													<x-incluyeme class="col-12">
														<span>Prefieres trabajar en: ¿Dónde te gusta trabajar más?
														</span><br>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTrabajarSolo"
															       value="Lugares cerrados (por ejemplo oficinas)"
															       v-model="inteTrabajarSolo"
															       name="inteTrabajarSolo">
															<label class="form-check-label" for="inteTrabajarSolo"
															       style="color: black"><?php _e( "Lugares cerrados (por ejemplo oficinas)", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTrabajarSoloS"
															       value="Ambientes exteriores (por ejemplo jardines, parques, centros deportivos, otros)"
															       v-model="inteTrabajarSolo"
															       name="inteTrabajarSolo">
															<label class="form-check-label" for="inteTrabajarSoloS"
															       style="color: black"><?php _e( "Ambientes exteriores (por ejemplo jardines, parques, centros deportivos, otros)", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
														<x-incluyeme class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
															       id="inteTrabajarSoloS2"
															       value="Me da lo mismo o no lo sé"
															       v-model="inteTrabajarSolo"
															       name="inteTrabajarSolo">
															<label class="form-check-label" for="inteTrabajarSoloS2"
															       style="color: black"><?php _e( "Me da lo mismo o no lo sé", "incluyeme-login-extension" ); ?></label>
														</x-incluyeme>
													</x-incluyeme>
												</x-incluyeme>
											</div>
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
					</x-incluyeme>
					
					<x-incluyeme v-if="motriz || visceral || auditiva || visual || intelectual" class="row">
						<x-incluyeme class="col">
							<h6 class="mt-2">No es necesario responder todas las preguntas listadas arriba</h6>
						</x-incluyeme>
					</x-incluyeme>
					
					<x-incluyeme class=" row">
						<x-incluyeme class="col">
							<label id="disCText" class="font-weight-bold" for="exampleFormControlTextarea1">Por
							                                                                                favor
							                                                                                cuéntanos
							                                                                                más
							                                                                                sobre tu
							                                                                                discapacidad
							                                                                                y todo
							                                                                                lo que
							                                                                                quieras
							                                                                                agregar
							                                                                                para
							                                                                                conocerte
							                                                                                más*</label>
							<textarea class="form-control" style="background-color: #f9f9f9!important;"
							          id="exampleFormControlTextarea1" v-model="moreDis" rows="3"></textarea>
							<small v-if="validation === 11" class="form-text text-error">Por favor, cuentanos mas
							                                                             sobre tu
							                                                             disCapacidad</small>
						</x-incluyeme>
					</x-incluyeme>
					
					<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
					             style="gap: 12px">
						<button type="submit" class="btn btn-light radius-btn"
						        @click.prevent="goToStep(5, '<?php echo plugins_url() ?>')">
							Volver a la página anterior
						</button>
						<button type="submit" class="btn btn-info radius-btn"
						        @click.prevent="goToStep(7, '<?php echo plugins_url() ?>')">
							Avanzar a la siguiente pagina
						</button>
					</x-incluyeme>
				</x-incluyeme>
			</template>
			<template id="step7" v-if="currentStep == 7">
				<x-incluyeme class="container text-center">
					<h2 class="font-weight-bold">Adjunta tu CV
					                             y <?php echo get_option( $incluyemeNames ) ? ' ' . get_option( $incluyemeNames ) : ' Certificado Único de Discapacidad'; ?> </h2>
					<h6 class="text-error">Formatos permitidos: PDF, PNG, JPG, Word</h6>
				</x-incluyeme>
				<div class="container">
					<div class="row">
						<div class="col">
							<h4 id="dropZoneCVLabel">Curriculum Vitae</h4>
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<form action="/upload" class="dropzone needsclick dz-clickable" id="CVDROP">
										<div class="dz-message needsclick">
											<button type="button" class="dz-button">Suelta tus archivos aquí O haz
											                                        click
											</button>
											<br>
										</div>
									</form>
								</x-incluyeme>
							</x-incluyeme>
						</div>
					</div>
					<div class="row pt-4">
						<div class="col">
							<h4 id="OptionCVLabel">
								¿Posee <?php echo get_option( $incluyemeNames ) ? get_option( $incluyemeNames ) : 'Certificado Único de Discapacidad'; ?>
								*?</h4>
							<small v-if="validation === 29" class="form-text text-error">Por favor, dinos si cuentas con
							                                                             certificado.</small>
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<x-incluyeme class="d-flex flex-fill">
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="cudOption"
											       value="Si"
											       v-model="cudOption">
											<label class="form-check-label" for="cudOption"
											       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
										</x-incluyeme>
										<x-incluyeme class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="cudOption2"
											       name="inlineCheckbox1" value="No" v-model="cudOption">
											<label class="form-check-label" for="cudOption2"
											       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
										</x-incluyeme>
									</x-incluyeme>
								</x-incluyeme>
							</x-incluyeme>
						</div>
					</div>
					<div class="row">
						<div class="col mt-4">
							<h4 id="drop-zoneCUDLabel"><?php echo get_option( $incluyemeNames ) ? get_option( $incluyemeNames ) : 'Certificado Único de Discapacidad'; ?></h4>
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<form action="/upload" class="dropzone needsclick dz-clickable"
									      id="CUDDROP">
										<div class="dz-message needsclick">
											<button type="button" class="dz-button">Suelta tus archivos aquí O
											                                        haz click
											</button>
											<br>
										</div>
									</form>
								</x-incluyeme>
							</x-incluyeme>
						</div>
					</div>
				</div>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
				             style="gap: 12px">
					<button type="submit" class="btn btn-light radius-btn"
					        @click.prevent="goToStep(6, '<?php echo plugins_url() ?>')">
						Volver a la página anterior
					</button>
					<button type="submit" class="btn btn-info radius-btn"
					        @click.prevent="goToStep(8, '<?php echo plugins_url() ?>')">
						Avanzar a la siguiente pagina
					</button>
				</x-incluyeme>
			</template>
			<template id="step8" v-if="currentStep == 8">
				<x-incluyeme class="container text-center">
					<h2 class="font-weight-bold">Educación</h2>
				</x-incluyeme>
				<x-incluyeme class="container">
					<div class="row">
						<x-incluyeme class="col">
							<label for="edu_levelMax" id="edu_levelMaxText"
							       class="font-weight-bold"><?php _e( "¿Cuál es tu nivel máximo de estudios alcanzado?*", "incluyeme-login-extension" ); ?></label>
							<select id="edu_levelMax" v-model="edu_levelMaxSec" data-live-search="true"
							        data-container="body" class="form-control selectpicker">
								<option v-for="level in edu_levelMax" :value="level">
									{{level}}
								</option>
							</select>
							<small v-if="validation === 26" class="form-text text-error">Por favor, cuéntanos más
							                                                             sobre tu educación.</small>
						</x-incluyeme>
					</div>
				</x-incluyeme>
				<x-incluyeme v-for="(fieldName, pos) in formFields" :key="pos" class="container">
					<div class="row">
						<x-incluyeme class="col">
							<label for="country_edu"
							       class="font-weight-bold"><?php _e( "Pais", "incluyeme-login-extension" ); ?></label>
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
							<label for="university_edu"
							       class="font-weight-bold"><?php _e( "Institución Educativa", "incluyeme-login-extension" ); ?></label>
							<select id="university_edu" v-model="university_edu[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker">
								<option v-for="university in universities[pos]" :value="university.university"
								        v-on:change="changeUniversity(pos, true)">
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
							<label for="university_eduText"
							       class="font-weight-bold"><?php _e( "Otro", "incluyeme-login-extension" ); ?></label>
							<input type="text" v-model="university_otro[pos]" class="form-control p-3"
							       style="background-color: #f9f9f9!important;" id="university_eduText"
							       placeholder="Institución" v-on:change="changeUniversity(pos, false)">
							<small>Escriba el nombre de su Institución Educativa si no aparece en el listado</small>
						</x-incluyeme>
					</div>
					<div class="row mt-2">
						<x-incluyeme class="col">
							<label for="studies"
							       class="font-weight-bold"><?php _e( "Area de Estudio", "incluyeme-login-extension" ); ?></label>
							<select id="studies" v-model="studies[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker">
								<option v-for="(studies, index) of study" :value="studies.id"
								        class="text-capitalize">
									{{studies.name_inc_area}}
								</option>
							</select>
						</x-incluyeme>
					</div>
					<div class="row mt-2">
						<x-incluyeme class="col">
							<label for="titleEdu"
							       class="font-weight-bold"><?php _e( "Título", "incluyeme-login-extension" ); ?></label>
							<input type="text" v-model="titleEdu[pos]" class="form-control p-3"
							       style="background-color: #f9f9f9!important;" id="titleEdu"
							       placeholder="Ejemplo: Licenciado en Adminsitración">
						</x-incluyeme>
					</div>
					<div class="row mt-2">
						<x-incluyeme class="col">
							<label for="eduLevel"
							       class="font-weight-bold"><?php _e( "Nivel Educativo", "incluyeme-login-extension" ); ?></label>
							<input type="text" v-model="eduLevel[pos]" class="form-control p-3"
							       style="background-color: #f9f9f9!important;" id="eduLevel"
							       placeholder="Ejemplo: Licenciatura">
						</x-incluyeme>
					</div>
					<div class="row mt-2">
						<x-incluyeme class="col-lg-6 col-md-12">
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<label for="dateStudiesD"
										       class="font-weight-bold"><?php _e( "Desde", "incluyeme-login-extension" ); ?></label>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<input type="date" v-model="dateStudiesD[pos]" name="dateStudiesD"
										       class="form-control" style="background-color: #f9f9f9!important;"
										       id="dateStudiesD">
									</x-incluyeme>
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
						<x-incluyeme class="col-lg-6 col-md-12">
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<label for="dateStudiesH"
										       class="font-weight-bold"><?php _e( "Hasta", "incluyeme-login-extension" ); ?></label>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<input v-if="!dateStudieB[pos]" type="date" v-model="dateStudiesH[pos]"
										       name="dateStudiesH" class="form-control p-3"
										       style="background-color: #f9f9f9!important;" id="dateStudiesH"
										       :disabled="dateStudieB[pos]===true"
										       v-on:change='dateStudieB[pos] = false'>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12 ml-3 ml-sm-3 pt-1 ml-lg-1">
									<div class="container">
										<input class="form-check-input" type="checkbox" :id="dateStudieB[pos]"
										       :name="dateStudieB[pos]" v-model="dateStudieB[pos]"
										       v-on:change='dateStudiesH[pos] = false'>
										<label class="form-check-label" :for="dateStudieB[pos]"
										       style="color: black"><?php _e( "¿En curso?", "incluyeme-login-extension" ); ?></label>
									</div>
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
					</div>
					<div class='row mt-2'>
						<x-incluyeme class="col">
							<button type="submit" class="btn btn-danger w-100 w-100 mt-3 deleteIncluyeme"
							        @click.prevent="deleteStudies(pos)">
								- Eliminar Estudios
							</button>
						</x-incluyeme>
					</div>
					<hr class="w-100" v-if="formFields.length !== 1">
				</x-incluyeme>
				<x-incluyeme class="container">
					<div class="row">
						<x-incluyeme class="col text-center">
							<button type="submit" class="btn btn-info w-100 w-100" @click.prevent="addStudies()">
								+ Agregar Estudios
							</button>
						</x-incluyeme>
					</div>
					<div class="row">
						<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
						             style="gap: 12px">
							<button type="submit" class="btn btn-light radius-btn"
							        @click.prevent="goToStep(7, '<?php echo plugins_url() ?>')">
								Volver a la página anterior
							</button>
							<button type="submit" class="btn btn-info radius-btn"
							        @click.prevent="goToStep(9, '<?php echo plugins_url() ?>')">
								Avanzar a la siguiente pagina
							</button>
						</x-incluyeme>
					</div>
			</template>
			<template id="step9" v-if="currentStep == 9">
				<x-incluyeme class="container text-center">
					<h2 class="font-weight-bold">Experiencia Laboral</h2>
				</x-incluyeme>
				<div class="container" v-for="(formFields2, pos) in formFields2" :key="pos">
					<x-incluyeme class="row">
						<x-incluyeme class="col">
							<label for="companies" class="font-weight-bold">Empresa</label>
							<input v-model="employed[pos]" type="text" class="form-control p-3"
							       style="background-color: #f9f9f9!important;" id="companies"
							       placeholder="Empresa">
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col-lg-6 col-md-12 form-group">
							<label for="studies" class="font-weight-bold">Area</label>
							<select id="studies" v-model="areaEmployed[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker">
								<option v-for="(estudies, index) of study" :value="estudies.id"
								        class="text-capitalize">
									{{estudies.name_inc_area}}
								</option>
							</select>
						</x-incluyeme>
						<x-incluyeme class="col-lg-6 col-md-12 form-group">
							<label for="names" class="font-weight-bold">Puesto </label>
							<input v-model="jobs[pos]" type="text" class="form-control p-3"
							       style="background-color: #f9f9f9!important;" id="names" placeholder="Puesto">
						</x-incluyeme>
						<x-incluyeme class="col-lg-6 col-md-12 form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" :id="actuWork[pos]"
								       :name="actuWork[pos]" v-model="actuWork[pos]">
								<label class="form-check-label"
								       :for="actuWork[pos]"><?php _e( "¿Actualmente trabajas aquí?", "incluyeme-login-extension" ); ?></label>
							</div>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col-lg-6 col-md-12 form-group">
							<label for="levelExperience" class="font-weight-bold">Nivel de Experiencia</label>
							<select id="levelExperience" v-model="levelExperience[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker">
								<option v-for="(experiences, index) of experiences" :value="experiences.id"
								        class="text-capitalize">
									{{experiences.name_incluyeme_exp}}
								</option>
							</select>
						</x-incluyeme>
					</x-incluyeme>
					<div class="row mt-2">
						<x-incluyeme class="col-lg-6 col-md-12">
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<label for="dateStudiesDLaboral"
										       class="font-weight-bold"><?php _e( "Desde", "incluyeme-login-extension" ); ?></label>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<input type="date" v-model="dateStudiesDLaboral[pos]"
										       name="dateStudiesDLaboral" class="form-control"
										       style="background-color: #f9f9f9!important;"
										       id="dateStudiesDLaboral">
									</x-incluyeme>
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
						<x-incluyeme class="col-lg-6 col-md-12" v-if="!actuWork[pos]">
							<x-incluyeme class="row">
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<label for="dateStudiesHLaboral"
										       class="font-weight-bold"><?php _e( "Hasta", "incluyeme-login-extension" ); ?></label>
									</x-incluyeme>
								</x-incluyeme>
								<x-incluyeme class="col-12">
									<x-incluyeme class="form-group">
										<input type="date" v-model="dateStudiesHLaboral[pos]"
										       name="dateStudiesHLaboral" class="form-control"
										       style="background-color: #f9f9f9!important;" id="dateStudiesHLaboral"
										       :disabled="actuWork[pos]===true">
									</x-incluyeme>
								</x-incluyeme>
							</x-incluyeme>
						</x-incluyeme>
					</div>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col-12">
							<label for="jobsDescript" class="font-weight-bold">Descripción del Puesto</label>
							<textarea class="form-control" style="background-color: #f9f9f9!important;"
							          id="jobsDescript" v-model="jobsDescript[pos]" rows="3"></textarea>
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
							<button type="submit" class="btn btn-info w-100 w-100" @click.prevent="addExp()">
								+ Agregar Experiencia
							</button>
						</x-incluyeme>
				</div>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
				             style="gap: 12px">
					<button type="submit" class="btn btn-light radius-btn"
					        @click.prevent="goToStep(8, '<?php echo plugins_url() ?>')">
						Volver a la página anterior
					</button>
					<button type="submit" class="btn btn-info radius-btn"
					        @click.prevent="goToStep(10, '<?php echo plugins_url() ?>')">
						Avanzar a la siguiente pagina
					</button>
				</x-incluyeme>
			</template>
			<template id="step10" v-if="currentStep == 10">
				<x-incluyeme class="container text-center">
					<h2 class="font-weight-bold">Idiomas</h2>
				</x-incluyeme>
				<div class="container" v-for="(formFields3, pos) in formFields3" :key="pos">
					<x-incluyeme class="row">
						<x-incluyeme class="col">
							<label for="idioms" class="font-weight-bold">Idioma</label>
							<select v-model="idioms[pos]" type="text" data-live-search="true" data-container="body"
							        class="form-control selectpicker" id="idioms" placeholder="Idiomas">
								<option v-for="(idioms, index) of idiom" :value="idioms.id" class="text-capitalize">
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
							<label for="lecLevel" class="font-weight-bold">Nivel de Lectura</label>
							<select id="lecLevel" v-model="lecLevel[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker mt-2">
								<option v-for="(levels, index) of levels" :value="levels.id"
								        class="text-capitalize">
									{{levels.name_level}}
								</option>
							</select>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col">
							<label for="redLevel" class="font-weight-bold">Nivel Escrito</label>
							<select id="redLevel" v-model="redLevel[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker mt-2">
								<option v-for="(levels, index) of levels" :value="levels.id"
								        class="text-capitalize">
									{{levels.name_level}}
								</option>
							</select>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col">
							<label for="oralLevel" class="font-weight-bold">Nivel Oral</label>
							<select id="oralLevel" v-model="oralLevel[pos]" data-live-search="true"
							        data-container="body" class="form-control selectpicker mt-2">
								<option v-for="(levels, index) of levels" :value="levels.id"
								        class="text-capitalize">
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
							<button type="submit" class="btn btn-info w-100 w-100" @click.prevent="addIdioms()">
								+ Agregar Idioma
							</button>
						</x-incluyeme>
				</div>
				<div class="row">
					<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
					             style="gap: 12px">
						<button type="submit" class="btn btn-light radius-btn"
						        @click.prevent="goToStep(9, '<?php echo plugins_url() ?>')">
							Volver a la página anterior
						</button>
						<button type="submit" class="btn btn-info radius-btn"
						        @click.prevent="goToStep(11, '<?php echo plugins_url() ?>')">
							Avanzar a la siguiente pagina
						</button>
					</x-incluyeme>
				</div>
			</template>
			<template id="step11" v-if="currentStep == 11">
				<x-incluyeme class="container text-center">
					<h2 class="font-weight-bold">¿En que área te gustaría trabajar?</h2>
				</x-incluyeme>
				<div class="container">
					<x-incluyeme class="row">
						<x-incluyeme class="col-12 form-group">
							<select v-if="currentStep == 11" v-model="preferJobs" type="text"
							        data-live-search="true" data-container="body" class="form-control selectpicker"
							        id="preferJobs">
								<option v-for="(preferJobs, index) of preferJob" :value="preferJobs.id"
								        class="text-capitalize">
									{{preferJobs.jobs_prefers}}
								</option>
							</select>
						</x-incluyeme>
						<x-incluyeme class="col-12 form-group">
							<div class="row">
								<div class="col-12">
									<label class="font-weight-bold" id="workingNowText">¿Actualmente tienes
									                                                    trabajo?*<label>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<x-incluyeme class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="workingNow"
										       name="workingNow1" value="Si" v-model="workingNow">
										<label class="form-check-label" for="workingNow"
										       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
									</x-incluyeme>
									<x-incluyeme class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="workingNow1"
										       name="workingNow1" value="No" v-model="workingNow">
										<label class="form-check-label" for="workingNow1"
										       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
									</x-incluyeme>
									<small v-if="validation === 27" class="form-text text-error">¿Actualmente tienes
									                                                             trabajo?</small>
								</div>
							</div>
						</x-incluyeme>
						<x-incluyeme class="col-12 form-group">
							<div class="row">
								<div class="col-12">
									<label id="workingSearchText" class="font-weight-bold">¿Te encuentras en
									                                                       busqueda laboral
									                                                       activa?*</label>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<x-incluyeme class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="workingSearch2"
										       name="workingSearch" value="Si" v-model="workingSearch">
										<label class="form-check-label" for="workingSearch2"
										       style="color: black"><?php _e( "Si", "incluyeme-login-extension" ); ?></label>
									</x-incluyeme>
									<x-incluyeme class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="workingSearch"
										       name="workingSearch" value="No" v-model="workingSearch">
										<label class="form-check-label" for="workingSearch"
										       style="color: black"><?php _e( "No", "incluyeme-login-extension" ); ?></label>
									</x-incluyeme>
									<small v-if="validation === 28" class="form-text text-error">¿Te encuentras en
									                                                             busqueda laboral
									                                                             activa?</small>
								</div>
							</div>
						</x-incluyeme>
					</x-incluyeme>
				</div>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
				             style="gap: 12px">
					<button type="submit" class="btn btn-light radius-btn"
					        @click.prevent="goToStep(10, '<?php echo plugins_url() ?>')">
						Volver a la página anterior
					</button>
					<button type="submit" class="btn btn-info radius-btn"
					        @click.prevent="goToStep(12, '<?php echo plugins_url() ?>')">
						Avanzar a la siguiente pagina
					</button>
				</x-incluyeme>
			</template>
			<template id="step12" v-if="currentStep == 12">
				<div class="container">
					<div class="row">
						<div class="col text-center">
							<x-incluyeme class="container text-center">
								<h2 class="font-weight-bold" id="meetingIncluyemeText">¿Cómo conociste
								                                                       Incluyeme.com?</h2>
							</x-incluyeme>
							<x-incluyeme class="col">
								<label style="display: none" id="meetingIncluyemeText">¿Cómo conociste
								                                                       Incluyeme.com?</label>
								<select id="meetingIncluyeme" v-model="meetingIncluyeme" data-live-search="true"
								        data-container="body" class="show-important form-control selectpicker"
								        style="display: block !important;">
									<option v-for="level in meetingIncluyemeOptions" :value="level">
										{{level}}
									</option>
								</select>
								<small v-if="validation === 29" class="form-text text-error">Por favor, dinos como
								                                                             conociste a
								                                                             incluyeme.</small>
							</x-incluyeme>
						</div>
					</div>
				</div>
				<x-incluyeme class="d-flex flex-fill justify-content-center align-items-center p-4"
				             style="gap: 12px">
					<button type="submit" class="btn btn-light radius-btn"
					        @click.prevent="goToStep(11, '<?php echo plugins_url() ?>')">
						Volver a la página anterior
					</button>
					<button type="submit" class="btn btn-info radius-btn"
					        @click.prevent="goToStep(13, '<?php echo plugins_url() ?>')">
						Finalizar
					</button>
				</x-incluyeme>
			</template>
			<template id="step13" v-if="currentStep == 13">
				<div class="container">
					<x-incluyeme class="row">
						<x-incluyeme class="col-12 text-center">
							<h2 class="font-weight-bold">¡Gracias por Registrarte!</h2>
							<h5>Pronto seras redirigido a nuestra lista de ofertas laborales.</h5>
						</x-incluyeme>
					</x-incluyeme>
				</div>
			</template>
			<div v-if="currentStep != 13" class="container text-center">
				<h6>Los campos marcados con un * son obligatorios</h6>
			</div>
			<template id="step5" v-if="currentStep == 5 && disCap">
				<div class="container mt-4"
				     style="background-color: #f2f1fc; border-radius: 14px; padding: 32px !important">
					<x-incluyeme class="row">
						<x-incluyeme class="col-12  text-center">
							<h3 class="font-weight-bold">¿Tienes dudas sobre tu tipo de discapacidad?</h3>
							<h5 class="font-weight-bold">Tipos de discapacidad</h5>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-3">
						<x-incluyeme class="col-sm-12 col-md-6 col-lg-4">
							<img src="<?php echo plugins_url() . '/incluyeme-login-extension/include/assets/img/vision.svg' ?>"
							     alt="visual" class="img-fluid pb-2">
							<h6><b>Visual:</b> disminución total o parcial del sentido de la vista.</h6>
						</x-incluyeme>
						<x-incluyeme class="col-sm-12 col-md-6 col-lg-4">
							<img src="<?php echo plugins_url() . '/incluyeme-login-extension/include/assets/img/viscera.svg' ?>"
							     alt="Visceral" class="img-fluid pb-2">
							<h6><b>Visceral:</b> deficiencia en los órganos internos, por ejemplo: Personas que
							                     requieren diálisis, personas transplantadas con tratamiento activo.
							</h6>
						</x-incluyeme>
						<x-incluyeme class="col-sm-12 col-md-6 col-lg-4">
							<img src="<?php echo plugins_url() . '/incluyeme-login-extension/include/assets/img/auditiva.svg' ?>"
							     alt="Auditiva" class="img-fluid pb-2">
							<h6><b>Auditiva:</b> disminución total o parcial de la audición.</h6>
						</x-incluyeme>
					</x-incluyeme>
					<x-incluyeme class="row mt-2">
						<x-incluyeme class="col-sm-12 col-md-6 col-lg-4">
							<img src="<?php echo plugins_url() . '/incluyeme-login-extension/include/assets/img/intelectual.svg' ?>"
							     alt="Intelectual/del desarrollo" class="img-fluid pb-2">
							<h6><b>Intelectual/del desarrollo:</b> dificultades para relacionarnos con el entorno y
							                                       desarrollar actividades cotidianas. Por ejemplo:
							                                       Síndrome de Down o Trastorno del espectro
							                                       autista.</h6>
						</x-incluyeme>
						<x-incluyeme class="col-sm-12 col-md-6 col-lg-4">
							<img src="<?php echo plugins_url() . '/incluyeme-login-extension/include/assets/img/fisica.svg' ?>"
							     alt="Física/Motriz" class="img-fluid pb-2">
							<h6><b>Física/Motriz:</b> Implica la disminución en la movilidad de algún miembro del
							                          cuerpo.</h6>
						</x-incluyeme>
						<x-incluyeme class="col-sm-12 col-md-6 col-lg-4">
							<img src="<?php echo plugins_url() . '/incluyeme-login-extension/include/assets/img/psicologico.svg' ?>"
							     alt="Psicosocial" class="img-fluid pb-2">
							<h6><b>Psicosocial:</b> trastornos propios del comportamiento la capacidad para razonar
							                        y relacionarse con los demás. Por ejemplo: Enfermedades de salud
							                        mental como trastorno bipolar o esquizofrenia (depende del
							                        diagnóstico médico específico).</h6>
						</x-incluyeme>
					</x-incluyeme>
				</div>
			</template>
		</div>
		<x-incluyeme v-if="noDisPage!==false" class="container text-center">
			<h1 class="font-weight-bold">Nos enfocamos en la inclusión de personas con disCapacidad</h1>
		</x-incluyeme>
	</div>
</div>
<?php if ( get_option( $incluyemeLoginGoogle ) ) { ?>
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
