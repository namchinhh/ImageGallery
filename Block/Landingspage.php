<?php

namespace Magenest\ImageGallery\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Landingspage
 * @package Magenest\ImageGallery\Block
 */
class Landingspage extends Template
{
    private $_imageCollectionFactory;

    protected $_galleryCollectionFactory;

    /**
     * Landingspage constructor.
     * @param Template\Context $context
     * @param array $data
     * @param \Magenest\ImageGallery\Model\ImageFactory $imageCollectionFactory
     * @param \Magenest\ImageGallery\Model\GalleryFactory $galleryCollectionFactory
     */
    public function __construct(
    Template\Context $context, array $data = [],
    \Magenest\ImageGallery\Model\ImageFactory $imageCollectionFactory,
    \Magenest\ImageGallery\Model\GalleryFactory $galleryCollectionFactory
    ) {
        parent::__construct($context, $data);
        $this->_imageCollectionFactory = $imageCollectionFactory;
        $this->_galleryCollectionFactory =$galleryCollectionFactory;
    }

    /**
     * @return string
     */
    public function getLandingsUrl()
    {
        return $this->getUrl('imagegallery');
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getUrl('imagegallery/index/gallery');
    }

    /**
     * load collection Image
     *
     * @return mixed
     */
    public function getLoadImageCollection()
    {
        $collection=$this->_imageCollectionFactory->create()->getCollection();

        return $collection;
    }

    /**
     * load collection gallery
     *
     * @return mixed
     */
    public function getLoadGalleryCollection()
    {
        $collection=$this->_galleryCollectionFactory->create()->getCollection();

        return $collection;
    }

}