<?php
    #Defining some Contants Database Credentials --->
    define("SERVER_NAME","localhost");
    define("USER_NAME","root");
    define("PASSWORD","aubynj");
    define("CASA_DB_NAME","CASAUCC");

    $database = mysqli_connect(SERVER_NAME,USER_NAME,PASSWORD,CASA_DB_NAME) or die("Sorry we're having connection problem");
