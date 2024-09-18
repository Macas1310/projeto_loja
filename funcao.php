<?php 

// $numero1 = 13;

// $numero2 = 14;

// $resultado = $numero1 + $numero2;
// echo "sua soma é: $resultado";

// implementacao de funcao de soma

    function soma($n1,$n2){ 
        $resultado = $n1+$n2;
        echo "O resultado é: $resultado";
        echo"<br>";
}
echo "<br>";
soma(10,5);
echo "<br>";
soma(50,40);        



function subtracao($n1,$n2){    
    $resultado = $n1-$n2;
    echo "O resultado é: $resultado";
}
echo"<br>";
subtracao(10,2);
echo"<br>";

echo"<br>";

function divisao($n1,$n2){    
    $resultado = $n1/$n2;
    echo "O resultado é: $resultado";
}
divisao(50,10);
echo"<br>";


?>