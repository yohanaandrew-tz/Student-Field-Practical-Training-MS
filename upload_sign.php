<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Joseph Daniel Lupimo" />
        <title>SkyLink Solution</title>
        <link href="css/w3.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet" />
        <style type="text/css">
            a{text-decoration: none;}
        </style>
    </head>
    <body>
        <div class="w3-container">
            <div class="w3-container w3-center"><h4>Upload Signature</h4></div><br>
            <div class="w3-container w3-row-padding">
                <div class="w3-container w3-card-4">
                    
                    <form action="sign_submit.php" method="post" enctype="multipart/form-data">
                       <input class="w3-input w3-border" type="file" name="file" required>
                        <br>
                        <input name="upload" class="w3-button w3-blue" type="submit" value="Upload">
                    </form><br>
                </div>
            </div>
        </div>
    </body>
</html>