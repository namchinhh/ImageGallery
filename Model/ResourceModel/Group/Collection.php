<?php
namespace Magenest\ImageGallery\Model\ResourceModel\Group;
/**
 * Group Collection
 */
class Collection extends
    \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    /**
     * Initialize resource collection
     **
    @return void
     */
    public function _construct() {
        $this->_init('Magenest\ImageGallery\Model\Group',
            'Magenest\ImageGallery\Model\ResourceModel\Group');
    }
}