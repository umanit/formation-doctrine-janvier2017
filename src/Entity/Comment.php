<?php

namespace ImieBook\Entity;

/**
 * @Entity
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
}
