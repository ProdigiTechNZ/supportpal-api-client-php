<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Integration\ApiTest;

class CoreApisTest extends ApiTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getCoreSettings' => CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE,
    ];

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
