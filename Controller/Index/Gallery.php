<?php
namespace Magenest\ImageGallery\Controller\Index;
class Gallery extends \Magento\Framework\App\Action\Action
{
    /**
     * Gallery action
     *
     * @return $this
     */
    /** @var \Magento\Framework\View\Result\PageFactory */
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}