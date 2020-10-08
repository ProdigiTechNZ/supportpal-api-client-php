<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\CustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\Functional\ApiComponentTest;

class TicketApisTest extends ApiComponentTest
{
    /**
     * @var array<mixed>
     */
    private $getEndpoints = [
        'getDepartments' => [DepartmentData::GET_DEPARTMENTS_SUCCESSFUL_RESPONSE, []],
        'getDepartment' => [DepartmentData::GET_DEPARTMENT_SUCCESSFUL_RESPONSE, [1]],
        'getTicketSettings' => [SettingsData::SUCCESSFUL_GET_RESPONSE, []],
        'getChannelSettings' => [ChannelSettingsData::GET_SUCCESSFUL_RESPONSE_DATA, ['web']],
        'getTicketCustomFields' => [CustomFieldData::GET_CUSTOMFIELDS_SUCCESSFUL_RESPONSE_DATA, []],
    ];

    /**
     * @var array<mixed>
     */
    protected function getGetEndpoints(): array
    {
        return $this->getEndpoints;
    }
}
