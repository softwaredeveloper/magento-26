<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\CatalogRule\Model;

use Magento\TestFramework\Helper\ObjectManager;

class CronTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\CatalogRule\Model\Indexer\Rule\RuleProductProcessor|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $ruleProductProcessor;

    /**
     * @var \Magento\CatalogRule\Model\Cron
     */
    protected $cron;

    protected function setUp()
    {
        $this->ruleProductProcessor = $this->getMock('Magento\CatalogRule\Model\Indexer\Rule\RuleProductProcessor',
            [], [], '', false);

        $this->cron = (new ObjectManager($this))->getObject('Magento\CatalogRule\Model\Cron', [
            'ruleProductProcessor' => $this->ruleProductProcessor,
        ]);
    }

    public function testDailyCatalogUpdate()
    {
        $this->ruleProductProcessor->expects($this->once())->method('markIndexerAsInvalid');

        $this->cron->dailyCatalogUpdate();
    }
}
