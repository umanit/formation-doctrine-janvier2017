<?php

namespace ImieBook\Entity;

/**
 * @Entity
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
     * Column(name="subject", type="string")
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
}
