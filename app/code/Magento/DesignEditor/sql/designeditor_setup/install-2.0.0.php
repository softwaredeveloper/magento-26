<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

/* @var $installer \Magento\Setup\Module\SetupModule */
$installer = $this;

$installer->startSetup();
$connection = $installer->getConnection();

/**
 * Create table 'vde_theme_change'
 */
$table = $installer->getConnection()->newTable(
    $installer->getTable('vde_theme_change')
)->addColumn(
    'change_id',
    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
    null,
    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
    'Theme Change Identifier'
)->addColumn(
    'theme_id',
    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
    null,
    ['nullable' => false, 'unsigned' => true],
    'Theme Id'
)->addColumn(
    'change_time',
    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
    null,
    ['nullable' => false],
    'Change Time'
)->addForeignKey(
    $installer->getFkName('vde_theme_change', 'theme_id', 'core_theme', 'theme_id'),
    'theme_id',
    $installer->getTable('core_theme'),
    'theme_id',
    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE,
    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
)->setComment(
    'Design Editor Theme Change'
);

$installer->getConnection()->createTable($table);

$installer->endSetup();
