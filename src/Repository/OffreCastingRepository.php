<?php

namespace App\Repository;

use App\Entity\OffreCasting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Array_;

/**
 * @extends ServiceEntityRepository<OffreCasting>
 *
 * @method OffreCasting|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreCasting|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreCasting[]    findAll()
 * @method OffreCasting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreCastingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OffreCasting::class);
    }

    public function save(OffreCasting $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OffreCasting $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findSearch($query)
    {
        return $this->createQueryBuilder('r')
            ->where('r.libel LIKE :query')
            //->orWhere('r.reference LIKE :query')
            //->orWhere('r.offreDateStart LIKE :query')
            //->orWhere('r.typecontrat LIKE :query')
            //->orWhere('r.civilite LIKE :query')
            ->setParameter('query', '%' . $query . '%')
            //->join('c.categories', 'cat')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return OffreCasting[] Returns an array of OffreCasting objects
     */


    public function findByFilter($form): array
    {

        $querybuilder = $this->createQueryBuilder('o')
            ->leftJoin("o.typecontrat", "t")
            ->leftJoin("o.metier", "m");
        //    ->orderBy('o.id', 'ASC');

        $i = 0;
        if (count($form->get('typecontrats')->getData()) > 0) {
            $orX = $querybuilder->expr()->orX();

            foreach ($form->get('typecontrats')->getData() as $typeContrat) {
                $orX->add($querybuilder->expr()->eq("t.libel", ":contrat" . $i));
                $querybuilder->setParameter('contrat' . $i, $typeContrat->getLibel());
                $i++;
            }

            $querybuilder->andWhere($orX);

        }


        $i = 0;
        if (count($form->get('metiers')->getData()) > 0) {
            $orX = $querybuilder->expr()->orX();

            foreach ($form->get('metiers')->getData() as $metier) {
                $orX->add($querybuilder->expr()->eq("m.libel", ":metier" . $i));
                $querybuilder->setParameter('metier' . $i, $metier->getLibel());
                $i++;
            }

            $querybuilder->andWhere($orX);

        }


        return $querybuilder->getQuery()
            ->getResult();
    }



}
