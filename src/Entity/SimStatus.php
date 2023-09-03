<?php

namespace App\Entity;

use App\Repository\SimStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SimStatusRepository::class)]
class SimStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'previous_status', targetEntity: Track::class)]
    private Collection $previous_statuses;

    #[ORM\OneToMany(mappedBy: 'new_status', targetEntity: Track::class)]
    private Collection $new_status;

    public function __construct()
    {
        $this->previous_statuses = new ArrayCollection();
        $this->new_status = new ArrayCollection();
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
     * @return Collection<int, Track>
     */
    public function getPreviousStatuses(): Collection
    {
        return $this->previous_statuses;
    }

    public function addPreviousStatus(Track $previousStatus): static
    {
        if (!$this->previous_statuses->contains($previousStatus)) {
            $this->previous_statuses->add($previousStatus);
            $previousStatus->setPreviousStatus($this);
        }

        return $this;
    }

    public function removePreviousStatus(Track $previousStatus): static
    {
        if ($this->previous_statuses->removeElement($previousStatus)) {
            // set the owning side to null (unless already changed)
            if ($previousStatus->getPreviousStatus() === $this) {
                $previousStatus->setPreviousStatus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Track>
     */
    public function getNewStatus(): Collection
    {
        return $this->new_status;
    }

    public function addNewStatus(Track $newStatus): static
    {
        if (!$this->new_status->contains($newStatus)) {
            $this->new_status->add($newStatus);
            $newStatus->setNewStatus($this);
        }

        return $this;
    }

    public function removeNewStatus(Track $newStatus): static
    {
        if ($this->new_status->removeElement($newStatus)) {
            // set the owning side to null (unless already changed)
            if ($newStatus->getNewStatus() === $this) {
                $newStatus->setNewStatus(null);
            }
        }

        return $this;
    }
}
