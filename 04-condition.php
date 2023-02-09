

<?php

//1- La condition IF/ELSE

$a = 10;
$b = 5;
$c = 2;

/*
Si "a" est supérieur à "b" on affiche : "a est bien supérieur à b", sinon : "non, c'est b qui est supérieur à a"

*/

if($a > $b){
    echo "a est bien supérieur à b <br>";

}
else 
{
    echo "non, c'est b qui est supérieur à a <br>";
}

// 2-LA condition avec AND (&&)
/*
Si "a" est supérieur à "b" et que"b" est aussi supérieur à "c", alors on affiche :
"a est supérieur à b et b est supérieur à c"
*/

if($a > $b && $b > $c){
    echo "a est supérieur à b, et, b est supérieur à c";

}

//3-La condition avec "OR" (//)
/*
Si "a" correspond à 9 ou "b" est supérieur à "c", on affiche :
Au moins l'une des 2 conditions est bonne (ou peut-être les deux), sinon vous ne me verrez pas m'afficher !

*/

if($a == 9 || $b > $c){
    echo "<br>au moins l'une des deux conditions est bonne";
}

//4-Les conditions avec IF / ELSE IF / ELSE 
/*
Si a correspond à 8, on affiche 1- a est égal à 8 sinon si a est différent de 10, on affiche : 2- a est différent de 10, sinon on affiche : 3- tout le monde a faux, a n'est pas égal à 8 et n'est pas différent de 10. Du coup c'est moi le ELSE qui gagne !
*/

//----------------IF-----------------------
/*
*Les instructions IF seront toutes testées à la chaîne les unes après les autres

Les instructions ELSEIF seront testées uniquement si les conditions au dessus n'ont pas été évaluées comme TRUE (vrai) et n'ont pas donné satisfaction.
*/

if($a ==8) {
    echo "<br>1- a est égal à 8<br>";
} else if($a !=10){
    echo "<br>2- a est différent de 10 <br>";
} else {
    echo "<br>3- tout le monde a faux, a n'est pas égal à 8 et n'est pas différent de 10. Du coup c'est moi le else qui gagne !<br>";
}

// 5-Condition IF / ELSE sous forme contracté
echo ($a == 10 ) ?"a est égal à 10 <br>" : "a n'est pas égal à 10<br>";

// 6- Condition de comparaison

$vara = 1;
$varb = 1;

if($vara == $varb){
    echo "il sagît de la même valeur";
}
//-------------------------------------------

if($vara === $varb){
    echo "il s'agît de la même valeur et du même type<br>";
}

// 7- Condition SWITCH

$monPays = "france";

if($monPays == "italie"){
    echo "vous êtes italien !<br>";
} elseif($monPays == "espagne"){
    echo "vous êtes espagnol !<br>";
} elseif($monPays == "angleterre"){
    echo "vous êtes anglais !<br>";
}elseif($monPays == "france"){
    echo "vous êtes français !<br>";
}elseif($monPays == "maroc"){
    echo "vous êtes marocain !<br>";
}else{
    echo "votre pays n'est pas recensé !<br>";
}



// SWITCH

switch($monPays){
    case 'italie';
        echo "vous êtes italien";
    break;
    case 'espagne';
    echo "vous êtes espagnol";
    break;
    case 'Angleterre';
        echo "vous êtes anglais";
    break;
    case 'france';
        echo "vous êtes français";
    break;
    case 'maroc';
    echo "vous êtes marocain";
    break;
    default : 
    echo "votre pays n'est pas recensé<br>";
}