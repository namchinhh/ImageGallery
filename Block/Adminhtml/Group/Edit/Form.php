<?php
/**
 * Copyright © 2015 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Magenest_SuperEasySeo extension
 * NOTICE OF LICENSE
 */
namespace Magenest\ImageGallery\Block\Adminhtml\Group\Edit;

/**
 * Class Form
 * @package Magenest\ImageGallery\Block\Adminhtml\Group\Edit
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected $_prepareForm;
    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post', 'enctype' => 'multipart/form-data']]
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}