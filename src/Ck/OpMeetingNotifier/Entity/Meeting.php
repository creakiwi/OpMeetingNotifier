<?php

namespace Ck\OpMeetingNotifier\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meeting
 * 
 * @author Alexandre ANDRE
 * 
 * @ORM\Table(name="meetings")
 * @ORM\Entity(repositoryClass="Ck\OpMeetingNotifier\Entity\MeetingRepository")
 */
class Meeting
{
    /**
     * @var integer
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * 
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="start_time", type="datetime")
     */
    private $start_time;

    /**
     * @var float
     * 
     * @ORM\Column(name="duration", type="float")
     */
    private $duration;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * @var \Ck\OpMeetingNotifier\Entity\User
     * 
     * @ORM\ManyToOne(targetEntity="Ck\OpMeetingNotifier\Entity\User")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var \Ck\OpMeetingNotifier\Entity\Project
     * 
     * @ORM\ManyToOne(targetEntity="Ck\OpMeetingNotifier\Entity\Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @var \Ck\OpMeetingNotifier\Entity\Participant
     * 
     * @ORM\OneToMany(targetEntity="Ck\OpMeetingNotifier\Entity\Participant", mappedBy="meeting")
     */
    private $participants;

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

    public function getEmails()
    {
        $emails = array();

        foreach ($this->getParticipants() as $participant) {
            if ($participant->getUser() !== null)
                $emails[] = $participant->getUser()->getEmail();
            else
                $emails[] = $participant->getEmail();
        }

        return array_unique($emails);
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add participants
     *
     * @param \Ck\OpMeetingNotifier\Entity\Participant $participants
     * @return Meeting
     */
    public function addParticipant(\Ck\OpMeetingNotifier\Entity\Participant $participants)
    {
        $this->participants[] = $participants;

        return $this;
    }

    /**
     * Remove participants
     *
     * @param \Ck\OpMeetingNotifier\Entity\Participant $participants
     */
    public function removeParticipant(\Ck\OpMeetingNotifier\Entity\Participant $participants)
    {
        $this->participants->removeElement($participants);
    }

    /**
     * Get participants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParticipants()
    {
        return $this->participants;
    }
}
