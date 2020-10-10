<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Core;

use SupportPal\ApiClient\Factory\Core\CoreSettingsFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Core\CoreSettings;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

/**
 * Class CoreSettingsFactoryTest
 * @package SupportPal\ApiClient\Tests\Integration\Factory
 */
class CoreSettingsFactoryTest extends BaseModelFactoryTestCase
{
    const CORE_SETTINGS_DATA = CoreSettingsData::DATA;

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return CoreSettings::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::CORE_SETTINGS_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return CoreSettings::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(CoreSettingsFactory::class);

        return $modelFactory;
    }
}
