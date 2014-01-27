<?php
class GalleryViewer extends CWidget
{
    /** @var Gallery Model of gallery to manage */
    public $gallery;
    /** @var string Route to gallery controller */
    public $controllerRoute = false;
    public $assets;
    public $gallerypath;
    public $htmlOptions = array();


    /** Render widget */
    public function run()
    {
        /** @var $cs CClientScript */
        $photos = array();
        foreach ($this->gallery->galleryPhotos as $photo) {
            $photo->galleryDir = $photo->galleryDir."/".$this->gallerypath;
            /*$photos[] = array(
                'id' => $photo->id,
                'rank' => $photo->rank,
                'name' => (string)$photo->name,
                'description' => (string)$photo->description,
                'preview' => $photo->getPreview(),
            );*/
        }

        $this->render('galleryViewer', array('photos'=>$this->gallery->galleryPhotos, 'groupalias'=>$this->gallerypath));
    }

}
?>