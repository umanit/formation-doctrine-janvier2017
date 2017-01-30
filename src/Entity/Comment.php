<?php

namespace ImieBook\Entity;

/**
 * @Entity(repositoryClass="ImieBook\Repository\CommentRepository")
 * @Table(name="comment")
 */
class Comment
{
    /**
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue
     */
    private $id;

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
     * @ManyToOne(targetEntity="ImieBook\Entity\Post", inversedBy="comments")
     * @JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $post;

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


    /**
     * Get the value of Author
     *
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of Author
     *
     * @param mixed $author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of Post
     *
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set the value of Post
     *
     * @param mixed $post
     *
     * @return self
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

}
