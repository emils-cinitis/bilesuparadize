<?php
    class Image {
        public $path = '';
        public $width = 0;
        public $height = 0;

        function __construct(string $path, int $width, int $height) {
            $this->path = $path;
            $this->width = $width;
            $this->height = $height;
        }
    }

    class ImagesFromFolder {
        private static $images = array();

        function getImageInfo(string $folder, string $imagePath): void {
            $path = $folder . '/' . $imagePath;

            // Check if path isn't . or .. , otherwise add image to array
            if(file_exists($path) && $imagePath !== '.' && $imagePath !== '..') {
                $imageData = getimagesize($path);
                $imageInfo = new Image($path, $imageData[0], $imageData[1]);

                array_push(self::$images, $imageInfo);
            }
        }

        function getImagesFromFolder(string $folder): array {
            // Get all files in directory and sort by names
            $allImagesInFolder = scandir($folder);
            sort($allImagesInFolder, SORT_NATURAL);

            // Cycle all images and add to array
            foreach($allImagesInFolder as $imagePath) {
                self::getImageInfo($folder, $imagePath);
            }

            return self::$images;
        }
    }