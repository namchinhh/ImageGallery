<?php
/**
 * Copyright © 2015 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Magenest_QuickBooksDesktop extension
 * NOTICE OF LICENSE
 */
namespace Magenest\ImageGallery\Controller\Adminhtml\Group;

use Magenest\ImageGallery\Controller\Adminhtml\Group as GroupController;

/**
 * Class MassDelete
 * @package Magenest\ImageGallery\Controller\Adminhtml\Group
 */
class MassDelete extends GroupController
{
    /**
     * @return mixed
     */
    public function execute()
    {
        $collections = $this->_filter->getCollection($this->_collectionFactory->create());
        $totals = 0;
        try {
            foreach ($collections as $item) {
                /** @var \Magenest\ImageGallery\Model\Group $item */
                $item->delete();
                $totals++;
            }

            $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deteled.', $totals));
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->_getSession()->addException($e, __('Something went wrong while delete the post(s).'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');

    }
}
