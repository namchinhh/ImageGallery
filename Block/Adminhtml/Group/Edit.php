<?php
/**
 * Created by PhpStorm.
 */
namespace Magenest\ImageGallery\Block\Adminhtml\Group;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Edit button
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Magenest_ImageGallery';
        $this->_controller = 'adminhtml_group';

        parent::_construct();

        $this->buttonList->update('save', 'image', __('Save Information'));
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                    ],
                ]
            ],
            -100
        );

        $this->buttonList->update('delete', 'label', __('Delete'));
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('group')->getId()) {
            return __("Edit Group '%1'", $this->escapeHtml($this->_coreRegistry->registry('group')->getType()));
        } else {
            return __('New Group');
        }
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('imagegallery/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '{{tab_id}}']);
    }
}