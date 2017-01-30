<?php

namespace ImieBook\Repository;

use ImieBook\Entity\Post;

class CommentRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllByPost(Post $post)
    {
        return $this
            ->createQueryBuilder('c')
            ->where('c.post = :postToGet')
            ->orderBy('c.date', 'ASC')
            ->setParameter('postToGet', $post)
            ->getQuery()
            ->getResult()
        ;
    }
}
