<!DOCTYPE html>
<html lang="en-US">
    <head>
    	<?php
        	# JSON FILE
            $json = file_get_contents("settings.json");
                    
            $settings = json_decode($json);
        ?>
        <title><?php echo $settings->title; ?></title>
        <link rel="icon" href="images/<?php echo $settings->images->icon; ?>">
		
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		
        <link rel="stylesheet" type="text/css" href="main.css">
        
        <style>
        	html, body {
				max-width: 100%;
				overflow-x: hidden;
			}
			body {
            	<?php
                    if( !$settings->bkg->hidden ){
                       	echo "background: url(images/";
                        echo $settings->bkg->pc . ");";
                        echo "background-size: 100%;";
                        echo "background-repeat: repeat;";
                        echo "background-position: center center;";
                    }
				?>

                background-color: <?php echo $settings->css->bkgColor; ?>;
            }
            #container {
                margin: auto;
                width: 100%;
                height: 100%;

                padding-right: 50%;
                padding-left: 50%;
            }
            #avatar{
                margin-right: -4%;
                margin-left: -4%;

                width: 8%;

                background-color: grey;
                border: 2px solid <?php echo $settings->colors->border; ?>;
                border-radius: 50%;
            }
            #bio {
                margin-right: -50%;
                margin-left: -50%;

                width: 100%;

                text-align: center;
                color: <?php echo $settings->colors->text; ?>;
                text-decoration: none;
            }
            #bio, .linkBox{
                font-family: Verdana;
                text-shadow: 1px 1px 1px black;
            }
            .linkBox {
                /* Margin decrease for centering */
                margin-right: -16%;
                margin-left: -16%;

                margin-bottom: 8px;

                width: 32%;
                height: 40px;

                border: 2px solid <?php echo $settings->colors->border; ?>;

                background-color: rgba(0, 0, 0, 0.22);

                cursor: pointer;
            }
            .linkBox:hover {
                background-color: rgba(255, 255, 255, 0.8);
                background-image: url(images/<?php echo $settings->images->buttonHover; ?>);
                border-color: <?php echo $settings->colors->borderHover; ?>;
            }
            .linkBox:hover a {
                color: <?php echo $settings->colors->textHover; ?>;
            }
            .linkFill {
                display: inline-block;
                width: 100%;
                height: 100%;

                /*** TEXT ***/
                text-align: center;
                color: <?php echo $settings->colors->text; ?>;
                text-decoration: none;

                line-height: 40px;
            }
            
            /*** MOBILE ***/
            @media only screen and (max-width:620px) {	
                body {
                	<?php
                    	if( !$settings->images->bkg->hidden ){
                        	echo "background: url(images/";
                            echo $settings->images->bkg->mobile . ");";
                            echo "background-size: 100% auto;";
                            echo "background-repeat: repeat;";
                            echo "background-position: center center;";
                        }
					?>
                }
                #avatar {
                    margin-right: -16%;
                    margin-left: -16%;

                    width:32%;
                }
                .linkBox {
                    /*margin decrease for centering*/
                    margin-right: -48%;
                    margin-left: -48%;

                    width:96%;
                }
            }
        </style>
    </head>

    <body>
        <div id="container">

            <img  id="avatar" src="images/<?php echo $settings->images->avatar; ?>" alt="Avatar" onError="this.onerror=null;this.src='/images/avatar_backup.ico';">

            <p id="bio"><?php echo $settings->bio; ?></p>
            
            <div id="links">
            	<!-- Charges hover image without displaying -->
            	<img src="images/<?php echo $settings->images->buttonHover; ?>" style="display: none;">
                <?php
                    $C = 0;
                    while($C < sizeof($settings->links)){
                        if( !$settings->links[$C]->hidden ){
                            echo '<div class="linkBox"><a class="linkFill" href="';
                            echo $settings->links[$C]->link  . '" target="_blank">';
                            echo $settings->links[$C]->title . '</a></div>';
                        }
                        $C++;
                    } 
                ?>
            </div>
        </div>
    </body>
</html>
