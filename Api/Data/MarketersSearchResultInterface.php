<?php

namespace GamaAcademy\MarketersRegister\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface MarketersSearchResultInterface extends SearchResultsInterface
{

    /**
     * List
     * GET marketers
     *
     * @return \GamaAcademy\MarketersRegister\Api\Data\MarketersInterface[]
     */

    public function getItems();

    /**
     * SET marketers
     *
     * @params \GamaAcademy\MarketersRegister\Api\Data\MarketersInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
