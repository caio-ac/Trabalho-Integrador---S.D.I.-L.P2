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
							<form action="base.php" method="post">
								<div class="card-header">
									<h5 class="card-title">Calculadora de Resistor ideal para LEDs em série</h5>
								</div>
								<div class="card-content">
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="tensaoFonte">Tensão da Fonte:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupPrepend"><i>V<sub>fonte</sub></i></span>
												</div>
												<input type="number" id="tensaoFonte" name="tensaoFonte" step="0.01" class="form-control" ><br>
											</div>
										</div>
										<div class="col-md-6 mb-4">
											<label for="corrente">Corrente do LED:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupPrepend"><i>I<sub>LED</sub></i></span>
												</div>
												<input type="number" id="corrente" name="corrente" step="0.01" class="form-control"><br>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="tensaoLED">Tensão do LED:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupPrepend"><i>V<sub>LED</sub></i></span>
												</div>
												<input type="number" id="tensaoLED" name="tensaoLED" step="0.01" class="form-control"><br>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="nLED">Nº de LEDs em série:</label><br>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="inputGroupPrepend"><i>N</i></span>
												</div>
												<input type="number" id="nLED" name="nLED" step="0.01" class="form-control"><br>
											</div>
										</div>
									</div>
									<div class="form-row">
										<br><input type="submit" value="Calcular Resistor" class="btn btn-primary col-md-12" id="Enviar"><br>
										<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
											<symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
												<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
											</symbol>
										</svg>
									
									</div>
                                    <?php
	                                    if (isset($_POST["tensaoFonte"]) && isset($_POST["corrente"])  && isset($_POST["tensaoLED"]) && isset($_POST["nLED"]) ) {
	                                        $tensaoFonte = $_POST["tensaoFonte"];
	                                        $corrente = $_POST["corrente"];
	                                        $tensaoLED = $_POST["tensaoLED"];
	                                        $nLED = $_POST["nLED"];
	                                        if ($tensaoLED * $nLED > $tensaoFonte) {
	                                            echo "<h2>A tensão total dos LEDs nunca pode ser maior que a tensão da fonte!</h2>";
	                                        } else {
	                                            $resistor = ($tensaoFonte - $tensaoLED * $nLED) / $corrente;
	                                            echo "<br><div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Cálculo realizado com sucesso!</h4><hr><p class=\"mb-0\">Resistor Ideal: $resistor ohms</p></div>";
												
	                                        }
	                                    } else {
	                                        echo "<br><br><div class=\"alert alert-warning d-flex align-items-center\" role=\"alert\"><svg class=\" p-2 flex-shrink-1 me-3\" role=\"img\" aria-label=\"Warning:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg>
		                                    <div><strong>É necessário preencher os campos de Tensão da Fonte, Corrente do LED, Tensão do LED e o número de LEDs em série para obter o valor do resistor</strong></div></div>";
	                                    }
                                    ?>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm">
						<div class="card h-100 shadow-lg p-3 mb-5 bg-body-tertiary rounded"></div>
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