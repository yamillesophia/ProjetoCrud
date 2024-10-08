<?php
require 'banco.php';
$id = null;
if (!empty($GET['codigo'])){
    $id = $_REQUEST['codigo'];
}

if (null == $id){
    header("Location: index.php");

}
else{
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_alunos where codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Informações do Contato</title>

    <div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class= "card-header">
                <h3 class="well">Informações de contato</h3>
</div>
<div class= "container">
    <div class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Nome</lable>
            <div class="controls form-control disabled">
                <label class="carousel-inner">
                    <?php echo $data['nome']; ?>
</lable>
</div>
</div>
<div class="control-group">
    <label class="control-label">Endereço</label>
    <div class="controls form-control disabled">
        <lable class="carousel-inner">
            <?php echo $data['endereço']; ?>
</lable>
</div>
</div>
<div class="control-group">
    <label class="control-label">Telefone</label>
    <div class="controls form-control disabled">
        <lable class="carousel-inner">
            <?php echo $data['fone']; ?>
</lable>
</div>
</div>

<div class="control-group" >
    <label class="control-label" >Email</label>
    <div class="controls form-control disabled" >
        <label class="carousel-inner" >
            <?php echo $data['email']; ?>
        </label>
    </div>
</div>

<div class="control-group" >
    <label class="control-label" >Idade</label>
    <div class="controls form-control disabled" >
        <label class="carousel-inner" >
            <?php echo $data['idade']; ?>
        </label>
    </div>
</div>
<br/>
<div class="form-actions" >
    <a href="index.php" type="btn" class="btn btn-primary" >Voltar</a>
</div>
</div>
</div>
</div>
</div>