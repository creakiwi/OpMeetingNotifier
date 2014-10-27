<?php

namespace Ck\OpMeetingNotifier\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meeting
 */
class Meeting
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $location;

    /**
     * @var \DateTime
     */
    private $start_time;

    /**
     * @var float
     */
    private $duration;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Ck\OpMeetingNotifier\Entity\User
     */
    private $author;

    /**
     * @var \Ck\OpMeetingNotifier\Entity\Project
     */
    private $project;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Meeting
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Meeting
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set start_time
     *
     * @param \DateTime $startTime
     * @return Meeting
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get start_time
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set duration
     *
     * @param float $duration
     * @return Meeting
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Meeting
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Meeting
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set author
     *
     * @param \Ck\OpMeetingNotifier\Entity\User $author
     * @return Meeting
     */
    public function setAuthor(\Ck\OpMeetingNotifier\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Ck\OpMeetingNotifier\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set project
     *
     * @param \Ck\OpMeetingNotifier\Entity\Project $project
     * @return Meeting
     */
    public function setProject(\Ck\OpMeetingNotifier\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Ck\OpMeetingNotifier\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
}
