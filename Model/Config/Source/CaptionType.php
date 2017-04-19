<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Used in creating options for Yes|No config value selection
 *
 */
namespace Magenest\ImageGallery\Model\Config\Source;

class CaptionType implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [['value' => 0, 'label' => __('Float')]
            , ['value' => 1, 'label' => __('Inside')]
            ,['value' => 2, 'label' => __('Outside')]
            ,['value' => 3, 'label' => __('Over')]];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [0 => __('Float'), 1 => __('Inside'),2 => __('Outside'),3 => __('Over')];
    }
}
