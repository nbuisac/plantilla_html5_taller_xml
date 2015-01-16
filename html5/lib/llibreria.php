<?php
function connectar() {
// connexió al servidor local
mysql_connect("localhost","root",""); // Connexió servidor Mysql
mysql_select_db("tallerxml"); // Escollim Base de Dades
// per al hosting de 000webhost
// mysql_connect("mysql8.000webhost.com","a2075070_xml","xml.XML1"); // Connexió servidor Mysql
// mysql_select_db("a2075070_xml"); // Escollim Base de Dades
}

function loginar($usuari,$password)
    {
        $sql = "SELECT * FROM usuaris WHERE usuari='$usuari' and contrasenya= MD5('$password') ";
        echo $sql ;
        $result = mysql_query($sql);
        if (mysql_num_rows($result) >0)  return 1;
        else return 0 ;
        
    }
function logout()
{
    session_start();
    unset($_SESSION["usuari"]);
    session_unset();
    header('location: index.php?accio=');
}

?>