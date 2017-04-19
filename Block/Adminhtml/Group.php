<?php

namespace Magenest\ImageGallery\Block\Adminhtml;

/**
 * Class Group
 * @package Magenest\ImageGallery\Block\Adminhtml
 */
class Group extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_ImageGallery';
        $this->_controller = 'adminhtml_group';
        parent::_construct();
    }

}