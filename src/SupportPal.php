<?php declare(strict_types=1);

namespace SupportPal\ApiClient;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\Config\ApiContext;
use SupportPal\ApiClient\Config\RequestDefaults;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\Client;
use SupportPal\ApiClient\Http\Request;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

use function array_merge;
use function str_replace;
use function sys_get_temp_dir;

class SupportPal
{
    /** @var ContainerBuilder */
    private $containerBuilder;

    /**
     * SupportPal constructor.
     * @param ApiContext $apiContext
     * @param RequestDefaults|null $requestDefaults
     * @throws Exception
     */
    public function __construct(
        ApiContext $apiContext,
        ?RequestDefaults $requestDefaults = null,
    ) {
        $requestDefaults = $requestDefaults ?? new RequestDefaults;

        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('Resources/services.yml');
        $containerBuilder->setParameter('apiUrl', $this->escapeSpecialCharacters($apiContext->getApiUrl()));
        $containerBuilder->setParameter('apiToken', $this->escapeSpecialCharacters($apiContext->getApiToken()));
        $containerBuilder->setParameter('defaultParameters', $requestDefaults->getDefaultParameters());
        $containerBuilder->setParameter('defaultBodyContent', $requestDefaults->getDefaultBodyContent());

        $containerBuilder->set(
            GuzzleClient::class,
            $this->getGuzzleClient($apiContext, $requestDefaults->getDefaultRequestOptions())
        );

        $containerBuilder->compile();

        $this->containerBuilder = $containerBuilder;
    }

    /**
     * This method returns the api for SupportPal system
     * @return TicketApi
     * @throws Exception
     */
    public function getTicketApi(): TicketApi
    {
        /** @var TicketApi $api */
        $api = $this->containerBuilder->get(TicketApi::class);

        return $api;
    }

    /**
     * This method returns the api for SupportPal system
     * @return CoreApi
     * @throws Exception
     */
    public function getCoreApi(): CoreApi
    {
        /** @var CoreApi $api */
        $api = $this->containerBuilder->get(CoreApi::class);

        return $api;
    }

    /**
     * This method returns the api for SupportPal system
     * @return SelfServiceApi
     * @throws Exception
     */
    public function getSelfServiceApi(): SelfServiceApi
    {
        /** @var SelfServiceApi $api */
        $api = $this->containerBuilder->get(SelfServiceApi::class);

        return $api;
    }

    /**
     * This method returns the api for SupportPal system
     * @return UserApi
     * @throws Exception
     */
    public function getUserApi(): UserApi
    {
        /** @var UserApi $api */
        $api = $this->containerBuilder->get(UserApi::class);

        return $api;
    }

    /**
     * @throws Exception
     */
    public function getRequest(): Request
    {
        /** @var Request $request */
        $request = $this->containerBuilder->get(Request::class);

        return $request;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        /** @var Client $apiClient */
        $apiClient = $this->containerBuilder->get(Client::class);

        return $apiClient->sendRequest($request);
    }

    /**
     * @param ApiContext $apiContext
     * @param array<mixed> $requestDefaults
     * @return ClientInterface
     */
    private function getGuzzleClient(ApiContext $apiContext, array $requestDefaults): ClientInterface
    {
        $stack = HandlerStack::create();

        return new GuzzleClient(array_merge(['handler' => $stack], $requestDefaults));
    }

    /**
     * This function escapes '%' because Symfony dependency injection uses it to detect the value of the set parameter
     * using the following regex: `%%|%([^%\s]+)%` in the yaml file
     */
    private function escapeSpecialCharacters(string $value): string
    {
        return str_replace('%', '%%', $value);
    }
}
