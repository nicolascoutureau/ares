<?php

namespace Ares\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaskRepository extends EntityRepository
{
  
  public function getAllUsertasks()
  {
    $query = $this
            ->createQueryBuilder('t')
            ->leftJoin('t.usertasks', 'ut')
            ->leftJoin('ut.chronometers', 'c')
            ->addSelect('sum(TIMESTAMPDIFF( second, c.startdate, c.stopdate)) AS totaltime')
            ->groupBy('t')
            ->orderBy('t.deadline', "DESC")
    ;

    return $query->getQuery()->getResult();
  }   
  
}
