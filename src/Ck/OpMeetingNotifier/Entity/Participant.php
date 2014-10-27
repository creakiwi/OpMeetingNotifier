<?php

namespace Ck\OpMeetingNotifier\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 */
class Participant
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $invited;

    /**
     * @var boolean
     */
    private $attended;

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
    private $user;

    /**
     * @var \Ck\OpMeetingNotifier\Entity\Meeting
     */
    private $meeting;


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
     * Set email
     *
     * @param string $email
     * @return Participant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Participant
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set invited
     *
     * @param boolean $invited
     * @return Participant
     */
    public function setInvited($invited)
    {
        $this->invited = $invited;

        return $this;
    }

    /**
     * Get invited
     *
     * @return boolean 
     */
    public function getInvited()
    {
        return $this->invited;
    }

    /**
     * Set attended
     *
     * @param boolean $attended
     * @return Participant
     */
    public function setAttended($attended)
    {
        $this->attended = $attended;

        return $this;
    }

    /**
     * Get attended
     *
     * @return boolean 
     */
    public function getAttended()
    {
        return $this->attended;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Participant
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
     * @return Participant
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
     * Set user
     *
     * @param \Ck\OpMeetingNotifier\Entity\User $user
     * @return Participant
     */
    public function setUser(\Ck\OpMeetingNotifier\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Ck\OpMeetingNotifier\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set meeting
     *
     * @param \Ck\OpMeetingNotifier\Entity\Meeting $meeting
     * @return Participant
     */
    public function setMeeting(\Ck\OpMeetingNotifier\Entity\Meeting $meeting = null)
    {
        $this->meeting = $meeting;

        return $this;
    }

    /**
     * Get meeting
     *
     * @return \Ck\OpMeetingNotifier\Entity\Meeting 
     */
    public function getMeeting()
    {
        return $this->meeting;
    }
}
