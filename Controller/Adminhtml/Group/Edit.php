<?php
/**
 * Created by PhpStorm.
 * User: gialam
 * Date: 17/02/2016
 * Time: 14:12
 */
namespace Magenest\ImageGallery\Controller\Adminhtml\Group;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;

/**
 * Class Edit
 * @package Magenest\ImageGallery\Controller\Adminhtml\Group
 *
 */
class Edit extends Action
{
    /**
     * @var \Magento\Framework\Registry|null
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Edit constructor.
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_ImageGallery::group')
            ->addBreadcrumb(__('Manage Group'), __('Manage Group'));
        return $resultPage;
    }

    /**
     * @return $this|\Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('Magenest\ImageGallery\Model\Group');

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This group no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        // 3. Set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        // 4. Register model to use later in blocks
        $this->_coreRegistry->register('group', $model);

        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()
            ->prepend($id ? __('Edit Group') : __('New Group'));

        return $resultPage;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return true;
    }
}
