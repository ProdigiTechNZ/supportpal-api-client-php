<?php


namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Ticket extends BaseModel implements Model
{
    /**
     * @SerializedName("text")
     * @var string
     */
    private $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Ticket
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }
}
