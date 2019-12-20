<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\BlogPost", inversedBy="authors")
     */
    private $blog_post;

    public function __construct()
    {
        $this->blog_post = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|BlogPost[]
     */
    public function getBlogPost(): Collection
    {
        return $this->blog_post;
    }

    public function addBlogPost(BlogPost $blogPost): self
    {
        if (!$this->blog_post->contains($blogPost)) {
            $this->blog_post[] = $blogPost;
        }

        return $this;
    }

    public function removeBlogPost(BlogPost $blogPost): self
    {
        if ($this->blog_post->contains($blogPost)) {
            $this->blog_post->removeElement($blogPost);
        }

        return $this;
    }


    public function __toString() {

        return $this->getName() != null ? $this->getName() : 'Author';
    }


}
