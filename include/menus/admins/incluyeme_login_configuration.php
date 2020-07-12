<?php
/**
 * Copyright (c) 2020
 *
 * Developer by Jesus Nuñez <jesus.nunez2050@gmail.com> .
 */

function incluyeme_login_configuration()
{
	$discap = 'IncluyemeDiscap';
	$discapMore = 'IncluyemeDiscapMore';
	$state = 'IncluyemeStateConf';
	$city = 'IncluyemeCityConf';
	$idioma_ingles = 'Incluyemeidioma_ingles';
	$idioma_frances = 'Incluyemeidioma_frances';
	$idioma_portugues = 'Incluyemeidioma_portugues';
	$idioma_aleman = 'Incluyemeidioma_aleman';
	$country = 'IncluyemeCountryConf';
	$incluyemeFilters = 'incluyemeFiltersCV';
	if (isset($_POST['discap'])) {
		$value = $_POST['discap'];
		update_option($discap, sanitize_text_field($value));
		update_option($discap, sanitize_text_field($value));
	}
	if (isset($_POST['discap_cud'])) {
		$value = $_POST['discap_cud'];
		update_option($incluyemeFilters, sanitize_text_field($value));
		update_option($incluyemeFilters, sanitize_text_field($value));
	}
	if (isset($_POST['discap_more'])) {
		$value = $_POST['discap_more'];
		update_option($discapMore, sanitize_text_field($value));
		update_option($discapMore, sanitize_text_field($value));
	}
	if (isset($_POST['state'])) {
		$value = $_POST['state'];
		update_option($state, sanitize_text_field($value));
		update_option($state, sanitize_text_field($value));
	}
	if (isset($_POST['country'])) {
		$value = $_POST['country'];
		update_option($country, sanitize_text_field($value));
		update_option($country, sanitize_text_field($value));
	}
	if (isset($_POST['city'])) {
		$value = $_POST['city'];
		update_option($city, sanitize_text_field($value));
		update_option($city, sanitize_text_field($value));
	}
	if (isset($_POST['idioma_ingles'])) {
		$value = $_POST['idioma_ingles'];
		update_option($idioma_ingles, sanitize_text_field($value));
		update_option($idioma_ingles, sanitize_text_field($value));
	}
	if (isset($_POST['idioma_frances'])) {
		$value = $_POST['idioma_frances'];
		update_option($idioma_frances, sanitize_text_field($value));
		update_option($idioma_frances, sanitize_text_field($value));
	}
	if (isset($_POST['idioma_portugues'])) {
		$value = $_POST['idioma_portugues'];
		update_option($idioma_portugues, sanitize_text_field($value));
		update_option($idioma_portugues, sanitize_text_field($value));
	}
	if (isset($_POST['idioma_aleman'])) {
		$value = $_POST['idioma_aleman'];
		update_option($idioma_aleman, sanitize_text_field($value));
		update_option($idioma_aleman, sanitize_text_field($value));
	}
	?>
	<div class="container">
		
		<h5>Configuración de Campos</h5>
		
		<div class="card">
			<div class="card-title">
				<div class="card-body">
					<form method="POST">
						<h5>Informacion general</h5>
						<div class="form-group">
							<label for="discap">
								Tipo de Discapacidad
							</label>
							<input name="discap" class="form-control" id="discap" type="text"
							       placeholder="Ingrese el ID del campo para el Tipo de Discapacidad"
							       value="<?php echo get_option($discap) ?>">
						</div>
						<div class="form-group">
							<label for="discap_more">
								Informacion sobre la discapacidad
							</label>
							<input name="discap_more" class="form-control" id="discap_more" type="text"
							       placeholder="Ingrese el ID del campo"
							       value="<?php echo get_option($discapMore) ?>">
						</div>
						<div class="form-group">
							<label for="discap_cud">
								Certificado de Discapacidad
							</label>
							<input name="discap_cud" class="form-control" id="discap_cud" type="text"
							       placeholder="Ingrese el ID del campo"
							       value="<?php echo get_option($incluyemeFilters) ?>">
						</div>
						<div class="form-group">
							<label for="country">
								Pais
							</label>
							<input name="country" class="form-control" id="country" type="text"
							       placeholder="Ingrese el ID del campo para el Pais"
							       value="<?php echo get_option($country) ?>">
						</div>
						<div class="form-group">
							<label for="state">
								Estado
							</label>
							<input name="state" class="form-control" id="state" type="text"
							       placeholder="Ingrese el ID del campo para Estado"
							       value="<?php echo get_option($state) ?>">
						</div>
						<div class="form-group">
							<label for="city">
								Ciudad
							</label>
							<input name="city" class="form-control" id="city" type="text"
							       placeholder="Ingrese el ID del campo para Ciudad"
							       value="<?php echo get_option($city) ?>">
						</div>
						<h5>Idiomas</h5>
						<div class="form-group">
							<label for="idioma_ingles">
								Inglés
							</label>
							<input name="idioma_ingles" class="form-control" id="idioma_ingles" type="text"
							       placeholder="Ingrese el ID del campo para el idioma Ingles"
							       value="<?php echo get_option($idioma_ingles) ?>">
						</div>
						<div class="form-group">
							<label for="idioma_frances">
								Frances
							</label>
							<input name="idioma_frances" class="form-control" id="idioma_frances" type="text"
							       placeholder="Ingrese el ID del campo para el idioma Frances"
							       value="<?php echo get_option($idioma_frances) ?>">
						</div>
						<div class="form-group">
							<label for="idioma_portugues">
								Portugues
							</label>
							<input name="idioma_portugues" class="form-control" id="idioma_portugues" type="text"
							       placeholder="Ingrese el ID del campo para el idioma Portugues"
							       value="<?php echo get_option($idioma_portugues) ?>">
						</div>
						<div class="form-group">
							<label for="idioma_aleman">
								Aleman
							</label>
							<input name="idioma_aleman" class="form-control" id="idioma_aleman" type="text"
							       placeholder="Ingrese el ID del campo para el idioma Aleman"
							       value="<?php echo get_option($idioma_aleman) ?>">
						</div>
					 <div class="text-right mt-2">
								<button type="submit"
								        class="btn btn-info"><?php _e("Guardar", "wpjobboard"); ?></button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<?php
}
