<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\SelfService\Type;

trait TypeApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Type[]
     * @throws HttpResponseException
     */
    public function getTypes(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getTypes($queryParameters);

        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createType'], $body);
    }

    /**
     * @param array<mixed> $data
     * @return Type
     */
    private function createType(array $data): Type
    {
        /** @var Type $model */
        $model = $this->getModelCollectionFactory()->create(Type::class, $data);

        return $model;
    }
}
