<?php

/* Control Motor From Mobile */
if(isset($_GET['motor'])){

    /* Open File that store Motor status */
    $motorStatus = fopen('motor.txt','w');
    // check the param is not embty
    if($_GET['motor'] == 1){

        fwrite($motorStatus,'1');
        $statuson = 1;
        $motorJasonObjest = '{"motor":'.$statuson.'}';
        echo($motorJasonObjest);

    }else if ($_GET['motor'] == 0){

        fwrite($motorStatus,'0');
        $statusoff = 0;
        $motorJasonObjest = '{"motor":'.$statusoff.'}';
        echo($motorJasonObjest);
        
    }

    /* Monitoring Temperature */
}else if(isset($_GET['getTemp'])){

    // if the mobile request
    if($_GET['getTemp'] == 5000){
    /* Open File that store Temperature status */
    $handletemp = fopen('temp.txt','r');
    // '{"temp":30}'
    $temperature = fread($handletemp,filesize('temp.txt'));
    $tempJasonObjest = '{"temp":'.$temperature.'}';
    echo($tempJasonObjest);

    // if the ESP request
    }else {

        $tempFile = fopen('temp.txt','w');
        fwrite($tempFile,$_GET['getTemp']);
        echo ("Temp is set");

    }


    /* Monitoring Speed */
}else if (isset($_GET['getSpeed'])){
    if (($_GET['getSpeed'] == 5000) && ($_GET['client'] == 'flutter')){
        /* Open File that store Temperature status */
        $handlespeed = fopen('speed.txt','r');
        // '{"speed":100}'
        $speed = fread($handlespeed,filesize('speed.txt'));
        $speedJasonObjest = '{"speed":'.$speed.'}';
        echo($speedJasonObjest);

    }else if ($_GET['client'] == 'esp'){

        $speedFile = fopen('speed.txt','w');
        fwrite($speedFile,$_GET['getSpeed']);
        echo("Speed is set");

    /* Control Speed From Mobile */
    }else if (($_GET['client'] == 'flutter') && ($_GET['mode'] == 'control')){

        $speedFile = fopen('speed.txt','w');
        fwrite($speedFile,$_GET['getSpeed']);
        echo("Speed is set");

    }
    


}


?>

