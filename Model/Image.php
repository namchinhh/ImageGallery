<?php

namespace Magenest\ImageGallery\Model;
/**
 * Class Image
 * @package Magenest\ImageGallery\Model
 * @method int getImageId()
 * @method string getImage()
 * @method string getTitle()
 * @method string getDescription()
 * @method string getStatus()
 * @method int getSortorder()
 */
class Image extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Image constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
        null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
        null,
        array $data = []
    ) {

        parent::__construct($context, $registry, $resource,
            $resourceCollection, $data);

    }

    public function _construct()
    {

    $this->_init('Magenest\ImageGallery\Model\ResourceModel\Image');

    }
}