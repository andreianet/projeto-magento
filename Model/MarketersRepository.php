<?php

namespace GamaAcademy\MarketersRegister\Model;

use GamaAcademy\MarketersRegister\Api\Data\MarketersSearchInterfaceFactory;
use GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister\MarkCollectionFactory;
use GamaAcademy\MarketersRegister\Api\Data\MarketersInterface;
use GamaAcademy\MarketersRegister\Api\MarketersRepositoryInterface;
use GamaAcademy\MarketersRegister\Api\Data\MarketersInterfaceFactory;

use GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister as ResourceModel;
use Magento\Framework\Api\SearchCriteriaInterface;

class MarketersRepository implements MarketersRepositoryInterface
{
    /**
     * @var MarketersInterfaceFactory
     */
    private $marketersFactory;

    /**
     * @var ResourceModel
     */
    private $rm;

    /**
     * CollectionFactory
     * @var MarkCollectionFactory
     */
    private $markCollectionFactory;

    /**
     * @var MarketersSearchInterfaceFactory\
     */
    private $searchResultFactory;

    /**
     * MarketersRepository constructor
     * @params MarketersInterfaceFactory $marketersFactory
     * @params ResourceModel $rm
     * @params MarkCollectionFactory $markCollectionFactory
     * @params MarketersSearchInterfaceFactory $searchResultFactory
     */
    public function __construct(

        MarketersInterfaceFactory $marketersFactory,
        ResourceModel $rm,
        MarkCollectionFactory $markCollectionFactory,
        MarketersSearchInterfaceFactory $searchResultFactory
    ) {
        $this->marketersFactory = $marketersFactory;
        $this->rm = $rm;
        $this->markCollectionFactory =$markCollectionFactory;
        $this->searchResultFactory = $searchResultFactory;
    }

    /**
     * @params string $idMarketers
     * @return \GamaAcademy\MarketersRegister\Api\Data\MarketersInterface
     * @throw \Magento\Framework\Exception\LocalizedException
     */
    public function getById($idMarketers)
    {
        // TODO: Implement getById() method.
        $marketers = $this->marketersFactory->create();
        $this->rm->load($marketers,$idMarketers);
        if(!$marketers->getId()){
            throw new NoSuchEntityException(__('Marketer with ID 1 does not exist.', $marketers));
        }
        return $marketers;
    }

    /**
     * @params \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \GamaAcademy\MarketersRegister\Api\Data\MarketersSearchResultInterface
     * @throws \Magento\Framework\Expection\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteriaInterface)
    {
        // TODO: Implement getList() method.
        /**
         * @var \GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister\MarketersCollection $marketersCollection
         *
         */
        $marketersCollection = $this->markCollectionFactory->create();

        $this->

    }
}

