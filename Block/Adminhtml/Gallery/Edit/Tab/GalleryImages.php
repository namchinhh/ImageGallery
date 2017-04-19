<?php
/**
 * Copyright © 2015 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Magenest_SuperEasySeo extension
 * NOTICE OF LICENSE
 */
namespace Magenest\ImageGallery\Block\Adminhtml\Gallery\Edit\Tab;



/**
 * Class General
 */
class GalleryImages extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magenest\ImageGallery\Model\ResourceModel\Image\Collection
     */
    protected $_imageCollection;
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Magenest\ImageGallery\Model\ResourceModel\Image\Collection
     $imageCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magenest\ImageGallery\Model\ResourceModel\Image\Collection
        $imageCollection,
        array $data = []
    ) {
        $this->_imageCollection = $imageCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Image Found'));
    } /**
 * Initialize the gallery collection
 **
@return WidgetGrid
 */
    protected function _prepareCollection()
    {
        $this->setCollection($this->_imageCollection);
        return parent::_prepareCollection();
    }
    /**
     * Prepare grid columns
     **
    @return $this
     */
    protected function _prepareColumns()
    {

        $this->addColumn(
            'checked_image',
            [
                'type'             => 'checkbox',
                'index'            => 'image_id',
                'required'  => true,
                'header_css_class' => 'col-select col-massaction',
                'column_css_class' => 'col-select col-massaction',
            ]
        );


//        $this->addColumn(
//            'checked_thumbnail',
//            [
//                'type' => 'checkbox',
//                'name' => 'thumbnail_id',
//                'index'=>'image_id',
//                'required'  => true,
////                'values'=> $this->_getSelectedImageId(),
//                'header_css_class' => 'col-select col-massaction',
//                'column_css_class' => 'col-select col-massaction',
//            ]
//        );

        $this->addColumn(
            'image',
            array(
                'header' => __('Image'),
                'index' => 'image',
                'renderer'  => '\Magenest\ImageGallery\Block\Adminhtml\Gallery\Grid\Renderer\Image',
            )
        );
        $this->addColumn(
            'title',
            [
                'header' => __('Title'),
                'index' => 'title',
            ]
        );
        $this->addColumn(
            'description',
            [
                'header' => __('Description'),
                'index' => 'description',
            ]
        );


        return $this;
    }
}