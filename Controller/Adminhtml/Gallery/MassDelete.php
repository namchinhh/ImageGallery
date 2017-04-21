<?php
/**
 * Copyright © 2015 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Magenest_QuickBooksDesktop extension
 * NOTICE OF LICENSE
 */
namespace Magenest\ImageGallery\Controller\Adminhtml\Gallery;

use Magenest\ImageGallery\Controller\Adminhtml\Gallery as GalleryController;

/**
 * Class MassDelete
 * @package Magenest\ImageGallery\Controller\Adminhtml\Gallery
 */
class MassDelete extends GalleryController
{
    /**
     * @return mixed
     */
    public function execute()
    {
//        $collections = $this->_filter->getCollection($this->_collectionFactory->create());
        $collection = $this->getRequest()->getParams();
        $model = \Magento\Framework\App\ObjectManager::getInstance()->create('Magenest\ImageGallery\Model\Gallery');
        $cols = $collection['selected'];
        $totals = 0;
        try {
            foreach ($cols as $item) {
                /** @var \Magenest\ImageGallery\Model\Gallery $item */
                $model ->load($item);
                $model->delete();
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
