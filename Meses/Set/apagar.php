<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $categoria = $_POST['categoria'];

    // Lê o conteúdo do arquivo JSON existente
    $jsonConteudo = file_get_contents('json/' . $categoria . '.json');

    // Converte o JSON em um array associativo
    $dados = json_decode($jsonConteudo, true);

    // Remove o último elemento do array
    array_pop($dados);

    // Converte o array de volta para JSON
    $novoJsonConteudo = json_encode($dados, JSON_PRETTY_PRINT);

    // Escreve o JSON de volta no arquivo
    file_put_contents('json/' . $categoria . '.json', $novoJsonConteudo);

    echo 'Último valor apagado com sucesso para ' . $categoria . '!';
}
?>
