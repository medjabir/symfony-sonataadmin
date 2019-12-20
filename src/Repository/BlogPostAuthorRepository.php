<?php

namespace App\Repository;

use App\Entity\BlogPostAuthor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BlogPostAuthor|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlogPostAuthor|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlogPostAuthor[]    findAll()
 * @method BlogPostAuthor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogPostAuthorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogPostAuthor::class);
    }

    // /**
    //  * @return BlogPostAuthor[] Returns an array of BlogPostAuthor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlogPostAuthor
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
