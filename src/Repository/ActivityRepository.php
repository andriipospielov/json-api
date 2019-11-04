<?php

namespace App\Repository;

use App\Entity\Activity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

class ActivityRepository extends ServiceEntityRepository
{
    private const ORDER_DESCENDING = 'DESC';

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activity::class);
    }

    /**
     * @return array
     */
    public function findAllAsArray()
    {
        $query = $this->createQueryBuilder('a')->getQuery();

        return $query->getArrayResult();
    }

    /**
     * @param bool $isPopular
     * @param string $orderBy
     * @return array
     */
    public function findByPopularity(bool $isPopular, string $orderBy = self::ORDER_DESCENDING)
    {
        $qb = $this->createQueryBuilder('a');

        $query = $qb->select()
            ->where($qb->expr()->eq('a.popular', ':isPopular'))
            ->orderBy('a.price', 'DESC')
            ->orderBy('a.price', $orderBy)
            ->setParameter('isPopular', $isPopular)
            ->getQuery();

        return $query->getArrayResult();
    }

    /**
     * @param string $category
     * @param string $orderBy
     * @return array
     */
    public function findByCategory(string $category, string $orderBy = self::ORDER_DESCENDING)
    {
        $qb = $this->createQueryBuilder('a');

        $query = $qb->select()
            ->join('a.ActivityCategory', 'ac')
            ->where($qb->expr()->eq('ac.name', ':category'))
            ->orderBy('a.price', $orderBy)
            ->setParameter('category', $category)
            ->getQuery();

        return $query->getArrayResult();
    }

    /**
     * @param float $maxPrice
     * @param string $orderBy
     * @return array
     */
    public function findByMaxPrice(float $maxPrice, string $orderBy = self::ORDER_DESCENDING)
    {
        $qb = $this->createQueryBuilder('a');

        $query = $qb->select()
            ->where($qb->expr()->lte('a.price', ':maxPrice'))
            ->orderBy('a.price', $orderBy)
            ->setParameter('maxPrice', $maxPrice)
            ->getQuery();

        return $query->getArrayResult();
    }
}