<?php

namespace App\Entity;

use App\Repository\VehicleDriverAssignmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleDriverAssignmentRepository::class)]
class VehicleDriverAssignment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $assignment_date = null;

    #[ORM\Column]
    private ?int $assignment_duration = null;

    #[ORM\Column]
    private ?bool $is_transferred = null;

    #[ORM\ManyToOne(inversedBy: 'vehicle_driver_assignments')]
    private ?Van $van = null;

    #[ORM\ManyToOne(inversedBy: 'vehicle_driver_assignments')]
    private ?DriverDetail $driverDetail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssignmentDate(): ?\DateTimeImmutable
    {
        return $this->assignment_date;
    }

    public function setAssignmentDate(\DateTimeImmutable $assignment_date): static
    {
        $this->assignment_date = $assignment_date;

        return $this;
    }

    public function getAssignmentDuration(): ?int
    {
        return $this->assignment_duration;
    }

    public function setAssignmentDuration(int $assignment_duration): static
    {
        $this->assignment_duration = $assignment_duration;

        return $this;
    }

    public function isIsTransferred(): ?bool
    {
        return $this->is_transferred;
    }

    public function setIsTransferred(bool $is_transferred): static
    {
        $this->is_transferred = $is_transferred;

        return $this;
    }

    public function getVan(): ?Van
    {
        return $this->van;
    }

    public function setVan(?Van $van): static
    {
        $this->van = $van;

        return $this;
    }

    public function getDriverDetail(): ?DriverDetail
    {
        return $this->driverDetail;
    }

    public function setDriverDetail(?DriverDetail $driverDetail): static
    {
        $this->driverDetail = $driverDetail;

        return $this;
    }
}
