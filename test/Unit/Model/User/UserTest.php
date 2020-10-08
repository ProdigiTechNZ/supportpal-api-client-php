<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\User;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UserData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class UserTest
 * @package SupportPal\ApiClient\Tests\Unit\Model
 * @covers \SupportPal\ApiClient\Model\User\User
 */
class UserTest extends BaseModelTestCase
{
    const USER_DATA = UserData::USER_DATA;

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new User;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::USER_DATA;
    }
}
