<?php

namespace Magenest\ImageGallery\Controller\Adminhtml\Group;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Magenest\ImageGallery\Controller\Adminhtml\Group
 */
class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_ImageGallery::group');
        $resultPage->addBreadcrumb(__('ImageGallery'), __('ImageGallery'));
        $resultPage->addBreadcrumb(__('Manage Groups'), __('Manage Groups'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Groups'));
        return $resultPage;

    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_ImageGallery::group');

    }
}