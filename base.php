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
	                                    if (isset($_GET["tensaoFonte"]) && isset($_GET["corrente"])  && isset($_GET["tensaoLED"]) && isset($_GET["nLED"]) ) {
											if($_GET["tensaoFonte"] == null || $_GET["corrente"] == null || $_GET["tensaoLED"] == null || $_GET["nLED"] == null) {
												echo "<br><br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\" p-2 flex-shrink-1 me-3\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg>
		                                    <div><strong>É necessário preencher os campos de Tensão da Fonte, Corrente do LED, Tensão do LED e o número de LEDs em série para obter o valor do resistor</strong></div></div>";
											}else{
		                                        $tensaoFonte = $_GET["tensaoFonte"];
		                                        $corrente = $_GET["corrente"];
		                                        $tensaoLED = $_GET["tensaoLED"];
		                                        $nLED = $_GET["nLED"];
		                                        if ($tensaoLED * $nLED > $tensaoFonte) {
		                                            echo "<h2>A tensão total dos LEDs nunca pode ser maior que a tensão da fonte!</h2>";
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
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="faixa1">Faixa 1:</label><br>
                                        <div class="input-group">
                                            <select id="faixa1" name="faixa1" class="form-control" > <br>
                                                <option for="preto">Preto</option>
                                                <option for="marrom">Marrom</option>
                                                <option for="vermelho">Vermelho</option>
                                                <option for="laranja">Laranja</option>
                                                <option for="amarelo">Amarelo</option>
                                                <option for="verde">Verde</option>
                                                <option for="azul">Azul</option>
                                                <option for="violeta">Violeta</option>
                                                <option for="cinza">Cinza</option>
                                                <option for="branco">Branco</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="faixa2">Faixa 2:</label><br>
                                        <div class="input-group">
                                            <select id="faixa2" name="faixa2" class="form-control" ><br>
                                                <option for="preto">Preto</option>
                                                <option for="marrom">Marrom</option>
                                                <option for="vermelho">Vermelho</option>
                                                <option for="laranja">Laranja</option>
                                                <option for="amarelo">Amarelo</option>
                                                <option for="verde">Verde</option>
                                                <option for="azul">Azul</option>
                                                <option for="violeta">Violeta</option>
                                                <option for="cinza">Cinza</option>
                                                <option for="branco">Branco</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="faixa3">Faixa 3:</label><br>
                                        <div class="input-group">
                                            <select id="faixa3" name="faixa3"  class="form-control" ><br>
                                                <option for="preto">Preto</option>
                                                <option for="marrom">Marrom</option>
                                                <option for="vermelho">Vermelho</option>
                                                <option for="laranja">Laranja</option>
                                                <option for="amarelo">Amarelo</option>
                                                <option for="verde">Verde</option>
                                                <option for="azul">Azul</option>
                                                <option for="violeta">Violeta</option>
                                                <option for="cinza">Cinza</option>
                                                <option for="branco">Branco</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="faixa4">Faixa 4:</label><br>
                                        <div class="input-group">
                                            <select id="faixa4" name="faixa4" class="form-control" ><br>
                                                <option for="dourado">Dourado</option>
                                                <option for="prateado">Prateado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <br><input type="submit" value="Calcular Resistencia do Resistor" class="btn btn-primary col-md-12" id="Enviar2"><br>
                                </div>

                                <?php

                                    if(isset($_GET['faixa1']) && isset($_GET['faixa2']) && isset($_GET['faixa3']) && isset($_GET['faixa4'])){
                                        $faixa1 = $_GET['faixa1'];
                                        $faixa2 = $_GET['faixa2'];
                                        $faixa3 = $_GET['faixa3'];
                                        $faixa4 = $_GET['faixa4'];

                                        $digito1 = 0;
                                        $digito2 = 0;
                                        $multiplicador = 0;
                                        $tolerancia = 0;

                                        if ($faixa1 == 'preto'){
                                            $digito1 = 0;
                                        }elseif ($faixa1 == 'marrom'){
                                            $digito1 = 1;
                                        }elseif ($faixa1 == 'vermelho'){
                                            $digito1 = 2;
                                        }elseif ($faixa1 == 'laranja'){
                                            $digito1 = 3;
                                        }elseif ($faixa1 == 'amarelo'){
                                            $digito1 = 4;
                                        }elseif ($faixa1 == 'verde'){
                                            $digito1 = 5;
                                        }elseif ($faixa1 == 'azul'){
                                            $digito1 = 6;
                                        }elseif ($faixa1 == 'violeta'){
                                            $digito1 = 7;
                                        }elseif ($faixa1 == 'cinza'){
                                            $digito1 = 8;
                                        }elseif ($faixa1 == 'branco'){
                                            $digito1 = 9;
                                        }

                                        if ($faixa2 == 'preto'){
                                            $digito2 = 0;
                                        }elseif ($faixa2 == 'marrom'){
                                            $digito2 = 1;
                                        }elseif ($faixa2 == 'vermelho'){
                                            $digito2 = 2;
                                        }elseif ($faixa2 == 'laranja'){
                                            $digito2 = 3;
                                        }elseif ($faixa2 == 'amarelo'){
                                            $digito2 = 4;
                                        }elseif ($faixa2 == 'verde'){
                                            $digito2 = 5;
                                        }elseif ($faixa2 == 'azul'){
                                            $digito2 = 6;
                                        }elseif ($faixa2 == 'violeta'){
                                            $digito2 = 7;
                                        }elseif ($faixa2 == 'cinza'){
                                            $digito2 = 8;
                                        }elseif ($faixa2 == 'branco'){
                                            $digito2 = 9;
                                        }

                                        if ($faixa3 == 'preto'){
                                            $multiplicador = pow(10, 0);
                                        }elseif ($faixa3 == 'marrom'){
                                            $multiplicador = pow(10, 1);
                                        }elseif ($faixa3 == 'vermelho'){
                                            $multiplicador = pow(10, 2);
                                        }elseif ($faixa3 == 'laranja'){
                                            $multiplicador = pow(10, 3);
                                        }elseif ($faixa3 == 'amarelo'){
                                            $multiplicador = pow(10, 4);
                                        }elseif ($faixa3 == 'verde'){
                                            $multiplicador = pow(10, 5);
                                        }elseif ($faixa3 == 'azul'){
                                            $multiplicador = pow(10, 6);
                                        }elseif ($faixa3 == 'violeta'){
                                            $multiplicador = pow(10, 7);
                                        }elseif ($faixa3 == 'cinza'){
                                            $multiplicador = pow(10, 8);
                                        }elseif ($faixa3 == 'branco'){
                                            $multiplicador = pow(10, 9);
                                        }

                                        if ($faixa4 == 'dourado'){
                                            $tolerancia = "5%";
                                        }elseif ($faixa4 == 'prateado'){
                                            $tolerancia = "10%";
                                        }else{
                                            $tolerancia = 0;
                                        }

                                        $resistencia = $digito1 . $digito2 * $multiplicador;
                                        if($tolerancia!=0){
                                            echo "<h3>Resistência = ", $resistencia, "Ω ± ", $tolerancia, "</h3>";
                                        }else{
                                            echo "<h3>Resitência = ", $resistencia, "Ω</h3>";
                                        }
                                    }
                                    ?>
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