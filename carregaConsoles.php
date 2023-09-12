<?php
    $q = intval($_GET['q']);
    $qtd = intval($_GET['qtdP']);

    if(empty($q)){
        $q = "id";
    }
    else if($q==2){
        $q = "Preco desc";
    }
    else if($q==3){
        $q = "Preco asc";
    }

    include_once("conectar/conecta.php"); 

    $sql="SELECT * FROM produto WHERE categoria = 3  ORDER BY  ".$q." LIMIT $qtd";
    $result = mysqli_query($conectar,$sql);

    
    while($row = mysqli_fetch_array($result)) {
        echo("<div class='produto col-xs-6 col-sm-4 col-md-4 col-lg-3' >
                <div class='TOP'>");
                if(strlen($row['Nome'])>17){
                    $nom = substr($row['Nome'], 0, 17);
                    echo "<label class='nome'>". $nom."... </label>";
                }
                else{
                    echo "<label class='nome'>". $row['Nome']." </label>";
                }
                echo ("
                </div>
                <div class='MID' style='border:1px solid #072544'>
                    <img src='fotos/".$row['Foto']."'>
                </div>
                <div class='BOT'>
                    <div class='preco'>
                        <label >R$ ". $row['Preco'].",00</label>
                    </div>
                    <div class='comprar'>");
                        echo ("<a href='console.php?cod=".$row['Id']."'><button> Ver Produto</button></a>");
                        echo ("
                    </div>
                </div>
            </div>
            ");
    }    
   

    

    mysqli_close($conectar);


?>
