<?php
namespace Ares\CoreBundle\Entity;
use Doctrine\ORM\EntityRepository;
/**
 * UsertaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsertaskRepository extends EntityRepository
{
 
//    public function myFindUsersAssigned(){
//        $qb = $this->_em->createQueryBuilder();
//        $qb->select('ut.user')
//            ->from('AresCoreBundle:usertask', 'ut')
//            ->where("ut.designation = true")
//            ->groupBy('ut.task')
//        ;
//        
//        
//     
//        
//        
//        return $qb->getQuery()->getResult();        
//    }
    
    public function myFindByUserId($id)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('ut')
            ->from('AresCoreBundle:usertask', 'ut')
            ->where("ut.user = $id")
            ->groupBy('ut.task')
        ;
        return $qb->getQuery()->getResult();
    }
    
    public function myFindByTaskId($id)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('ut')
            ->from('AresCoreBundle:usertask', 'ut')
            ->where("ut.task = $id")
            ->groupBy('ut.user')
        ;
        return $qb->getQuery()->getResult();
    }
    
    public function myFindAll()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('ut')
            ->from('AresCoreBundle:usertask','ut')
            ->groupBy('ut.task')
        ;
        return $qb->getQuery()->getResult();
    }

    public function myFindByUserAndTask($userId, $taskId)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('ut')
           ->from('AresCoreBundle:usertask','ut')
           ->where("ut.task = $taskId")
           ->andWhere("ut.user = $userId");

        return $qb->getQuery()->setMaxResults(1)->getResult();
    }
}