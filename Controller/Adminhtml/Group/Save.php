<?php
/**
 * Created by PhpStorm.
 */
namespace Magenest\ImageGallery\Controller\Adminhtml\Group;

use \Magento\Backend\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\MediaStorage\Model\File\Uploader;
use Psr\Log\LoggerInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Save
 * @package Magenest\ImageGallery\Controller\Adminhtml\Group
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var RequestInterface
     */
    protected $_request;

    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * @var Filesystem
     */
    protected $_filesystem;

    /**
     * @var UploaderFactory
     */
    protected $_fileUploaderFactory;

    /**
     * Save constructor.
     * @param Context $context
     * @param RequestInterface $request
     * @param Filesystem $filesystem
     * @param UploaderFactory $fileUploaderFactory
     */
    public function __construct(
        Context $context,
        RequestInterface $request,
        Filesystem $filesystem,
        UploaderFactory $fileUploaderFactory
    ) {

        $this->_request = $request;
        $this->_filesystem = $filesystem;
        $this->_fileUploaderFactory = $fileUploaderFactory;
        parent::__construct($context);
    }

    /**
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();

        \Magento\Framework\App\ObjectManager::getInstance()->create('Psr\Log\LoggerInterface')->debug(print_r($post, true));
        $resultRedirect = $this->resultRedirectFactory->create();


        try {
//            $postObject = new \Magento\Framework\DataObject();
//
//            $postObject->setData($post);



            $array=[
                'gallery_id'=>$post['gallery_test'] ,
                'group_code'=>$post['group_code'] ,
                'status'=>isset($post['status']) ? $post['status'] : null
            ];
            $model = $this->_objectManager->create('Magenest\ImageGallery\Model\Group');
            if(isset($post['group_id']))
            {
                $model->load($post['group_id']);
            }
//            $model->addData($post);
            $model->addData($array);



            $model->save();
            $this->messageManager->addSuccess(__('The rule has been saved.'));
            $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData(false);


            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
            }                return $resultRedirect->setPath('*/*/');

        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addError($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addError($e, __('Something went wrong while saving the rule.'));
            $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
            $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($post);
            return $resultRedirect->setPath('imagegallery/group/edit' ,['id'=>$this->getRequest()->getParam('id')]);
        }




    }



    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}
