<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5000)
     * @Assert\NotBlank(message="Require")
     * @Assert\Length(
     *      min = 1,
     *      max = 1000,
     *      minMessage = "Your post must be at least {{ limit }} characters long",
     *      maxMessage = "Your post must be at {{ limit }} characters long",
     *      allowEmptyString = false
     *     )
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotBlank(message="Require")
     * @Assert\Length(
     *      min = 3,
     *      max = 25,
     *      minMessage = "Your post must be at least {{ limit }} characters long",
     *      maxMessage = "Your post must be at {{ limit }} characters long",
     *      allowEmptyString = false
     *     )
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedAt;

    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }
}
