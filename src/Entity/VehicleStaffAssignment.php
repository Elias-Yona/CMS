<?php

namespace App\Entity;

use App\Repository\VehicleStaffAssignmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleStaffAssignmentRepository::class)]
class VehicleStaffAssignment
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

    #[ORM\ManyToOne(inversedBy: 'vehicle_staff_assignments')]
    private ?StaffDetail $staffDetail = null;

    #[ORM\ManyToOne(inversedBy: 'vehicle_staff_assignments')]
    private ?Van $van = null;

    public function __construct()
    {
        $this->assignment_date = new \DateTimeImmutable();
    }

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

    public function getStaffDetail(): ?StaffDetail
    {
        return $this->staffDetail;
    }

    public function setStaffDetail(?StaffDetail $staffDetail): static
    {
        $this->staffDetail = $staffDetail;

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
}
