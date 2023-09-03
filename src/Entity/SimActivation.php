<?php

namespace App\Entity;

use App\Repository\SimActivationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SimActivationRepository::class)]
class SimActivation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $activation_date = null;

    #[ORM\Column(nullable: true)]
    private ?float $top_up_amount = null;

    #[ORM\ManyToOne(inversedBy: 'simcard_activations')]
    private ?StaffDetail $staffDetail = null;

    #[ORM\ManyToOne(inversedBy: 'simcard_activations')]
    private ?SimCard $simCard = null;

    #[ORM\OneToMany(mappedBy: 'simActivation', targetEntity: Track::class)]
    private Collection $tracks;

    public function __construct()
    {
        $this->tracks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivationDate(): ?\DateTimeImmutable
    {
        return $this->activation_date;
    }

    public function setActivationDate(\DateTimeImmutable $activation_date): static
    {
        $this->activation_date = $activation_date;

        return $this;
    }

    public function getTopUpAmount(): ?float
    {
        return $this->top_up_amount;
    }

    public function setTopUpAmount(?float $top_up_amount): static
    {
        $this->top_up_amount = $top_up_amount;

        return $this;
    }

    public function getStaffDetail(): ?StaffDetail
    {
        return $this->staffDetail;
    }

    public function setStaffDetail(?StaffDetail $staffDetail): static
    {
        $this->staffDetail = $staffDetail;

        return $this;
    }

    public function getSimCard(): ?SimCard
    {
        return $this->simCard;
    }

    public function setSimCard(?SimCard $simCard): static
    {
        $this->simCard = $simCard;

        return $this;
    }

    /**
     * @return Collection<int, Track>
     */
    public function getTracks(): Collection
    {
        return $this->tracks;
    }

    public function addTrack(Track $track): static
    {
        if (!$this->tracks->contains($track)) {
            $this->tracks->add($track);
            $track->setSimActivation($this);
        }

        return $this;
    }

    public function removeTrack(Track $track): static
    {
        if ($this->tracks->removeElement($track)) {
            // set the owning side to null (unless already changed)
            if ($track->getSimActivation() === $this) {
                $track->setSimActivation(null);
            }
        }

        return $this;
    }
}
