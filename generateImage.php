<?php
    require_once('classes/image.php');
    require_once('classes/collage.php');

    // Given variables from task
    $imageSetWidth = 362;
    $imageSetHeight = 544;
    $paddingSetSize = 10;

    $imageCountWidth = 5;
    $imageCountHeight = 2;

    // Get all image paths and sizes
    $imageFromFolder = new ImagesFromFolder();
    $images = $imageFromFolder::getImagesFromFolder('assets');

    // Create a new class collage
    $collage = new Collage($imageSetWidth, $imageSetHeight, $paddingSetSize, $paddingSetSize, $imageCountWidth, $imageCountHeight);

    // Create new collage image
    $collage::createNewCollage();

    // Add all images to collage
    foreach($images as $key => $image) {
        $collage::addImageToCollage($image->path, $key, count($images));
    }

    // Save collage with given name
    $path = $collage::saveCollage('result');

    echo $path;