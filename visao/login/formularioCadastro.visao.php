<?php 
    if(ehPost()){
        foreach($erros as $erro){
            echo "*$erro<br>";
        }
    }
?>
<br>
    <form action="" method="POST">
        Nome completo: <input type="text" name="nomeCompletoCliente"><br><br>
        Email: <input type="text" name="emailCliente"><br><br>
        Senha: <input type="password" name="senhaCliente"><br><br>
        Confirme sua senha: <input type="password" name="confirmaSenhaCliente"><br><br>
        <input type="submit">
    </form>
