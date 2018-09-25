<?php
/**
 * Created by PhpStorm.
 * User: michal
 * Date: 25.09.18
 * Time: 12:02
 */

namespace Eoko\Magento2\Client\Api;


use Eoko\Magento2\Client\Exception\InvalidArgumentException;
use Eoko\Magento2\Client\Pagination\PageInterface;
use Eoko\Magento2\Client\Pagination\ResourceCursorInterface;
use Eoko\Magento2\Client\Search\SearchCriteria;
use HttpException;

class AllegroOfferApi implements AllegroOfferApiInterface
{
    const OFFERS_URI = '/V1/allegro/offer/';
    const OFFER_URI = '/V1/allegro/offer/%s';

    /** @var ResourceClientInterface */
    protected $resourceClient;

    /** @var PageFactoryInterface */
    protected $pageFactory;

    /** @var ResourceCursorFactoryInterface */
    protected $cursorFactory;

    /**
     * @param ResourceClientInterface        $resourceClient
     * @param PageFactoryInterface           $pageFactory
     * @param ResourceCursorFactoryInterface $cursorFactory
     */
    public function __construct(
        ResourceClientInterface $resourceClient,
        PageFactoryInterface $pageFactory,
        ResourceCursorFactoryInterface $cursorFactory
    ) {
        $this->resourceClient = $resourceClient;
        $this->pageFactory = $pageFactory;
        $this->cursorFactory = $cursorFactory;
    }

    /**
     * Creates a resource.
     *
     * @param string $code code of the resource to create
     * @param array $data data of the resource to create
     *
     * @throws HttpException            if the request failed
     * @throws InvalidArgumentException if the parameter "code" is defined in the data parameter
     *
     * @return array
     */
    public function create($code, array $data = []): array
    {
        // TODO: Implement create() method.
    }

    /**
     * Deletes a resource.
     *
     * @param string $code code of the resource to delete
     *
     * @throws HttpException
     *
     * @return int status code 204 indicating that the resource has been well deleted
     */
    public function delete($code)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Gets a resource by its code.
     *
     * @param string $code Code of the resource
     *
     * @throws HttpException if the request failed
     *
     * @return array
     */
    public function get($code): array
    {
        // TODO: Implement get() method.
    }

    /**
     * Gets a list of resources by returning the first page.
     * Consequently, this method does not return all the resources.
     *
     * @param SearchCriteria|null $searchCriteria
     *
     * @return PageInterface if the request failed
     */
    public function listPerPage(?SearchCriteria $searchCriteria): PageInterface
    {
        if (null === $searchCriteria) {
            $searchCriteria = new SearchCriteria();
        }

        $queryParameters['searchCriteria'] = $searchCriteria->toArray();

        $data = $this->resourceClient->getResources(static::OFFERS_URI, [], $queryParameters);

        return $this->pageFactory->createPage($data);
    }

    /**
     * Gets a cursor to iterate over a list of resources.
     *
     * @param int $limit The limit of returning values. Do note that the server has a maximum limit allowed.
     * @param SearchCriteria|null $searchCriteria
     *
     * @return ResourceCursorInterface
     */
    public function all($limit = 100, ?SearchCriteria $searchCriteria): ResourceCursorInterface
    {
        $firstPage = $this->listPerPage($searchCriteria);

        return $this->cursorFactory->createCursor($limit, $firstPage);    }

    /**
     * Creates a resource if it does not exist yet, otherwise updates partially the resource.
     *
     * @param string $code code of the resource to create or update
     * @param array $data data of the resource to create or update
     *
     * @return array if the request failed
     */
    public function update($code, array $data = []): array
    {
        // TODO: Implement update() method.
    }
}