<?php

namespace App\Entity;

use App\Repository\SimcardTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SimcardTypeRepository::class)]
class SimcardType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'simcardType', targetEntity: SimCard::class)]
    private Collection $simcards;

    public function __construct()
    {
        $this->simcards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, SimCard>
     */
    public function getSimcards(): Collection
    {
        return $this->simcards;
    }

    public function addSimcard(SimCard $simcard): static
    {
        if (!$this->simcards->contains($simcard)) {
            $this->simcards->add($simcard);
            $simcard->setSimcardType($this);
        }

        return $this;
    }

    public function removeSimcard(SimCard $simcard): static
    {
        if ($this->simcards->removeElement($simcard)) {
            // set the owning side to null (unless already changed)
            if ($simcard->getSimcardType() === $this) {
                $simcard->setSimcardType(null);
            }
        }

        return $this;
    }
}
