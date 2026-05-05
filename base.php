<?php
session_start();
$cores = [
		'Preto'    => '#1a1a1a',
		'Marrom'   => '#8B4513',
		'Vermelho' => '#cc0000',
		'Laranja'  => '#ff6600',
		'Amarelo'  => '#ffff00',
		'Verde'    => '#008000',
		'Azul'     => '#0000cc',
		'Violeta'  => '#8B00FF',
		'Cinza'    => '#808080',
		'Branco'   => '#f5f5f5',
		'Dourado'  => '#CFB53B',
		'Prateado' => '#C0C0C0',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Circuitos e PHP</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
		      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
		      crossorigin="anonymous">
		<link rel="stylesheet" href="assets/style.css">
	</head>
	<body>
		<header></header>
		<main>
			<div class="container position-relative">
				<div class="row">
					<div class="col-sm">
						<div id="ResistorIdeal" class="card h-100 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
							<form action="base.php" method="GET">
								<div class="card-header">
									<h5 class="card-title">Calculadora de Resistor ideal para LEDs em série</h5>
								</div>
								<div class="card-content">
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="tensaoFonte">Tensão da Fonte:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"
													      id="inputGroupPrepend"><i>V<sub>fonte</sub></i></span>
												</div>
												<input type="number" id="tensaoFonte" name="tensaoFonte" step="0.01"
												       class="form-control"><br>
											</div>
										</div>
										<div class="col-md-6 mb-4">
											<label for="corrente">Corrente do LED:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"
													      id="inputGroupPrepend"><i>I<sub>LED</sub></i></span>
												</div>
												<input type="number" id="corrente" name="corrente" step="0.01"
												       class="form-control"><br>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="tensaoLED">Tensão do LED:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"
													      id="inputGroupPrepend"><i>V<sub>LED</sub></i></span>
												</div>
												<input type="number" id="tensaoLED" name="tensaoLED" step="0.01"
												       class="form-control"><br>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="nLED">Nº de LEDs em série:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"
													      id="inputGroupPrepend"><i>N</i></span>
												</div>
												<input type="number" id="nLED" name="nLED" step="0.01"
												       class="form-control"><br>
											</div>
										</div>
									</div>
									<div class="form-row">
										<br><input type="submit" value="Calcular Resistor"
										           class="btn btn-primary col-md-12" id="Enviar" name="submit1"><br>
										<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
											<symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</symbol>
											<symbol id="info-fill" viewBox="0 0 16 16">
												<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
											</symbol>
										</svg>
									</div>
									<?php
									
									if (isset($_GET['submit1'])) {
										if (isset($_GET["tensaoFonte"]) && isset($_GET["corrente"]) && isset($_GET["tensaoLED"]) && isset($_GET["nLED"])) {
											if ($_GET["tensaoFonte"] == null || $_GET["corrente"] == null || $_GET["tensaoLED"] == null || $_GET["nLED"] == null) {
												echo "<br><br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\" p-2 flex-shrink-1 me-3\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg>
			                                    <div><strong>É necessário preencher os campos de Tensão da Fonte, Corrente do LED, Tensão do LED e o número de LEDs em série para obter o valor do resistor</strong></div></div>";
												unset($_SESSION['resultado_resistor_ideal']);
											} else {
												$tensaoFonte = $_GET["tensaoFonte"];
												$corrente = $_GET["corrente"];
												$tensaoLED = $_GET["tensaoLED"];
												$nLED = $_GET["nLED"];
												if ($tensaoLED * $nLED > $tensaoFonte) {
													echo "<br><br><div class=\"alert alert-primary d-flex align-items-center\" role=\"alert\"><svg class=\" p-2 flex-shrink-1 me-3\" role=\"img\" aria-label=\"Info:\"><use xlink:href=\"#info-fill\"/></svg><div><strong>A tensão total dos LEDs nunca pode ser maior que a tensão da fonte!</strong></div></div>";
													unset($_SESSION['resultado_resistor_ideal']);
												} else {
													$resistor = ($tensaoFonte - $tensaoLED * $nLED) / $corrente;
													$_SESSION['resultado_resistor_ideal'] = $resistor;
													
												}
											}
										} else {
											echo "<br><br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\" p-2 flex-shrink-1 me-3\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg>
			                                    <div><strong>É necessário preencher os campos de Tensão da Fonte, Corrente do LED, Tensão do LED e o número de LEDs em série para obter o valor do resistor</strong></div></div>";
										}
									}
									if (isset($_SESSION['resultado_resistor_ideal'])) {
										$resistorIdeal = $_SESSION['resultado_resistor_ideal'];
										echo "<br><div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Cálculo realizado com sucesso!</h4><hr><p class=\"mb-0\">Resistor Ideal: $resistorIdeal ohms</p></div>";
									}
									?>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm">
						<div class="card h-100 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
							<form action="base.php" method="GET">
								<div class="card-header">
									<h5 class="card-title">Cores do Resistor</h5>
								</div>
								<div class="card-content">
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="faixa1">Faixa 1:</label><br>
											<div class="input-group">
												<?php
												$valFaixa1 = isset($_GET['faixa1']) ? $_GET['faixa1'] : (isset($_SESSION['sel_faixa1']) ? $_SESSION['sel_faixa1'] : 'Preto');
												$valFaixa2 = isset($_GET['faixa2']) ? $_GET['faixa2'] : (isset($_SESSION['sel_faixa2']) ? $_SESSION['sel_faixa2'] : 'Preto');
												$valFaixa3 = isset($_GET['faixa3']) ? $_GET['faixa3'] : (isset($_SESSION['sel_faixa3']) ? $_SESSION['sel_faixa3'] : 'Preto');
												$valFaixa4 = isset($_GET['faixa4']) ? $_GET['faixa4'] : (isset($_SESSION['sel_faixa4']) ? $_SESSION['sel_faixa4'] : 'Preto');
												
												?>
												<div class="input-group-prepend">
													<span class="input-group-text"
													      id="inputGroupPrepend" style="background-color: <?= $cores[$valFaixa1]?>; color: <?= $cores[$valFaixa1]?>;">Cor</span>
												</div>
												<select id="faixa1" name="faixa1" class="form-control">
													<option <?= $valFaixa1 == 'Preto' ? 'selected' : '' ?> >Preto</option>
													<option <?= $valFaixa1 == 'Marrom' ? 'selected' : '' ?>>Marrom</option>
													<option <?= $valFaixa1 == 'Vermelho' ? 'selected' : '' ?>>Vermelho</option>
													<option <?= $valFaixa1 == 'Laranja' ? 'selected' : '' ?>>Laranja</option>
													<option <?= $valFaixa1 == 'Amarelo' ? 'selected' : '' ?>>Amarelo</option>
													<option <?= $valFaixa1 == 'Verde' ? 'selected' : '' ?>>Verde</option>
													<option <?= $valFaixa1 == 'Azul' ? 'selected' : '' ?>>Azul</option>
													<option <?= $valFaixa1 == 'Violeta' ? 'selected' : '' ?>>Violeta</option>
													<option <?= $valFaixa1 == 'Cinza' ? 'selected' : '' ?>>Cinza</option>
													<option <?= $valFaixa1 == 'Branco' ? 'selected' : '' ?>>Branco</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="faixa2">Faixa 2:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"
													      id="inputGroupPrepend" style="background-color: <?= $cores[$valFaixa2]?>; color: <?= $cores[$valFaixa2]?>;">Cor</span>
												</div>
												<select id="faixa2" name="faixa2" class="form-control">
													<option <?= $valFaixa2 == 'Preto' ? 'selected' : '' ?>>Preto</option>
													<option <?= $valFaixa2 == 'Marrom' ? 'selected' : '' ?>>Marrom</option>
													<option <?= $valFaixa2 == 'Vermelho' ? 'selected' : '' ?>>Vermelho</option>
													<option <?= $valFaixa2 == 'Laranja' ? 'selected' : '' ?>>Laranja</option>
													<option <?= $valFaixa2 == 'Amarelo' ? 'selected' : '' ?>>Amarelo</option>
													<option <?= $valFaixa2 == 'Verde' ? 'selected' : '' ?>>Verde</option>
													<option <?= $valFaixa2 == 'Azul' ? 'selected' : '' ?>>Azul</option>
													<option <?= $valFaixa2 == 'Violeta' ? 'selected' : '' ?>>Violeta</option>
													<option <?= $valFaixa2 == 'Cinza' ? 'selected' : '' ?>>Cinza</option>
													<option <?= $valFaixa2 == 'Branco' ? 'selected' : '' ?>>Branco</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="faixa3">Faixa 3:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"
													      id="inputGroupPrepend" style="background-color: <?= $cores[$valFaixa3]?>; color: <?= $cores[$valFaixa3]?>;">Cor</span>
												</div>
												<select id="faixa3" name="faixa3" class="form-control">
													<option <?= $valFaixa3 == 'Preto' ? 'selected' : '' ?>>Preto</option>
													<option <?= $valFaixa3 == 'Marrom' ? 'selected' : '' ?>>Marrom</option>
													<option <?= $valFaixa3 == 'Vermelho' ? 'selected' : '' ?>>Vermelho</option>
													<option <?= $valFaixa3 == 'Laranja' ? 'selected' : '' ?>>Laranja</option>
													<option <?= $valFaixa3 == 'Amarelo' ? 'selected' : '' ?>>Amarelo</option>
													<option <?= $valFaixa3 == 'Verde' ? 'selected' : '' ?>>Verde</option>
													<option <?= $valFaixa3 == 'Azul' ? 'selected' : '' ?>>Azul</option>
													<option <?= $valFaixa3 == 'Violeta' ? 'selected' : '' ?>>Violeta</option>
													<option <?= $valFaixa3 == 'Cinza' ? 'selected' : '' ?>>Cinza</option>
													<option <?= $valFaixa3 == 'Branco' ? 'selected' : '' ?>>Branco</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="faixa4">Faixa 4:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"
													      id="inputGroupPrepend" style="background-color: <?= $cores[$valFaixa4]?>; color: <?= $cores[$valFaixa4]?>;">Cor</span>
												</div>
												<select id="faixa4" name="faixa4" class="form-control">
													<option <?= $valFaixa4 == 'Dourado' ? 'selected' : '' ?>>Dourado</option>
													<option <?= $valFaixa4 == 'Prateado' ? 'selected' : '' ?>>Prateado</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="form-row">
										<br><input type="submit" value="Calcular Resistência do Resistor"
										           class="btn btn-primary col-md-12" id="Enviar2" name="submit2"><br>
									</div>
									
									<?php
									
									if (isset($_GET['submit2'])) {
										if (isset($_GET['faixa1']) && isset($_GET['faixa2']) && isset($_GET['faixa3']) && isset($_GET['faixa4'])) {
											$faixa1 = $_GET['faixa1'];
											$faixa2 = $_GET['faixa2'];
											$faixa3 = $_GET['faixa3'];
											$faixa4 = $_GET['faixa4'];
											
											
											$digito1 = 0;
											$digito2 = 0;
											$multiplicador = 0;
											
											
											
											if ($faixa1 == 'Preto') {
												$digito1 = 0;
											} elseif ($faixa1 == 'Marrom') {
												$digito1 = 1;
											} elseif ($faixa1 == 'Vermelho') {
												$digito1 = 2;
											} elseif ($faixa1 == 'Laranja') {
												$digito1 = 3;
											} elseif ($faixa1 == 'Amarelo') {
												$digito1 = 4;
											} elseif ($faixa1 == 'Verde') {
												$digito1 = 5;
											} elseif ($faixa1 == 'Azul') {
												$digito1 = 6;
											} elseif ($faixa1 == 'Violeta') {
												$digito1 = 7;
											} elseif ($faixa1 == 'Cinza') {
												$digito1 = 8;
											} elseif ($faixa1 == 'Branco') {
												$digito1 = 9;
											}
											
											if ($faixa2 == 'Preto') {
												$digito2 = 0;
											} elseif ($faixa2 == 'Marrom') {
												$digito2 = 1;
											} elseif ($faixa2 == 'Vermelho') {
												$digito2 = 2;
											} elseif ($faixa2 == 'Laranja') {
												$digito2 = 3;
											} elseif ($faixa2 == 'Amarelo') {
												$digito2 = 4;
											} elseif ($faixa2 == 'Verde') {
												$digito2 = 5;
											} elseif ($faixa2 == 'Azul') {
												$digito2 = 6;
											} elseif ($faixa2 == 'Violeta') {
												$digito2 = 7;
											} elseif ($faixa2 == 'Cinza') {
												$digito2 = 8;
											} elseif ($faixa2 == 'Branco') {
												$digito2 = 9;
											}
											
											if ($faixa3 == 'Preto') {
												$multiplicador = pow(10, 0);
											} elseif ($faixa3 == 'Marrom') {
												$multiplicador = pow(10, 1);
											} elseif ($faixa3 == 'Vermelho') {
												$multiplicador = pow(10, 2);
											} elseif ($faixa3 == 'Laranja') {
												$multiplicador = pow(10, 3);
											} elseif ($faixa3 == 'Amarelo') {
												$multiplicador = pow(10, 4);
											} elseif ($faixa3 == 'Verde') {
												$multiplicador = pow(10, 5);
											} elseif ($faixa3 == 'Azul') {
												$multiplicador = pow(10, 6);
											} elseif ($faixa3 == 'Violeta') {
												$multiplicador = pow(10, 7);
											} elseif ($faixa3 == 'Cinza') {
												$multiplicador = pow(10, 8);
											} elseif ($faixa3 == 'Branco') {
												$multiplicador = pow(10, 9);
											}
											$tolerancia = "0%";
											if ($faixa4 == "Dourado") {
												$tolerancia = "5%";
											} elseif ($faixa4 == "Prateado") {
												$tolerancia = "10%";
											} else {
												$tolerancia = "0%";
											}
											
											$resistencia = ($digito1 * 10 + $digito2) * $multiplicador;
											
											$_SESSION['resultado_resistencia_cores'] = $resistencia;
											$_SESSION['resultado_tolerancia'] = $tolerancia;
											
											$_SESSION['cor_faixa1'] = $cores[$faixa1];
											$_SESSION['cor_faixa2'] = $cores[$faixa2];
											$_SESSION['cor_faixa3'] = $cores[$faixa3];
											$_SESSION['cor_faixa4'] = $cores[$faixa4];
											
											$_SESSION['sel_faixa1'] = $faixa1;
											$_SESSION['sel_faixa2'] = $faixa2;
											$_SESSION['sel_faixa3'] = $faixa3;
											$_SESSION['sel_faixa4'] = $faixa4;
										}
									}
									if (isset($_SESSION['resultado_resistencia_cores'])) {
										$resistenciaIdeal = $_SESSION['resultado_resistencia_cores'];
										$tolerancia = $_SESSION['resultado_tolerancia'];
										$corFaixa1 = $_SESSION['cor_faixa1'];
										$corFaixa2 = $_SESSION['cor_faixa2'];
										$corFaixa3 = $_SESSION['cor_faixa3'];
										$corFaixa4 = $_SESSION['cor_faixa4'];
										if ($tolerancia != 0) {
											echo "<br><div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Cálculo realizado com sucesso!</h4><hr><div><svg width=\"100%\" height=\"auto\" id=\"svg2\" viewBox=\"0 0 2080.9143 283.87521\" \"><defs id=\"defs4\" /><g id=\"layer1\" transform=\"translate(-32.324883,-200.4222)\"><g id=\"g3825\"><rect y=\"318.11612\" x=\"32.324883\" height=\"48.487324\" width=\"2080.9143\" id=\"rect3004\" style=\"fill:#666666;stroke:none\" />
										      <path
										         
										         id=\"rect3776\"
										         transform=\"translate(0,-1107.6403)\"
										         d=\"m 798.5625,1308.5625 c -21.47944,0 -37.32619,4.0094 -49.46875,10.5625 -0.0526,0.028 -0.10377,0.065 -0.15625,0.094 -18.04664,8.9915 -27.35769,22.7119 -33.90625,37.4374 -14.51122,27.7533 -22.11341,59.0945 -55.8125,69.0938 -1.31397,0.3899 -2.62206,0.7469 -3.9375,1.125 v 46.2188 c 1.31639,0.3788 2.62251,0.766 3.9375,1.1562 64.74738,19.2121 12.93753,117.1875 139.34375,117.1875 0.73556,0 1.52761,-0.033 2.3125,-0.062 1.42733,0.029 2.86724,0.062 4.34375,0.062 30.2139,0 103.1066,-25.625 131.1875,-25.625 h 185.24995 c 28.081,0 100.9736,25.625 131.1876,25.625 1.4764,0 2.9164,-0.034 4.3437,-0.062 0.7849,0.03 1.5769,0.062 2.3125,0.062 126.4062,0 74.5964,-97.9754 139.3438,-117.1875 1.3149,-0.3902 2.6211,-0.7774 3.9374,-1.1562 v -46.2188 c -1.3154,-0.3781 -2.6235,-0.7351 -3.9374,-1.125 -33.6993,-9.9993 -41.3013,-41.3405 -55.8126,-69.0938 -6.5485,-14.7255 -15.8596,-28.4459 -33.9062,-37.4374 -0.053,-0.029 -0.1037,-0.065 -0.1562,-0.094 -12.1426,-6.5531 -27.9894,-10.5625 -49.4688,-10.5625 -0.7233,0 -1.4833,0.034 -2.25,0.062 -1.4474,-0.029 -2.9088,-0.062 -4.4062,-0.062 -30.214,0 -103.1066,25.625 -131.1876,25.625 H 936.40625 c -28.0809,0 -100.9736,-25.625 -131.1875,-25.625 -1.49753,0 -2.95885,0.034 -4.40625,0.062 -0.76674,-0.029 -1.52669,-0.062 -2.25,-0.062 z\"
										         style=\"fill:#d9bb7a;fill-opacity:1;stroke:#565248\" />
										      <path
										         id=\"rect3796\"
										         transform=\"translate(0,-27.6403)\"
										         d=\"m 798.5625,228.5625 c -3.72253,0 -7.26204,0.11053 -10.65625,0.34375 V 511.1875 c 3.40707,0.16398 6.95023,0.25 10.65625,0.25 0.73556,0 1.52761,-0.0335 2.3125,-0.0625 1.42733,0.029 2.86724,0.0625 4.34375,0.0625 12.13427,0 31.17182,-4.14734 51.40625,-9.09375 v -264.6875 c -20.23443,-4.94641 -39.27198,-9.09375 -51.40625,-9.09375 -1.49753,0 -2.95885,0.0345 -4.40625,0.0625 -0.76674,-0.029 -1.52669,-0.0625 -2.25,-0.0625 z\"
										         style=\"fill: $corFaixa1;fill-opacity:1;stroke:#986601\" />
										      <path
										         id=\"rect3798\"
										         transform=\"translate(0,-27.6403)\"
										         d=\"m 901.0625,248.5625 v 242.875 c 14.2546,-3.26548 26.85853,-5.625 35.34375,-5.625 H 969.75 v -231.625 h -33.34375 c -8.48522,0 -21.08915,-2.35952 -35.34375,-5.625 z\"
										         style=\"fill:$corFaixa2;fill-opacity:1;stroke:#430086;stroke-width:0.99;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1\" />
										      <path
										         id=\"rect3800\"
										         transform=\"translate(0,-27.6403)\"
										         d=\"m 1014.1875,254.1875 v 231.625 h 68.6875 v -231.625 z\"
										         style=\"fill:$corFaixa3;fill-opacity:1;stroke:#980101\" />
										      <path
										         id=\"rect3819\"
										         transform=\"translate(0,-27.6403)\"
										         d=\"m 1252.8438,228.5625 c -6.488,0 -14.9424,1.20677 -24.5,3.0625 v 276.75 c 9.5576,1.85573 18.012,3.0625 24.5,3.0625 1.4764,0 2.9164,-0.0345 4.3437,-0.0625 0.7849,0.03 1.5769,0.0625 2.3125,0.0625 14.8045,0 27.1423,-1.34611 37.5312,-3.75 V 234 c -10.1889,-3.43912 -22.4657,-5.4375 -37.5312,-5.4375 -0.7233,0 -1.4833,0.0345 -2.25,0.0625 -1.4474,-0.029 -2.9089,-0.0625 -4.4062,-0.0625 z\"
										         style=\"fill:$corFaixa4;fill-opacity:1;stroke:none\" /></g></g></svg>
										         <p class=\"mb-0\"><strong>Resistência = $resistenciaIdeal Ω ± $tolerancia</strong></p></div>";
										} else {
											echo "<h3>Resistência = ", $resistenciaIdeal, "Ω</h3>";
										}
									}
									?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
		
		<footer style="background-color: #007bff;">
			<div class="text-white text-center py-3" style="background-color: #007bff;">
				© 2026 Equipe do trabalho do Antônio: Caio, Gabriela, Gilliard, Mateus, Miguel e Nicolas
			</div>
		</footer>
	</body>
</html>
