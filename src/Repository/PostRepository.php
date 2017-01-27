<?php

namespace ImieBook\Repository;

class PostRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Récupère les posts ayant la chaine "$searchedWord" dans leur subject
     * (QueryBuilder)
     */
    public function search($searchedWord)
    {
        return $this
            ->createQueryBuilder('p')
            ->where('p.subject LIKE :searched_word')
            ->orderBy('p.date', 'DESC')
            ->setParameter('searched_word', '%' . $searchedWord . '%')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Récupère les posts ayant la chaine "$searchedWord" dans leur subject
     * (DQL pur)
     */
    public function searchDql($searchedWord)
    {
        return $this
            ->_em
            ->createQuery('
                SELECT p FROM ImieBook\Entity\Post p
                WHERE p.subject LIKE :searched_word
                ORDER BY p.date DESC
            ')
            ->setParameter('searched_word', '%' . $searchedWord . '%')
            ->getResult()
        ;
    }
}
