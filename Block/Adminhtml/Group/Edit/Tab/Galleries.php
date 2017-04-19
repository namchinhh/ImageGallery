<?php
/**
 * Copyright © 2015 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Magenest_SuperEasySeo extension
 * NOTICE OF LICENSE
 */
namespace Magenest\ImageGallery\Block\Adminhtml\Group\Edit\Tab;



/**
 * Class General
 */
class Galleries extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magenest\ImageGallery\Model\ResourceModel\Gallery\Collection
     */
    protected $_galleryCollection;
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param\Magenest\ImageGallery\Model\ResourceModel\Gallery\Collection
    $galleryCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magenest\ImageGallery\Model\ResourceModel\Gallery\Collection
        $galleryCollection,
        array $data = []
    ) {
        $this->_galleryCollection = $galleryCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Image Found'));
    } /**
 * Initialize the gallery collection
 **
@return WidgetGrid
 */
    protected function _prepareCollection()
    {
        $this->setCollection($this->_galleryCollection);
        return parent::_prepareCollection();
    }
    /**
     * Prepare group grid column
     **
    @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'checked_gallery',
            [
                'type'             => 'checkbox',
                //                'values'           => $this->_getSelectedProducts(),
                'index'            => 'gallery_id',
                'header_css_class' => 'col-select col-massaction',
                'column_css_class' => 'col-select col-massaction',
            ]
        );


        $this->addColumn(
            'gallery_id',
            [
                'header' => __('Gallery ID'),
                'index' => 'gallery_id',
            ]
        );
        $this->addColumn(
            'image_id',
            [
                'header' => __('Image Ids'),
                'index' => 'image_id',
            ]
        );

        return $this;

    }
}