<?php
namespace Magenest\ImageGallery\Model\ResourceModel;

class Group extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magenest_image_gallery_gallery_group', 'group_id');
    }
}