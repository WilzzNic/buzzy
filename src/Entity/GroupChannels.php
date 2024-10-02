<?php

namespace App\Entity;

use App\Repository\GroupChannelsRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: GroupChannelsRepository::class)]
#[Broadcast]
class GroupChannels {


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?int $groupChannelId = null;

    #[ORM\Column(length: 255)]
    private ?string $channelName = null;

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

    public function getGroupChannelId(): ?int {
        return $this->groupChannelId;
    }

    public function getChannelName(): ?string {
        return $this->channelName;
    }

    public function setChannelName(string $channelName): static {
        $this->channelName = $channelName;

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
