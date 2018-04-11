<?php
/**
 * Bookmark entity.
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Bookmark.
 *
 * @ORM\Table(
 *     name="bookmarks"
 * )
 * @ORM\Entity(
 *     repositoryClass="AppBundle\Repository\BookmarksRepository"
 * )
 * @UniqueEntity(
 *     fields={"name"}
 * )
 */
class Bookmark
{
    /**
     * Use constants to define configuration options that rarely change instead
     * of specifying them in app/config/config.yml.
     * See http://symfony.com/doc/current/best_practices/configuration.html#constants-vs-configuration-options
     */
    const NUM_ITEMS = 10;

    /**
     * Primary key.
     *
     * @var int $id
     *
     * @ORM\Id
     * @ORM\Column(
     *     name="id",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned"=true},
     * )
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Created at.
     *
     * @var string $created_at
     *
     * @ORM\Column(
     *     name="created_at",
     *     type="string",
     *     length=128,
     *     nullable=false,
     * )
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="128",
     * )
     */
    protected $created_at;

    /**
     * Modified at.
     *
     * @var string $modified_at
     *
     * @ORM\Column(
     *     name="modified_at",
     *     type="string",
     *     length=128,
     *     nullable=false,
     * )
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="128",
     * )
     */
    protected $modified_at;

    /**
     * Title.
     *
     * @var string $title
     *
     * @ORM\Column(
     *     name="title",
     *     type="string",
     *     length=128,
     *     nullable=false,
     * )
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="128",
     * )
     */
    protected $title;

    /**
     * URL.
     *
     * @var string $url
     *
     * @ORM\Column(
     *     name="url",
     *     type="string",
     *     length=225,
     *     nullable=false,
     * )
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="128",
     * )
     */
    protected $url;

    /**
     * Is public.
     *
     * @var int $is_public
     *
     * @ORM\Column(
     *     name="is_public",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned"=true},
     * )
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="1",
     *     max="1",
     * )
     */
    protected $is_public;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Bookmark
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return Bookmark
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set modifiedAt
     *
     * @param string $modifiedAt
     *
     * @return Bookmark
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modified_at = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return string
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Bookmark
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Bookmark
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set isPublic
     *
     * @param integer $isPublic
     *
     * @return Bookmark
     */
    public function setIsPublic($isPublic)
    {
        $this->is_public = $isPublic;

        return $this;
    }

    /**
     * Get isPublic
     *
     * @return integer
     */
    public function getIsPublic()
    {
        return $this->is_public;
    }
}
