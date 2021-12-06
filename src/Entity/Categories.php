<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Pastries::class, mappedBy="category", orphanRemoval=true)
     */
    private $pastry;

    /**
     * @ORM\OneToMany(targetEntity=Pictures::class, mappedBy="categories")
     */
    private $pictures;

    public function __construct()
    {
        $this->pastry = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->pictures;
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
     * @return Collection|Pastries[]
     */
    public function getPastry(): Collection
    {
        return $this->pastry;
    }

    public function addPastry(Pastries $pastry): self
    {
        if (!$this->pastry->contains($pastry)) {
            $this->pastry[] = $pastry;
            $pastry->setCategory($this);
        }

        return $this;
    }

    public function removePastry(Pastries $pastry): self
    {
        if ($this->pastry->removeElement($pastry)) {
            // set the owning side to null (unless already changed)
            if ($pastry->getCategory() === $this) {
                $pastry->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pictures[]
     */

    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Pictures $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setCategories($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getCategories() === $this) {
                $picture->setCategories(null);
            }
        }

        return $this;
    }
}
