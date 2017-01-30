<?php

namespace ImieBook\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getUserByCredentials($email, $password)
    {
        return $this
            ->createQueryBuilder('u')
            ->where('u.email = :email')
            ->andWhere('u.password = :password')
            ->setParameter('email', $email)
            ->setParameter('password', $password)
            ->getQuery()
            // ->getSingleResult() // Envoie une exception si objet non trouvé
            ->getOneOrNullResult() // Renvoie null si objet non trouvé
        ;
    }
}
