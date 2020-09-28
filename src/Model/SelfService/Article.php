<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Article extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'pinned',
        'text',
        'protected',
        'title',
        'created_at',
        'plain_text',
        'published',
        'purified_text',
        'updated_at',
        'slug',
    ];

    /**
     * @var string
     * @SerializedName("purified_text")
     */
    private $purifiedText;

    /**
     * @var int
     * @SerializedName("pinned")
     */
    private $pinned;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var string
     * @SerializedName("text")
     */
    private $text;

    /**
     * @var int
     * @SerializedName("protected")
     */
    private $protected;

    /**
     * @var string
     * @SerializedName("title")
     */
    private $title;

    /**
     * @var int|null
     * @SerializedName("author_id")
     */
    private $authorId;

    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("excerpt")
     */
    private $excerpt;

    /**
     * @var string
     * @SerializedName("plain_text")
     */
    private $plainText;

    /**
     * @var int|null
     * @SerializedName("published_at")
     */
    private $publishedAt;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var string|null
     * @SerializedName("keywords")
     */
    private $keywords;

    /**
     * @var string
     * @SerializedName("slug")
     */
    private $slug;

    /**
     * @var int
     * @SerializedName("published")
     */
    private $published;

    /**
     * @var Category[]|null
     * @SerializedName("categories")
     */
    private $categories;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    /**
     * @param int|null $authorId
     * @return self
     */
    public function setAuthorId(?int $authorId): self
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * @return int
     */
    public function getPinned(): int
    {
        return $this->pinned;
    }

    /**
     * @param int $pinned
     * @return self
     */
    public function setPinned(int $pinned): self
    {
        $this->pinned = $pinned;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return int
     */
    public function getProtected(): int
    {
        return $this->protected;
    }

    /**
     * @param int $protected
     * @return self
     */
    public function setProtected(int $protected): self
    {
        $this->protected = $protected;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublishedAt(): ?int
    {
        return $this->publishedAt;
    }

    /**
     * @param int|null $publishedAt
     * @return self
     */
    public function setPublishedAt(?int $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return self
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlainText(): string
    {
        return $this->plainText;
    }

    /**
     * @param string $plainText
     * @return self
     */
    public function setPlainText(string $plainText): self
    {
        $this->plainText = $plainText;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    /**
     * @param string|null $keywords
     * @return self
     */
    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @return int
     */
    public function getPublished(): int
    {
        return $this->published;
    }

    /**
     * @param int $published
     * @return self
     */
    public function setPublished(int $published): self
    {
        $this->published = $published;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    /**
     * @param string|null $excerpt
     * @return self
     */
    public function setExcerpt(?string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * @return string
     */
    public function getPurifiedText(): string
    {
        return $this->purifiedText;
    }

    /**
     * @param string $purifiedText
     * @return self
     */
    public function setPurifiedText(string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return self
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Category[]|null
     */
    public function getCategories(): ?array
    {
        return $this->categories;
    }

    /**
     * @param Category[]|null $categories
     * @return self
     */
    public function setCategories(?array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}