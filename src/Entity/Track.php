<?php

namespace App\Entity;

use App\Repository\TrackRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrackRepository::class)]
class Track
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $status_change_time = null;

    #[ORM\Column(length: 255)]
    private ?string $reason_for_change = null;

    #[ORM\ManyToOne(inversedBy: 'tracks')]
    private ?SimActivation $simActivation = null;

    #[ORM\ManyToOne(inversedBy: 'previous_statuses')]
    private ?SimStatus $previous_status = null;

    #[ORM\ManyToOne(inversedBy: 'new_status')]
    private ?SimStatus $new_status = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusChangeTime(): ?\DateTimeImmutable
    {
        return $this->status_change_time;
    }

    public function setStatusChangeTime(\DateTimeImmutable $status_change_time): static
    {
        $this->status_change_time = $status_change_time;

        return $this;
    }

    public function getReasonForChange(): ?string
    {
        return $this->reason_for_change;
    }

    public function setReasonForChange(string $reason_for_change): static
    {
        $this->reason_for_change = $reason_for_change;

        return $this;
    }

    public function getSimActivation(): ?SimActivation
    {
        return $this->simActivation;
    }

    public function setSimActivation(?SimActivation $simActivation): static
    {
        $this->simActivation = $simActivation;

        return $this;
    }

    public function getPreviousStatus(): ?SimStatus
    {
        return $this->previous_status;
    }

    public function setPreviousStatus(?SimStatus $previous_status): static
    {
        $this->previous_status = $previous_status;

        return $this;
    }

    public function getNewStatus(): ?SimStatus
    {
        return $this->new_status;
    }

    public function setNewStatus(?SimStatus $new_status): static
    {
        $this->new_status = $new_status;

        return $this;
    }
}
