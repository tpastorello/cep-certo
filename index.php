<?php
/*
PHP4FUN
*/
if ($_POST) {
    $url = "https://www.cepcerto.com/ws/json-frete/" . $_POST['origem'] . "/" . $_POST['destino'] . "/" . $_POST['peso'] . "/" . $_POST['comprimento'] . "/" . $_POST['altura'] . "/" . $_POST['largura'] . "";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    $obj = json_decode($output);
}
?>
<!doctype html>
<html data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <title>Cálculo de Frete - Correios</title>
    <link rel="icon" type="image/png" href="https://www.correios.com.br/++theme++tema-do-portal-correios/static/imagens/favicon-32x32.png" sizes="32x32" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="p-5">
    <h1>Cálculo de Frete</h1>
    <sub>Correios</sub>

    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">$</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obj as $key => $value) { ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $value ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <form class="mt-5" method="post">
        <fieldset>
            <legend>Informações da encomenda:</legend>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="origem" placeholder="CEP Origem" value="89207350">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="destino" placeholder="CEP Destino" value="85506040">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="peso" placeholder="Peso (gramas)" value="200">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="comprimento" placeholder="Comprimento (cm)" value="30">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="altura" placeholder="Altura (cm)" value="20">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="largura" placeholder="Largura (cm)" value="10">
            </div>

            <p>
                A soma resultante do comprimento + largura + altura não deve superar 200 cm.<br>
                A soma resultante do comprimento + o dobro do diâmetro não pode ser menor que 28 cm.
            </p>

            <button type="submit" class="btn btn-warning">ENVIAR</button>
        </fieldset>
    </form>

    <p class="mt-5">
        <a href="https://vinteum.com/" target="_blank">vinteum</a>
    </p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>