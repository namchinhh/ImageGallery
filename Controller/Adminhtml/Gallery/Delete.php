<?php
/**
 * Created by PhpStorm.
 */
namespace Magenest\ImageGallery\Controller\Adminhtml\Gallery;

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
 * @package Magenest\ImageGallery\Controller\Adminhtml\Image
 */
class Delete extends \Magento\Backend\App\Action
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
        $post = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($post) {
            try {
//                $postObject = new \Magento\Framework\DataObject();
//                $postObject->setData($post);

                $model = $this->_objectManager->create('Magenest\ImageGallery\Model\Gallery');
//                if(isset($post['image_id']))
//                {
                $model->load($post);
//                }
                $model->delete();

                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData(false);
                return $resultRedirect->setPath('*/*/');

            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError($e, __('Something went wrong while saving the rule.'));
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($post);
                return $resultRedirect->setPath('imagegallery/gallery/edit' ,
                    ['id'=>$this->getRequest()->getParam('id')]);

            }
        }



        return $resultRedirect->setPath('*/*/');

    }

    /**
     * @param $value
     * @param $data
     * @return string
     */


    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;

    }
}
