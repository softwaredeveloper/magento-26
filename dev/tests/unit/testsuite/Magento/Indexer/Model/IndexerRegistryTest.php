<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Indexer\Model;

class IndexerRegistryTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCreatesIndexerInstancesAndReusesExistingOnes()
    {
        $firstIndexer = $this->getMock('Magento\Indexer\Model\IndexerInterface');
        $firstIndexer->expects($this->once())->method('load')->with('first-indexer')->willReturnSelf();

        $secondIndexer = $this->getMock('Magento\Indexer\Model\IndexerInterface');
        $secondIndexer->expects($this->once())->method('load')->with('second-indexer')->willReturnSelf();

        $objectManager = $this->getMock('Magento\Framework\ObjectManagerInterface');
        $objectManager->expects($this->at(0))->method('create')->willReturn($firstIndexer);
        $objectManager->expects($this->at(1))->method('create')->willReturn($secondIndexer);

        $unit = new IndexerRegistry($objectManager);
        $this->assertSame($firstIndexer, $unit->get('first-indexer'));
        $this->assertSame($secondIndexer, $unit->get('second-indexer'));
        $this->assertSame($firstIndexer, $unit->get('first-indexer'));
    }
}
