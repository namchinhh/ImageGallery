<?php
/**
 * Created by PhpStorm.
 */
namespace Magenest\ImageGallery\Controller\Adminhtml\Group;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;

/**
 * Class NewAction
 * @package Magenest\ImageGallery\Controller\Adminhtml\Group
 */
class NewAction extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Action\Context $context,
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * forward to edit
     *
     * @return $this
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Forward
         * $resultForward
         */
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return true;
    }
}
