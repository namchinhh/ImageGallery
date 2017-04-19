<?php
namespace Magenest\ImageGallery\Controller\Adminhtml\Gallery;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_ImageGallery::gallery');
        $resultPage->addBreadcrumb(__('ImageGallery'), __('ImageGallery'));
        $resultPage->addBreadcrumb(__('Manage Gallery'), __('Manage Gallery'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Gallery'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_ImageGallery::gallery');
    }
}