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
    <form>
        <label for="tensao">Tensão/Voltagem (Vcc):</label><br>
        <input type="number" id="tensao" name="tensao"><br>
        <label for="corrente">Corrente (i):</label><br>
        <input type="number" id="corrente" name="corrente"><br><br>
        <label for="corrente">Tensão do LED (Vl):</label><br>
        <input type="number" id="corrente" name="corrente"><br><br>
        <input type="submit" value="Enviar">
        <?php
            if($_GET["tensao"] != null && $_GET["corrente"] != null) {
                $tensao = $_GET["tensao"];
                $corrente = $_GET["corrente"];
            }else{
                echo "<h2 id='semValor'>É necessário informar os valores da tensão e da corrente</h2>";
            }
        ?>
    </form>
</main>

<footer>
    <p>&copy; 2026 Nosso Projetinho</p>
</footer>

</body>
</html>