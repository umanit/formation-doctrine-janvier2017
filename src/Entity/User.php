<?php

namespace ImieBook\Entity;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
    /**
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(name="email", type="string")
     */
    private $email;

    /**
     * @Column(name="password", type="string")
     */
    private $password;

    /**
     * @Column(name="description", type="text")
     */
    private $description;

    /**
     * @Column(name="firstname", type="string")
     */
    private $firstname;

    /**
     * @Column(name="lastname", type="string")
     */
    private $lastname;

    /**
     * @Column(name="birth_date", type="date")
     */
    private $birthDate;
}
