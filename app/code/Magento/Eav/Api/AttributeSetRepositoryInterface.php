<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Eav\Api;

interface AttributeSetRepositoryInterface
{
    /**
     * Retrieve list of Attribute Sets
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Eav\Api\Data\AttributeSetSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Retrieve attribute set information based on given ID
     *
     * @param int $attributeSetId
     * @throws \Magento\Framework\Exception\NoSuchEntityException If $attributeSetId is not found
     * @return \Magento\Eav\Api\Data\AttributeSetInterface
     */
    public function get($attributeSetId);

    /**
     * Save attribute set data
     *
     * @param \Magento\Eav\Api\Data\AttributeSetInterface $attributeSet
     * @return \Magento\Eav\Api\Data\AttributeSetInterface saved attribute set
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Model\Exception If attribute set is not found
     */
    public function save(\Magento\Eav\Api\Data\AttributeSetInterface $attributeSet);

    /**
     * Remove attribute set by given ID
     *
     * @param int $attributeSetId
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\InputException
     * @return bool
     */
    public function deleteById($attributeSetId);

    /**
     * Remove given attribute set
     *
     * @param \Magento\Eav\Api\Data\AttributeSetInterface $attributeSet
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\InputException
     * @return bool
     */
    public function delete(\Magento\Eav\Api\Data\AttributeSetInterface $attributeSet);
}
