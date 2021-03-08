<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 //* @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findAll(): array
    {
        return $this->findBy([], ['createdAt' => 'DESC']);
    }

    /*
    public function findWithoutComments(int $post_id) {
        return $this->createQueryBuilder('p')
            ->select('p.id, p.title, p.content, p.createdAt, p.isPublished, p.isDeleted')
            ->where('p.id = :id')
            ->setParameter('id', $post_id)
            ->getQuery()
            ->getOneOrNullResult(AbstractQuery::HYDRATE_OBJECT);
    }*/

    public function findLastPosts(int $maxResult = 5): array
    {
        return $this->createQueryBuilder('p')
            ->select('p.title, p.content, count(c.id)')
            ->leftJoin('p.comments', 'c')
            ->groupBy('p.title, p.content')
            ->orderBy('count(c.id)', 'DESC')
            ->setMaxResults($maxResult)
            ->getQuery()
            ->getResult();
    }

    public function findLastPostsByUser(int $user_id, int $maxResult = 5): array
    {
        return $this->createQueryBuilder('p')
            ->select('p.title, p.content')
            ->join('p.author', 'a')
            ->where('a.id = :user_id')
            ->setParameter('user_id', $user_id)
            ->orderBy('p.createdAt', 'DESC')
            ->setMaxResults($maxResult)
            ->getQuery()
            ->getResult();
    }

    public function findTopPostsByUser(int $user_id, int $maxResult = 5): array
    {
        return $this->createQueryBuilder('p')
            ->select('p.title, p.content, count(c.id)')
            ->leftJoin('p.comments', 'c')
            ->join('p.author', 'a')
            ->where('a.id = :user_id')
            ->setParameter('user_id', $user_id)
            ->groupBy('p.title, p.content')
            ->orderBy('count(c.id)', 'DESC')
            ->setMaxResults($maxResult)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Post[] Returns an array of Post objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Post
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
