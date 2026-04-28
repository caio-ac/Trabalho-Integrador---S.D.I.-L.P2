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
		
		<header>
		
		</header>
		
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
										           class="btn btn-primary col-md-12" id="Enviar"><br>
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
									if (isset($_GET["tensaoFonte"]) && isset($_GET["corrente"]) && isset($_GET["tensaoLED"]) && isset($_GET["nLED"])) {
										if ($_GET["tensaoFonte"] == null || $_GET["corrente"] == null || $_GET["tensaoLED"] == null || $_GET["nLED"] == null) {
											echo "<br><br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\" p-2 flex-shrink-1 me-3\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg>
		                                    <div><strong>É necessário preencher os campos de Tensão da Fonte, Corrente do LED, Tensão do LED e o número de LEDs em série para obter o valor do resistor</strong></div></div>";
										} else {
											$tensaoFonte = $_GET["tensaoFonte"];
											$corrente = $_GET["corrente"];
											$tensaoLED = $_GET["tensaoLED"];
											$nLED = $_GET["nLED"];
											if ($tensaoLED * $nLED > $tensaoFonte) {
												echo "<br><br><div class=\"alert alert-primary d-flex align-items-center\" role=\"alert\"><svg class=\" p-2 flex-shrink-1 me-3\" role=\"img\" aria-label=\"Info:\"><use xlink:href=\"#info-fill\"/></svg><div><strong>A tensão total dos LEDs nunca pode ser maior que a tensão da fonte!</strong></div></div>";
											} else {
												$resistor = ($tensaoFonte - $tensaoLED * $nLED) / $corrente;
												echo "<br><div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Cálculo realizado com sucesso!</h4><hr><p class=\"mb-0\">Resistor Ideal: $resistor ohms</p></div>";
												
											}
										}
									} else {
										echo "<br><br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\" p-2 flex-shrink-1 me-3\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg>
		                                    <div><strong>É necessário preencher os campos de Tensão da Fonte, Corrente do LED, Tensão do LED e o número de LEDs em série para obter o valor do resistor</strong></div></div>";
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
												<select id="faixa1" name="faixa1" class="form-control">
													<option>Preto</option>
													<option>Marrom</option>
													<option>Vermelho</option>
													<option>Laranja</option>
													<option>Amarelo</option>
													<option>Verde</option>
													<option>Azul</option>
													<option>Violeta</option>
													<option>Cinza</option>
													<option>Branco</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="faixa2">Faixa 2:</label><br>
											<div class="input-group">
												<select id="faixa2" name="faixa2" class="form-control">
													<option>Preto</option>
													<option>Marrom</option>
													<option>Vermelho</option>
													<option>Laranja</option>
													<option>Amarelo</option>
													<option>Verde</option>
													<option>Azul</option>
													<option>Violeta</option>
													<option>Cinza</option>
													<option>Branco</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="faixa3">Faixa 3:</label><br>
											<div class="input-group">
												<select id="faixa3" name="faixa3" class="form-control">
													<option>Preto</option>
													<option>Marrom</option>
													<option>Vermelho</option>
													<option>Laranja</option>
													<option>Amarelo</option>
													<option>Verde</option>
													<option>Azul</option>
													<option>Violeta</option>
													<option>Cinza</option>
													<option>Branco</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="faixa4">Faixa 4:</label><br>
											<div class="input-group">
												<select id="faixa4" name="faixa4" class="form-control">
													<option>Dourado</option>
													<option for="prateado">Prateado</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="form-row">
										<br><input type="submit" value="Calcular Resistência do Resistor"
										           class="btn btn-primary col-md-12" id="Enviar2"><br>
									</div>
									
									<?php
									
									if (isset($_GET['faixa1']) && isset($_GET['faixa2']) && isset($_GET['faixa3']) && isset($_GET['faixa4'])) {
										$faixa1 = $_GET['faixa1'];
										$faixa2 = $_GET['faixa2'];
										$faixa3 = $_GET['faixa3'];
										$faixa4 = $_GET['faixa4'];
										
										$digito1 = 0;
										$digito2 = 0;
										$multiplicador = 0;
										$tolerancia = 0;
										
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
										
										if ($faixa4 == "Dourado") {
											$tolerancia = "5%";
										} elseif ($faixa4 == "Prateado") {
											$tolerancia = "10%";
										} else {
											$tolerancia = "0%";
										}
										
										$resistencia = $digito1 . $digito2 * $multiplicador;
										if ($tolerancia != 0) {
											echo "<br><div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Cálculo realizado com sucesso!</h4><hr><p class=\"mb-0\"><strong>Resistência = $resistencia Ω ± $tolerancia</strong></p></div>";
										} else {
											echo "<h3>Resistência = ", $resistencia, "Ω</h3>";
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
		
		<footer class="text-white text-center py-3">
			<div class="text-center p-3" style="background-color: #007bff;">
				© 2026 Equipe do trabalho do Antônio: Caio, Gabriela, Gilliard, Mateus, Miguel e Nicolas
			</div>
		</footer>
	</body>
</html>
