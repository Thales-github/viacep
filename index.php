<?php


    // create curl resource
    $curl = curl_init();

    // set url
    curl_setopt($curl, CURLOPT_URL, "https://viacep.com.br/ws/02990010/json/");

    //return the transfer as a string
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $output = curl_exec($curl);

    var_dump(json_decode($output));

    // close curl resource to free up system resources
    curl_close($curl);     

    
?>