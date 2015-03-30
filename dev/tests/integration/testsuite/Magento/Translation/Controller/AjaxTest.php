<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Translation\Controller;

class AjaxTest extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * @dataProvider indexActionDataProvider
     */
    public function testIndexAction($postData)
    {
        $this->getRequest()->setPost('translate', $postData);
        $this->dispatch('translation/ajax/index');
        $this->assertEquals('{success:true}', $this->getResponse()->getBody());
    }

    public function indexActionDataProvider()
    {
        return [['test'], [['test']]];
    }
}
