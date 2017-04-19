<?php
/**
 * Copyright © 2015 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 *
 *
 * Magenest_Blog extension
 * NOTICE OF LICENSE
 *
 * @category  Magenest
 * @package   Magenest_Blog
 * @author <ThaoPV>-thaopw@gmail.com
 */
namespace Magenest\ImageGallery\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

/**
 * Class GroupActions
 * @package Magenest\ImageGallery\Ui\Component\Listing\Columns
 */
class GroupActions extends Column
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $groupId = $this->context->getFilterParam('group_id');

            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->urlBuilder->getUrl(
                        'imagegallery/group/edit',
                        ['id' => $item['group_id'], 'image' => $groupId]
                    ),
                    'label' => __('Edit'),
                    'hidden' => false,
                ];
            }
        }

        return $dataSource;
    }
}
