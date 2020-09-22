<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\ApiTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

class CoreApisTest extends ApiTestCase
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getCoreSettings' => CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE,
    ];

    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
