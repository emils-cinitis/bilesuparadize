<?php
    declare(strict_types = 1);

    require_once('classes/image.php');

    $imageFromFolder = new ImagesFromFolder();
    $images = $imageFromFolder::getImagesFromFolder('assets');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biļešuparadīze test</title>

        <link rel="stylesheet" href="gfx/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container-large">
            <div class="container">
                <div class="text-container">
                    <h3>All given images:</h3>
                </div>
                <div class="all-image-container">
                    <?php foreach($images as $image): ?>
                        <div class="image-container">
                            <img src="<?= $image->path ?>" class="example-image" alt="Example image" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="container hidden">
                <div class="text-container">
                    <h3>Generated image:</h3>
                </div>
                <img id="generatedImage" src="" alt="Generated image" />
            </div>
        </div>

        <div class="button-container"> 
            <button id="generateCollage" class="button">Generate</button>
        </div>

        <script src="gfx/js/main.js"></script>
    </body>
</html>