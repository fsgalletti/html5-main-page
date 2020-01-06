<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Beethoven Music Official</title>
        <link rel="icon" href="images/icon.png">
		
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <div id="container">

            <img  id="avatar" src="images/avatar.jpg" alt="Avatar" onError="this.onerror=null;this.src='/images/avatar_backup.ico';">

            <p id="bio">@beethoven</p>
            
            <div id="links">
            	<!-- Charges hover image without displaying -->
            	<img src="images/button-hover.jpg" style="display: none;">
                <?php
                    # JSON FILE
                    $json = file_get_contents("library.json");
                    
                    $library = json_decode($json);

                    $C = 0;
                    while($C < sizeof($library)){
                        if( !$library[$C]->hidden ){
                            echo '<div class="linkBox"><a class="linkFill" href="';
                            echo $library[$C]->link  . '" target="_blank">';
                            echo $library[$C]->title . '</a></div>';
                        }
                        $C++;
                    } 
                ?>
            </div>
        </div>
    </body>
</html>
