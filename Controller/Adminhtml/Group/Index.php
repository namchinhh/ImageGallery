<?php
namespace Magenest\ImageGallery\Controller\Adminhtml\Group;
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
        $resultPage->setActiveMenu('Magenest_ImageGallery::group');
        $resultPage->addBreadcrumb(__('ImageGallery'), __('ImageGallery'));
        $resultPage->addBreadcrumb(__('Manage Groups'), __('Manage Groups'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Groups'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_ImageGallery::group');
    }
}