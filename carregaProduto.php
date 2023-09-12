<?php
    header("Content-type: text/html; charset=utf-8"); 

    $cod = $_POST['codigo'];    


    include_once("conectar/conecta.php"); 

    mysqli_query($conectar, "SET NAMES utf8");
    $sql="SELECT produto.Nome as Nome, produto.Genero as Genero, produto.Id as Cod, produto.Foto as Foto, produto.Preco as Preco, produto.Categoria as Categoria, avg(avaliacao_produto.Quantidade) as media, count(produto.id) as Quantidade, produto.Requisitos as Req,        genero_produto.Descricao as Descricao FROM produto INNER JOIN avaliacao_produto on produto.Id = avaliacao_produto.Produto INNER JOIN genero_produto on produto.Genero = genero_produto.Id WHERE produto.id = $cod";
            $result = mysqli_query($conectar,$sql);


    $total =  mysqli_num_rows($result);
    $feito = 0;




    if($total > 0){
        while($row = mysqli_fetch_array($result)) {  
            


        
        if($row['Cod'] == null){
            header('Location: erro.php');
        }      

        echo("

            <div class='col-sm-12' id='pro' >

                <div class='col-md-4 col-sm-4 col-xs-4 fotoProduto'>
                    <img src='fotos/");
                    echo $row['Foto'];
                    echo ("'>                   
                </div>  

                <div class='col-md-8 col-sm-8 col-xs-8 comprarProduto'>
                    <div class='esp'>                        
                        <label class='nomeProd'>");
                        echo $row['Nome'];
                        echo("</label>
                        <h6 class='genero'>");
                        echo $row['Descricao'];
                        echo ("</h6>
                        <div class='avaliacao'>");
                            for ($i=0; $i < 5; $i++) { 
                                if($i < $row['media']){
                                    echo ("<i class='glyphicon glyphicon-star estrela'></i>");
                                }
                                else{
                                    echo ("<i class='glyphicon glyphicon-star'></i>");
                                }
                            }
                            
                            echo ("
                            <label>(");
                            echo $row['Quantidade'];
                            echo (")</label>
                        </div>
                        <label class='precoProd'>R$ ");
                        echo $row['Preco'];
                        echo("</label>  
                    </div>
                    <div class='venda'>");
                        echo "
                        <button  class='botaoCompra' onclick=\"";
                            echo ("enviaCarrinho");
                            $nome = $row['Nome'];
                            $Genero = $row['Genero'];
                            echo ("('".$nome);
                            echo ("'");
                            echo (",".$row['Cod']);
                            echo (")\">COMPRAR</button>
                    </div>
                    </div>
                ");


                if(($row['Req']!="")){

                    echo "<br><div class='collapse  col-xs-12' id='escond'>
                        <div class='col-md-12 requisitosProduto'>
                            <span class='ti'>Requisitos</span>
                            
                            
                                ";
                                echo "<pre>".$row['Req']."</pre>";
                                echo "
                            

                        </div>
                    </div>";

                    echo "<button class='btn btn-block botaoVer' id='VerMais' onclick='verMais(this.value)' value='Ver mais' data-toggle='collapse' href='#escond' role='button' aria-expanded='false' aria-controls='collapseExample'>Ver mais</button>";
                }
                else{
                    
                }
            
            


        }    


    }
    else{
        echo "nenhum produto encontrado";

    }       


    // Sugestão

    mysqli_query($conectar, "SET NAMES utf8");
    $sql="SELECT * FROM produto WHERE Nome != '$nome' AND Genero = '$Genero'  ORDER BY RAND()  LIMIT 6";
    $result = mysqli_query($conectar,$sql);


    $total =  mysqli_num_rows($result);
    $feito = 0;



    echo " 
    <label class='tii' style='text-align:left;'>Sugestões</label><div class='col-sm-12 sugestoesProduto' id='sug'>
            
    ";

    $feito=0;
    echo "<div class='slider responsive' id='slider' >";
    while($row = mysqli_fetch_array($result)) {  
    

        
            echo "
                    <div class='col-lg-2  sugestao'>
                        <img src='fotos/".$row['Foto']."'>
                        <div>
                            <label class='precoProduto'>R$ ".$row['Preco']."</label>
                            <div class='comprar'>
                                <a href='produto.php?cod=".$row['Id']."' class='verProduto'>Ver Produto</a>   
                            </div>
                            
                        </div>
                    </div>
                    
               ";

               
        
        
    }
    echo "</div>";


    

    mysqli_close($conectar);

?>
