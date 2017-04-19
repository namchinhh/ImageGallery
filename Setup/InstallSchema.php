<?php

namespace Magenest\ImageGallery\Setup;

/**
 * Class InstallSchema
 * @package Magenest\ImageGallery\Setup
 */
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    /**
     * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     */
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ){
        $installer = $setup;
        $installer->startSetup();
        // create image table
        $tableImage = $installer->getConnection()
            ->newTable($installer->getTable('magenest_image_gallery_image'))
            ->addColumn(
                'image_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true]

            )->addColumn(
                'image',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false]
            )->addColumn(
                'title',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                30,
                ['nullable' => false]
            )->addColumn(
                'description',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false]
            )->addColumn(
                'sortorder',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,['nullable' => false]
            )->addColumn(
                'status',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                10,
                ['nullable' => false]
            );
        $installer->getConnection()->createTable($tableImage);


        // create gallery table
        $tableGallery = $installer->getConnection()
            ->newTable($installer->getTable('magenest_image_gallery_gallery'))
            ->addColumn(
                'gallery_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true]

            )->addColumn(
                'title',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                30,
                ['nullable' => false]
            )->addColumn(
                'image_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false]
            )->addColumn(
                'thumbnail_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false]
            )->addColumn(
                'status',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                10,
                ['nullable' => false]
            );
        $installer->getConnection()->createTable($tableGallery);

        // create gallery_group table
        $tableGroup = $installer->getConnection()
            ->newTable($installer->getTable('magenest_image_gallery_gallery_group'))
            ->addColumn(
                'group_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true]
            )->addColumn(
                'group_code',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false]

            )->addColumn(
                'gallery_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false]

            )->addColumn(
                'status',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                10,
                ['nullable' => false]
            );

        $installer->getConnection()->createTable($tableGroup);
        $installer->endSetup();

    }
}
?>