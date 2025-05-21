<?php


    if (isset($_POST['id']) && $_POST['id'] != null) {
        $id_content = testAjax();
    }
    else {
        $id_content = testNokAjax();
    }

    function testAjax(){
        echo "OK";
        exit;
    }
    function testNokAjax(){
        echo "NOK";
        exit;
    }