<?php
/**
 * Created by PhpStorm.
 */
namespace Magenest\ImageGallery\Block\Adminhtml\Group\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('page_base_fieldset');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Information'));
    }

    /**
     * render tabs layout
     */
    protected function _prepareLayout()
    {
        $this->addTab('general',
            ['label' => __('General'),
                'content' => $this->getLayout()->createBlock(
                    'Magenest\ImageGallery\Block\Adminhtml\Group\Edit\Tab\Main',
                    'imagegalley.group.tab.general'
                )->toHtml(),
            ]);
        $this->addTab('galleries',
            ['label' => __('Galleries'),
                'content' => $this->getLayout()->createBlock(
                    'Magenest\ImageGallery\Block\Adminhtml\Group\Edit\Tab\Galleries',
                    'imagegalley.group.tab.galleries'
                )->toHtml(),
            ]);
    }
}
