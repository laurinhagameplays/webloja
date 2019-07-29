            <?php
 function addProduto($nomeProduto, $descricaoProduto, $precoProduto){
     $comando="insert into produto (nomeProduto, descricaoProduto, precoProduto)"
             . "values ('$nomeProduto','$descricaoProduto','$precoProduto')";
     $cnx= conn();
     $resul= mysqli_query($cnx, $comando);
     if(!$resul){
        die(mysqli_error($cnx));
    }
    return 'Produto cadastrado com sucesso!';
 }
 
 
 function pegarTodosProdutos(){
    $comando="select * from produto";
    $cnx= conn();
    $resul= mysqli_query($cnx, $comando);
    $produtos = array();
    while ($produto = mysqli_fetch_assoc($resul)){
        $produtos[]=$produto; 
    }
    return $produtos;
}


function pegarProdutoId($id){
    $comando= "select * from produto where idProduto= $id;";
    $cnx= conn();
    $resul= mysqli_query($cnx, $comando);
    $produto= mysqli_fetch_assoc($resul);
    return $produto;
}


function deletarProduto($id){
    $comando= "delete from produto where idProduto= $id;";
    $cnx= conn();
    $resul= mysqli_query($cnx, $comando);
    if(!$resul){
        die(mysqli_error($cnx));
    }
    return "Produto deletado";
}


function editarProduto($id, $nomeProduto, $descricaoProduto, $precoProduto){
    $comando="update produto set nomeProduto='$nomeProduto', descricaoProduto='$descricaoProduto', precoProduto='$precoProduto' where idProduto='$id';";
    $cnx=conn();
    $resul= mysqli_query($cnx, $comando);
    if(!$resul){
        die(mysqli_error($cnx));
    }
    return "Dados atualizados com sucesso!";
}




function addCategoria($nomeCategoria, $descricaoCategoria){
    $comando= "insert into categoria (nomeCategoria, descricaoCategoria) "
            . "values ('$nomeCategoria', '$descricaoCategoria');";
    $cnx= conn();
    $resul= mysqli_query($cnx, $comando);
    if(!$resul){
        die(mysqli_error($cnx));
    }
    return "Categoria cadastrada com sucesso!";
}

function pegarTodasCategorias(){
    $comando= "select * from categoria";
    $cnx= conn();
    $resul= mysqli_query($cnx, $comando);
    $categorias = array();
    while ($categoria = mysqli_fetch_assoc($resul)){
        $categorias[]=$categoria; 
    }
    return $categorias;
}

function pegarCategoriaId($id){
    $comando="select * from categoria where idCategoria= $id;";
    $cnx= conn();
    $resul= mysqli_query($cnx, $comando);
    $categoria= mysqli_fetch_assoc($resul);
    return $categoria;
}


function deletarCategoria($id){
    $comando= "delete from categoria where idCategoria=$id;";
    $cnx= conn();
    $resul= mysqli_query($cnx, $comando);
    if(!$resul){
        die(mysqli_error($cnx));
    }
    return "Categoria deletada";
}

function editarCategoria($id, $nomeCategoria, $descricaoCategoria){
    $comando="update categoria set nomeCategoria='$nomeCategoria', descricaoCategoria='$descricaoCategoria' where idCategoria='$id';";
    $cnx= conn();
    $resul= mysqli_query($cnx, $comando);
    if(!$resul){
        die(mysqli_error($cnx));
    }
    return "Dados atualizados com sucesso!";
}