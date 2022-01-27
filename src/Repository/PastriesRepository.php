<?php

namespace App\Repository;

use App\Entity\Pastries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pastries|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pastries|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pastries[]    findAll()
 * @method Pastries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PastriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pastries::class);
    }

    // /**
    //  * @return Pastries[] Returns an array of Pastries objects
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

    
    public function findOneByCategory($id)
    {

        $conn = $this->getEntityManager()->getConnection(); 
        $sql = "SELECT category_id FROM `pastries` WHERE category_id =". $id;

        $queryBuilder = $this->createQueryBuilder('f');
        $queryBuilder->select('p.category_id')
        ->from(Pastries::class, 'p')
        ->innerJoin('p', 'category', 'c', 'p.id = c.category_id')
        ->setParameter('id', $id);

        $query = $queryBuilder->getQuery();

        return $query;

    }
    
}
