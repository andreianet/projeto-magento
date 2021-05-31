<?php

namespace GamaAcademy\MarketersRegister\Model;

use GamaAcademy\MarketersRegister\Api\Data\MarketersSearchInterfaceFactory;
use GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister\MarkCollectionFactory;
use GamaAcademy\MarketersRegister\Api\Data\MarketersInterface;
use GamaAcademy\MarketersRegister\Api\MarketersRepositoryInterface;
use GamaAcademy\MarketersRegister\Api\Data\MarketersInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister as ResourceModel;
use Laminas\Hydrator\HydratorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Tests\NamingConvention\true\bool;

class MarketersRepository implements MarketersRepositoryInterface
{
    /**
     * @var MarketersInterfaceFactory
     */
    private $marketersFactory;

    /**
     * @var CollectionProcessor
     */
    private $collectionProcessor;

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
     * var HydratorInterface
     */
    private  $hydrator;

    /**
     * MarketersRepository constructor
     * @params MarketersInterfaceFactory $marketersFactory
     * @params CollectionProcessor $collectionProcessor
     * @params ResourceModel $rm
     * @params MarkCollectionFactory $markCollectionFactory
     * @params HydratorInterface $hydrator
     * @params MarketersSearchInterfaceFactory $searchResultFactory
     */
    public function __construct(

        MarketersInterfaceFactory $marketersFactory,
        ResourceModel $rm,
        MarkCollectionFactory $markCollectionFactory,
        CollectionProcessor $collectionProcessor,
        HydratorInterface $hydrator,
        MarketersSearchInterfaceFactory $searchResultFactory
    ) {
        $this->marketersFactory = $marketersFactory;
        $this->rm = $rm;
        $this->collectionProcessor = $collectionProcessor;
        $this->markCollectionFactory =$markCollectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->hydrator = $hydrator;
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

        /**
         * @var \GamaAcademy\MarketersRegister\Model\ResourceModel\MarketersRegister\MarketersCollection $marketersCollection
         *
         */
        $marketersCollection = $this->markCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteriaInterface, $marketersCollection);

        /**@var \GamaAcademy\MarketersRegister\Api\Data\MarketersSearchResultInterface $markSearchResult */
        $markSearchResult = $this->searchResultFactory->create();
        $markSearchResult->setSearchCriteria(($searchCriteriaInterface));
        $markSearchResult->setItems($marketersCollection->getItems());
        $markSearchResult->setTotalCount($marketersCollection->getSize());
        return $markSearchResult;

    }

    /**
     * BlockRepository como base
     * SAVE
     * @params \GamaAcademy\MarketersRegister\Api|Data\MarketersInterface $marketers
     * @return \GamaAcademy\MarketersRegister\Api|Data\MarketersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(MarketersInterface $marketers)
    {
        /**Altera dados na API**/
        if($marketers->getId() && $marketers instanceof Marketers && !$marketers->getOrigData()){
            $marketers = $this->hydrator->hydrate($this->getById($marketers->getId()), $this->hydrator->extract($marketers));
        }
        try {
            $this->rm->save($marketers);
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $marketers;
    }

    /**
     * DELETE
     * @params \GamaAcademy\MarketersRegister\Api|Data\MarketersInterface $marketers
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(MarketersInterface $marketers)
    {
        try {
            $this->rm->delete($marketers);
        }catch (\Exception $exception){
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * DELETE ID
     * @params string $idMarketers
     * @return \GamaAcademy\MarketersRegister\Api|Data\MarketersInterface $marketers
     * @throws \Magento\Framework\Exception\LocalizedException
     * */
    public function deleteById($idMarketers)
    {
        // TODO: Implement deleteById() method.
        return $this->delete($this->getById($idMarketers));
    }
}

