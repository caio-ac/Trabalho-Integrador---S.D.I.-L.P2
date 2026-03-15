<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circuitos e PHP</title>
    
</head>
<body>

<header>
    <h1>Bem-vindo ao Trabalho Inicial</h1>
</header>

<main>
    <div id="ResistorIdeal">
        <form>
            <label for="tensao">Tensão da Fonte (Vcc):</label><br>
            <input type="number" id="tensao" name="tensao"><br>
            <label for="corrente">Corrente do LED (i):</label><br>
            <input type="number" id="corrente" name="corrente"><br>
            <label for="tensaoLED">Tensão do LED (Vl):</label><br>
            <input type="number" id="tensaoLED" name="tensaoLED"><br>
            <label for="nLed">Nº de LEDs em série:</label><br>
            <input type="number" id="nLed" name="nLed"><br><br>
            <input type="submit" value="Calcular Resistor">
            <?php
                if($_GET["tensao"] != null && $_GET["corrente"] != null) {
                    $tensao = $_GET["tensao"];
                    $corrente = $_GET["corrente"];
                }else{
                    echo "<h2 id='semValor'>É necessário informar os valores da tensão e da corrente</h2>";
                }
            ?>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2026 Nosso Projetinho</p>
</footer>

</body>
</html>