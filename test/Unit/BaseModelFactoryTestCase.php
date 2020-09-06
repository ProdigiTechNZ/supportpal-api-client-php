<?php


namespace SupportPal\ApiClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Helper\StringHelperTrait;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\FactoryTestCaseTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\SerializerInterface;

abstract class BaseModelFactoryTestCase extends TestCase
{
    use FactoryTestCaseTrait;

    use StringHelperTrait;

    /**
     * @var ObjectProphecy|SerializerInterface
     */
    protected $serializer;

    /**
     * @var string
     */
    protected $format = 'json';

    protected function setUp(): void
    {
        parent::setUp();
        $this->serializer = $this->prophesize(SerializerInterface::class);
    }

    public function testCreateModel(): void
    {
        $this->serializer
            ->deserialize(json_encode($this->getModelData()), $this->getModel(), $this->format)
            ->shouldBeCalled()
            ->willReturn($this->getModelInstance());
        $model = $this->getModelFactory()->create($this->getModelData());
        self::assertInstanceOf($this->getModel(), $model);
    }

    /**
     * @dataProvider provideDataWithMissingFields
     * @param array<mixed> $data
     * @param string $missingKey
     */
    public function testCreateWithMissingFields(array $data, string $missingKey): void
    {
        self::expectException(MissingRequiredFieldsException::class);
        self::expectExceptionMessage($this->snakeCaseToCamelCase($missingKey));
        $this->serializer
            ->deserialize(Argument::any(), Argument::any(), Argument::any())
            ->shouldNotBeCalled();
        $this->getModelFactory()->create($data);
    }

    public function testCreateWithFailedDeserialize(): void
    {
        $this->serializer
            ->deserialize(json_encode($this->getModelData()), $this->getModel(), $this->format)
            ->shouldBeCalled()
            ->willThrow(InvalidArgumentException::class);
        self::expectException(\InvalidArgumentException::class);
        $this->getModelFactory()->create($this->getModelData());
    }

    protected function getSerializer(): SerializerInterface
    {
        /** @var SerializerInterface $serializer */
        $serializer = $this->serializer->reveal();

        return $serializer;
    }
    abstract protected function getModelInstance(): Model;
}
