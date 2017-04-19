<?php
namespace Magenest\ImageGallery\Block;
use Magento\Framework\View\Element\Template;
class Landingspage extends Template
{
    private $_imageCollectionFactory;


    public function __construct(Template\Context $context, array $data = [],
    \Magenest\ImageGallery\Model\ImageFactory $imageCollectionFactory,
    \Magenest\ImageGallery\Model\GalleryFactory $galleryCollectionFactory
    )
    {

        parent::__construct($context, $data);
        $this->_imageCollectionFactory = $imageCollectionFactory;
        $this->_galleryCollectionFactory=$galleryCollectionFactory;
    }

    public function getLandingsUrl()
    {
        return $this->getUrl('imagegallery');
    }
    public function getRedirectUrl()
    {
        return $this->getUrl('imagegallery/index/gallery');
    }
    public function getLoadImageCollection()
    {
        $collection=$this->_imageCollectionFactory->create()->getCollection();
        return $collection;
    }
    public function getLoadGalleryCollection()
    {
        $collection=$this->_galleryCollectionFactory->create()->getCollection();
        return $collection;
    }

}