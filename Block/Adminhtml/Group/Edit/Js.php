<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 05/07/2016
 * Time: 11:01
 */
namespace Magenest\ImageGallery\Block\Adminhtml\Group\Edit;

use Magento\Backend\Block\Template\Context;

/**
 * Class Js
 * @package Magenest\ImageGallery\Block\Adminhtml\Group\Edit
 */
class Js extends \Magento\Backend\Block\Template
{
    /**
     * @var \Magenest\ImageGallery\Model\Group
     */
    protected $group;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;

    /**
     * Js constructor.
     * @param Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magenest\ImageGallery\Model\Group $group
     * @param array $data
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Registry $registry,
        \Magenest\ImageGallery\Model\GroupFactory $group,
        array $data
    ) {
        $this->group = $group;
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getDataGroup()
    {
        $data = $this->_request->getParams();
        $model = $this->group->create()->load($data['id']);

        return $model;

    }

    /**
     * @return int
     */
    public function getAssignType()
    {
        $data = $this->_request->getParams();
        $id = 0 ;
        if (isset($data['id'])) {
            $model = $this->getDataGroup();
            $id = $model->getAssignType();
        }

        return $id;

    }

    /**
     * @return string
     */
    public function getApplyGallery()
    {

            $applyGallery = $this->getDataGroup()->getGalleryId();
            $result = json_encode(explode(",", $applyGallery));


        return $result;

    }

    /**
     * @return bool
     */
    public function checkEdit()
    {
        $data = $this->_request->getParams();
        if (isset($data['id'])) {
            return 1;
        }

        return 2;
    }
}
