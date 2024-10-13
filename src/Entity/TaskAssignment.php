<?php

namespace App\Entity;

use App\Repository\TaskAssignmentRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: TaskAssignmentRepository::class)]
class TaskAssignment {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $task_id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $assigned_at = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $flag_status = null;

    /**
     * @var string|null
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(type="string")
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'created_by', referencedColumnName: 'username')]
    #[ORM\Column(name: 'created_by', type: Types::STRING, nullable: false)]
    #[Gedmo\Blameable(on: 'create')]
    private ?string $createdBy;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'created_at', type: Types::DATETIME_MUTABLE, nullable: false)]
    #[Gedmo\Timestampable(on: 'create')]
    private ?DateTime $createdAt;

    /**
     * @var string|null
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\Column(type="string")
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'updated_by', referencedColumnName: 'username')]
    #[ORM\Column(name: 'updated_by', type: Types::STRING, nullable: true)]
    #[Gedmo\Blameable(on: 'update')]
    private ?string $updatedBy;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'updated_at', type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Gedmo\Timestampable(on: 'update')]
    private ?DateTime $updatedAt;

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(string $id): static {
        $this->id = $id;

        return $this;
    }

    public function getTaskId(): ?string {
        return $this->task_id;
    }

    public function setTaskId(string $task_id): static {
        $this->task_id = $task_id;

        return $this;
    }

    public function getUserId(): ?int {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static {
        $this->user_id = $user_id;

        return $this;
    }

    public function getAssignedAt(): ?\DateTimeImmutable {
        return $this->assigned_at;
    }

    public function setAssignedAt(\DateTimeImmutable $assigned_at): static {
        $this->assigned_at = $assigned_at;

        return $this;
    }

    public function getFlagStatus(): ?int {
        return $this->flag_status;
    }

    public function setFlagStatus(int $flag_status): static {
        $this->flag_status = $flag_status;

        return $this;
    }

    public function getCreatedAt(): ?DateTime {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime {
        return $this->updatedAt;
    }

    public function getCreatedBy(): ?string {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): static {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static {
        $this->createdAt = $created_at;

        return $this;
    }

    public function getUpdatedBy(): ?string {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): static {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static {
        $this->updatedAt = $updated_at;

        return $this;
    }
}
