<?php

namespace CDR\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AdvertRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    public function getRefEtAdm($pattern1, $pattern2)
  {
    return $this
      ->createQueryBuilder('u')
      ->where('u.roles LIKE :pattern1 or u.roles LIKE :pattern2')
      ->setParameter('pattern1', $pattern1)
      ->setParameter('pattern2', $pattern2)      
    ;
  }
  
   public function getAgt($pattern1)
  {
    return $this
      ->createQueryBuilder('u')
      ->where('u.roles LIKE :pattern1')
      ->setParameter('pattern1', $pattern1)     
    ;
  }
}
