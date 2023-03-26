<?php
include_once 'classes/noticia.class.php';
// Inicia a sessão para armazenar as notícias
session_start();

// Adiciona notícia padrão
if (!isset($_SESSION['noticias'])) {
    $_SESSION['noticias'] = array(
        new Noticia(
            "Foguete sul-coreano é lançado no Centro de Lançamento de Alcântara, no Maranhão",
            "A Força Aérea Brasileira (FAB) informou que foi lançado, neste domingo (19), o foguete sul-coreano HANBIT-TLV, no Centro de Lançamento de Alcântara (CLA), no Maranhão. (veja no vídeo acima o lançamento do dispositivo).
            O foguete foi lançado às 14h52 e a operação, chamada de 'Astrolábio', foi bem-sucedida. O lançamento foi feito em parceria com a empresa sul-coreana Innospace. O voo durou 4 minutos e 33 segundos.",
            "https://s2.glbimg.com/EVS11e5rkZNfWFTzuyw6beo1HmM=/0x0:3202x2138/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2023/E/X/N8MOz8TOGAjxD53WYuSQ/fru-7906.jpeg",
            "19/03/2023"
        )
    );
}

// Adiciona notícia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $resumo = $_POST['resumo'];
    $imagem = $_POST['imagem'];
    $data_publicacao = $_POST['data_publicacao'];
    $nova_noticia = new Noticia($titulo, $resumo, $imagem, $data_publicacao);
    $_SESSION['noticias'][] = $nova_noticia;
}

// Exibe as notícias
foreach ($_SESSION['noticias'] as $noticia) {
    echo "<div class='noticia'>";
    echo "<h2 class='titulo'>" . $noticia->titulo . "</h2>";
    echo "<p class='resumo'>" . $noticia->resumo . "</p>";
    echo "<img class='imagem' src='" . $noticia->imagem . "' alt='Imagem da Notícia'>";
    echo "<p class='data-publicacao'> Publicado em: " . $noticia->data_publicacao . "</p>";
    echo "</div>";
}

// Formulário para cadastrar nova notícia
echo "<div class='formulario'>";
echo "<form method='POST'>";
echo "<div class='campo'>";
echo "<label for='titulo'>Título:</label>";
echo "<input type='text' id='titulo' name='titulo'>";
echo "</div>";
echo "<div class='campo'>";
echo "<label for='resumo'>Resumo:</label>";
echo "<textarea id='resumo' name='resumo'></textarea>";
echo "</div>";
echo "<div class='campo'>";
echo "<label for='imagem'>URL da imagem:</label>";
echo "<input type='text' id='imagem' name='imagem'>";
echo "</div>";
echo "<div class='campo'>";
echo "<label for='data_publicacao'>Data de Publicação:</label>";
echo "<input type='date' id='data_publicacao' name='data_publicacao'>";
echo "</div>";
echo "<div class='campo'>";
echo "<input type='submit' value='Cadastrar'>";
echo "</div>";
echo "</form>";
echo "</div>";

?>
