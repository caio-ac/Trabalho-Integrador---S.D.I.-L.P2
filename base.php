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
			<div class="container">
				<div class="row">
					<div class="col-sm">
						<div id="ResistorIdeal" class="card h-100">
							<form>
								<div class="card-header">
									<h5 class="card-title">Calculadora de Resistor ideal para LEDs em série</h5>
								</div>
								<div class="card-content">
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="tensaoFonte">Tensão da Fonte (Vcc):</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupPrepend">@</span>
												</div>
												<input type="number" id="tensaoFonte" name="tensaoFonte"
												       class="form-control" required><br>
											</div>
										</div>
										<div class="col-md-6 mb-4">
											<label for="corrente">Corrente do LED (i):</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupPrepend">@</span>
												</div>
												<input type="number" id="corrente" name="corrente" class="form-control"
												       required><br>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="tensaoLED">Tensão do LED (Vl):</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupPrepend">@</span>
												</div>
												<input type="number" id="tensaoLED" name="tensaoLED"
												       class="form-control" required><br>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="nLED">Nº de LEDs em série:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupPrepend">@</span>
												</div>
												<input type="number" id="nLED" name="nLED" class="form-control"
												       required><br>
											</div>
										</div>
									</div>
									<div class="form-row">
										<br><input type="submit" value="Calcular Resistor" class="btn btn-primary"
										           id="Enviar">
									</div>
									<?php
									if ($_GET["tensaoFonte"] != null && $_GET["corrente"] != null && $_GET["tensaoLED"] != null && $_GET["nLED"] != null) {
										$tensaoFonte = $_GET["tensaoFonte"];
										$corrente = $_GET["corrente"];
										$tensaoLED = $_GET["tensaoLED"];
										$nLED = $_GET["nLED"];
										if ($tensaoLED * $nLED > $tensaoFonte) {
											echo "<h2>A tensão total dos LEDs nunca pode ser maior que a tensão da fonte!</h2>";
										} else {
											$resistor = ($tensaoFonte - $tensaoLED * $nLED) / $corrente;
											
										}
										
									} else {
										echo "<h2 id='semValor'>É necessário informar os valores da tensão da fonte, da corrente do LED, tensão do LED e número de LEDs em série</h2>";
									}
									?>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm">
					
					</div>
				</div>
			</div>
		</main>
		
		<footer>
			<p>&copy; 2026 Nosso Projetinho</p>
		</footer>
	
	</body>
</html>