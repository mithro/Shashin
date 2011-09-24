<?php

abstract class Public_ShashinPhotoDisplayerPicasa extends Public_ShashinDataObjectDisplayer {
    public function __construct() {
        $this->validThumbnailSizes = array(32, 48, 64, 72, 94, 104, 110, 128, 144, 150, 160, 200, 220, 288, 320, 400, 512, 576, 640, 720, 800, 912, 1024, 1152, 1280, 1440, 1600);
        $this->validCropSizes = array(32, 48, 64, 72, 104, 144, 150, 160);
        $this->thumbnailSizesMap = array(
            'xsmall' => 72,
            'small' => 160,
            'medium' => 320,
            'large' => 640,
            'xlarge' => 800,
        );
        $this->expandedSizesMap = array(
            'xsmall' => 400,
            'small' => 640,
            'medium' => 800,
            'large' => 1024,
            'xlarge' => 1280,
        );
        parent::__construct();
    }

    public function setImgAltAndTitle() {
        // there may already be entities in the description, so we want to be very
        // conservative with what we replace
        $this->imgAltAndTitle = str_replace('"', '&quot;', $this->dataObject->description);
        return $this->imgAltAndTitle;
    }

    public function setImgSrc() {
        $this->imgSrc = $this->thumbnail->contentUrl;
        $this->imgSrc .= '?imgmax=' . $this->actualThumbnailSize;

        if ($this->displayCropped) {
            $this->imgSrc .= '&amp;crop=1';
        }

        return $this->imgSrc;
    }

    public function setCaption() {
        if ($this->shortcode->caption == 'y' && $this->dataObject->description) {
            $this->caption = '<span class="shashinThumbnailCaption">'
                . $this->dataObject->description
                . '</span>';
        }

        return $this->caption;
    }

    public function setActualExpandedSizeFromRequestedSize() {
        if (array_key_exists($this->settings->highslideMax, $this->expandedSizesMap)) {
            $numericSize = $this->expandedSizesMap[$this->settings->highslideMax];
        }

        else {
            throw New Exception("invalid size requested");
        }

        foreach ($this->expandedSizesMap as $size) {
            if ($numericSize <= $size) {
                $this->actualExpandedSize = $size;
                break;
            }
        }
        return $this->actualExpandedSize;
    }

    public function setLinkIdForImg() {
        $this->linkIdForImg = 'shashinThumbnailLink_' . $this->sessionManager->getThumbnailCounter();
        return $this->linkIdForImg;
    }

    // degenerate
    public function setLinkIdForCaption() {
        return null;
    }
}