<?php
// Verifica se os valores foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém a categoria e o valor do POST
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];

    // Lê o conteúdo do arquivo JSON existente
    $jsonConteudo = file_get_contents('json/' . $categoria . '.json');

    // Converte o JSON em um array associativo
    $dados = json_decode($jsonConteudo, true);

    // Adiciona o novo valor ao array
    $dados[] = ['valor' => floatval($valor)];

    // Converte o array de volta para JSON
    $novoJsonConteudo = json_encode($dados, JSON_PRETTY_PRINT);

    // Escreve o JSON de volta no arquivo
    file_put_contents('json/' . $categoria . '.json', $novoJsonConteudo);

    echo 'Valor adicionado com sucesso para ' . $categoria . '!';
}
?>