<?php

namespace App\Repository;

use App\Entity\Entreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entreprise>
 */
class EntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entreprise::class);
    }

    //    /**
    //     * @return Entreprise[] Returns an array of Entreprise objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Entreprise
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }



    public function findByNomEntreprise($value): array{

        if ($value == '')
            return $this->affichePage();
        else
            return $this->createQueryBuilder('s')
                        ->andWhere('s.nom_entreprise = :val')
                        ->setParameter('val', $value)
                        ->orderBy('s.id', 'ASC')
                        ->setMaxResults(10)
                        ->getQuery()
                        ->getResult();
    }

    public function affichePage(): array{

        return $this->createQueryBuilder('s')
                    ->orderBy('s.id', 'ASC')
                    ->setMaxResults(10)
                    ->getQuery()
                    ->getResult();
    }

}
