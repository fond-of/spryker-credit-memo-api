<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business\Model;

use FondOfSpryker\Zed\CreditmemoApi\Business\Mapper\EntityMapperInterface;
use FondOfSpryker\Zed\CreditmemoApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToCreditmemoInterface;
use FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToProductInterface;
use FondOfSpryker\Zed\CreditmemoApi\Dependency\QueryContainer\CreditmemoApiToApiInterface;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\CreditmemoItemTransfer;
use Generated\Shared\Transfer\CreditmemoResponseTransfer;
use Generated\Shared\Transfer\CreditmemoTransfer;
use Spryker\Zed\Api\Business\Exception\EntityNotFoundException;
use Spryker\Zed\Availability\Persistence\AvailabilityQueryContainerInterface;

class CreditmemoApi implements CreditmemoApiInterface
{
    /**
     * @var \FondOfSpryker\Zed\CreditmemoApi\Dependency\QueryContainer\CreditmemoApiToApiInterface
     */
    protected $apiQueryContainer;

    /**
     * @var \FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToCreditmemoInterface
     */
    protected $creditmemoFacade;

    /**
     * @var \FondOfSpryker\Zed\CreditmemoApi\Business\Model\TransferMapperInterface
     */
    protected $transferMapper;

    /**
     * @var \FondOfSpryker\Zed\CreditmemoApi\Business\Model\EntityMapperInterface
     */
    protected $entityMapper;

    /**
     * @var \FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToProductInterface
     */
    protected $productFacade;

    /**
     * CreditmemoApi constructor.
     *
     * @param \FondOfSpryker\Zed\CreditmemoApi\Dependency\QueryContainer\CreditmemoApiToApiInterface $apiQueryContainer
     * @param \FondOfSpryker\Zed\CreditmemoApi\Business\Model\EntityMapperInterface $entityMapper
     * @param \FondOfSpryker\Zed\CreditmemoApi\Business\Model\TransferMapperInterface $transferMapper
     * @param \FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToProductInterface $productFacade
     */
    public function __construct(
        CreditmemoApiToApiInterface $apiQueryContainer,
        EntityMapperInterface $entityMapper,
        TransferMapperInterface $transferMapper,
        CreditmemoApiToCreditmemoInterface $creditmemoFacade,
        CreditmemoApiToProductInterface $productFacade
    ) {
        $this->apiQueryContainer = $apiQueryContainer;
        $this->creditmemoFacade = $creditmemoFacade;
        $this->entityMapper = $entityMapper;
        $this->transferMapper = $transferMapper;
        $this->productFacade = $productFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        $data = (array)$apiDataTransfer->getData();

        $creditmemoTransfer = new CreditmemoTransfer();
        $creditmemoTransfer->fromArray($data, true);

        $creditmemoItemsCollection = [];
        if (!isset($data['items'])) {
            $data['items'] = [];
        }
        foreach ($data['items'] as $creditmemoItem) {
            $creditmemoItemsCollection[] = (new CreditmemoItemTransfer())->fromArray($creditmemoItem, true);
        }

        $creditmemoResponseTransfer = $this->creditmemoFacade->addCreditmemo($creditmemoTransfer, $creditmemoItemsCollection);

        $creditmemoTransfer = $this->getCreditmemoFromResponse($creditmemoResponseTransfer);

        return $this->apiQueryContainer->createApiItem($creditmemoTransfer, $creditmemoTransfer->getIdCreditmemo());
    }


    /**
     * @param \Generated\Shared\Transfer\CustomerResponseTransfer $customerResponseTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\EntityNotSavedException
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    protected function getCreditmemoFromResponse(CreditmemoResponseTransfer $creditmemoResponseTransfer): CreditmemoTransfer
    {
        $creditmemoTransfer = $creditmemoResponseTransfer->getCreditmemoTransfer();
        if (!$creditmemoTransfer) {
            $errors = [];
            foreach ($creditmemoResponseTransfer->getErrors() as $error) {
                $errors[] = $error->getMessage();
            }

            throw new EntityNotSavedException('Could not save creditmemo: ' . implode(',', $errors));
        }

        return $this->creditmemoFacade->findCreditmemoById($creditmemoTransfer);
    }
}
