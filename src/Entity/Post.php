<?php

namespace ImieBook\Entity;

/**
 * @Entity(repositoryClass="ImieBook\Repository\PostRepository")
 * @Table(name="post")
 */
class Post
{
    /**
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(name="subject", type="string")
     */
    private $subject;

    /**
     * @Column(name="message", type="text")
     */
    private $message;

    /**
     * @Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ManyToOne(targetEntity="ImieBook\Entity\User")
     * @JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @OneToMany(targetEntity="ImieBook\Entity\Comment", mappedBy="post")
     */
    private $comments;

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Column(name="subject", type="string")
     *
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of Column(name="subject", type="string")
     *
     * @param mixed $subject
     *
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of Message
     *
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of Message
     *
     * @param mixed $message
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed $date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

}
