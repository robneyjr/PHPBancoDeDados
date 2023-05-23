<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $conn = new PDO('mysql:host=localhost;dbname=Login', 'root', 'etec');
   
   

    $query = $conn->prepare("SELECT * FROM tbUsuario WHERE nmUsuario = :usuario AND dsSenha = :senha");
    $query->bindParam(':usuario', $usuario);
    $query->bindParam(':senha', $senha);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
  
    if ($result) {
        $_SESSION['usuario'] = $usuario; 
        header("Location: conteudo.html");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>
