<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityImagesLink
 *
 * @ORM\Table(name="activity_images_link")
 * @ORM\Entity
 */
class ActivityImagesLink
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="activity_id", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $activityId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_url", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $imageUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityId(): ?int
    {
        return $this->activityId;
    }

    public function setActivityId(?int $activityId): self
    {
        $this->activityId = $activityId;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }
}
