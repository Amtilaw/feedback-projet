<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", options={"default" : 0})
     */
    private $archived;

    /**
     * @ORM\Column(type="integer")
     */
    private $q1;

    /**
     * @ORM\Column(type="integer")
     */
    private $q2;

    /**
     * @ORM\Column(type="integer")
     */
    private $q3;

    /**
     * @ORM\Column(type="integer")
     */
    private $q4;

    /**
     * @ORM\Column(type="integer")
     */
    private $q5;

    /**
     * @ORM\Column(type="integer")
     */
    private $q6;

    /**
     * @ORM\Column(type="integer")
     */
    private $q7;

    /**
     * @ORM\ManyToOne(targetEntity=project::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function getQ1(): ?int
    {
        return $this->q1;
    }

    public function setQ1(int $q1): self
    {
        $this->q1 = $q1;

        return $this;
    }

    public function getQ2(): ?int
    {
        return $this->q2;
    }

    public function setQ2(int $q2): self
    {
        $this->q2 = $q2;

        return $this;
    }

    public function getQ3(): ?int
    {
        return $this->q3;
    }

    public function setQ3(int $q3): self
    {
        $this->q3 = $q3;

        return $this;
    }

    public function getQ4(): ?int
    {
        return $this->q4;
    }

    public function setQ4(int $q4): self
    {
        $this->q4 = $q4;

        return $this;
    }

    public function getQ5(): ?int
    {
        return $this->q5;
    }

    public function setQ5(int $q5): self
    {
        $this->q5 = $q5;

        return $this;
    }

    public function getQ6(): ?int
    {
        return $this->q6;
    }

    public function setQ6(int $q6): self
    {
        $this->q6 = $q6;

        return $this;
    }

    public function getQ7(): ?int
    {
        return $this->q7;
    }

    public function setQ7(int $q7): self
    {
        $this->q7 = $q7;

        return $this;
    }

    public function getIdProject(): ?project
    {
        return $this->id_project;
    }

    public function setIdProject(?project $id_project): self
    {
        $this->id_project = $id_project;

        return $this;
    }
}
