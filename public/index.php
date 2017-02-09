<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ToucanTech</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <!-- Top navigation -->
            <nav>
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo right">ToucanTech</a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <li><a href="/toucantech-mvc/public/members/">Members</a></li>
                        <li><a href="/toucantech-mvc/public/schools/">Schools</a></li>
                    </ul>
                </div>
            </nav>
            
            <div class="row">
                <div class="col s12">
<?php

require_once '../app/init.php';

$app = new App($connection);

?>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        
    </body>
</html>