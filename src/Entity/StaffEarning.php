<?php

namespace App\Entity;

use App\Repository\StaffEarningRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StaffEarningRepository::class)]
class StaffEarning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_of_payment = null;

    #[ORM\ManyToOne(inversedBy: 'staff_earnings')]
    private ?StaffDetail $staffDetail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDateOfPayment(): ?\DateTimeImmutable
    {
        return $this->date_of_payment;
    }

    public function setDateOfPayment(\DateTimeImmutable $date_of_payment): static
    {
        $this->date_of_payment = $date_of_payment;

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
}
