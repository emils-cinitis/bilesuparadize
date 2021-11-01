<?php 
    class Collage {
        private static $oneImageWidth;
        private static $oneImageHeight;
        private static $paddingX;
        private static $paddingY;
        private static $imageCountX;
        private static $imageCountY;

        private static $collage;

        function __construct(
            int $oneImageWidth, 
            int $oneImageHeight, 
            int $paddingX, 
            int $paddingY, 
            int $imageCountX, 
            int $imageCountY
        ) {
            self::$oneImageWidth = $oneImageWidth;
            self::$oneImageHeight = $oneImageHeight;
            self::$paddingX = $paddingX;
            self::$paddingY = $paddingY;
            self::$imageCountX = $imageCountX;
            self::$imageCountY = $imageCountY;
        }

        function createNewCollage() {
            // Calculate collage width including paddings
            $collageWidth = (self::$oneImageWidth * self::$imageCountX) + 
                ((self::$imageCountX - 1) * self::$paddingX);

            // Calculate collage height including paddings
            $collageHeight = (self::$oneImageHeight * self::$imageCountY) + 
                ((self::$imageCountY - 1) * self::$paddingY);

            // Create image object with calculated sizes
            $collage = imagecreatetruecolor($collageWidth, $collageHeight);
            // Set image transparent
            imagesavealpha($collage, true);
            $color = imagecolorallocatealpha($collage, 0, 0, 0, 127);
            imagefill($collage, 0, 0, $color);

            self::$collage = $collage;
        }

        function addImageToCollage(string $imagePath, int $imageNumber, int $imageCount) {
            // Create image object from saved image
            $image = imagecreatefrompng($imagePath);

            // Calculate image X and Y offset
            $posX = ($imageNumber % self::$imageCountX) * (self::$oneImageWidth + self::$paddingX);
            $posY = (int) floor($imageNumber / self::$imageCountX) * (self::$oneImageHeight + self::$paddingY);

            // Copy image to collage
            imagecopy(
                self::$collage,
                $image,
                $posX,
                $posY,
                0,
                0,
                self::$oneImageWidth,
                self::$oneImageHeight
            );
        }

        function saveCollage(string $fileName) {
            $path = $fileName . '.png';
            imagepng(self::$collage, $path);

            return $path;
        }
    }