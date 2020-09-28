<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

class CategoryApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $getCategoriesTypeSuccessfulResponse = CategoryData::GET_CATEGORIES_SUCCESSFUL_RESPONSE;

    /**
     * @var array<mixed>
     */
    private $getCategoryTypeSuccessfulResponse = CategoryData::GET_CATEGORY_SUCCESSFUL_RESPONSE;

    /**
     * @var int
     */
    private $testCategoryId = 1;

    public function testGetCategories(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_CATEGORY, $queryParams, null);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getCategoriesTypeSuccessfulResponse),
            $request
        );
        $getCategoriesTypeSuccessfulResponse = $this->apiClient->getCategories($queryParams);
        self::assertSame($response->reveal(), $getCategoriesTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetCategories(): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_CATEGORY, $queryParams, null);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getCategories($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetCategories(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_CATEGORY, $queryParams, null);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCategories($queryParams);
    }

    public function testGetCategory(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_CATEGORY . '/' . $this->testCategoryId,
            [],
            null
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getCategoryTypeSuccessfulResponse),
            $request
        );

        $getCategoryTypeSuccessfulResponse = $this->apiClient->getCategory($this->testCategoryId);
        self::assertSame($response->reveal(), $getCategoryTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetCategory(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_CATEGORY . '/' . $this->testCategoryId,
            [],
            null
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getCategory($this->testCategoryId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetCategory(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_CATEGORY . '/' . $this->testCategoryId,
            [],
            null
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCategory($this->testCategoryId);
    }
}