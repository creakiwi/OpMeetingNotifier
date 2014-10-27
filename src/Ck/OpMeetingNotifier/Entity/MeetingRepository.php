<?php

namespace Ck\OpMeetingNotifier\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MeetingRepository
 */
class MeetingRepository extends EntityRepository
{
    public function findStartingAfterAndBefore(\DateTime $after = null, \DateTime $before = null)
    {
        if ($after === null)
            $after = new \DateTime();
        $query = $this
                    ->createQueryBuilder('m')
                    ->andWhere('m.start_time >= :before')
                    ->setParameter('after', $after)
        ;

        if ($before !== null) {
            $query
                ->andWhere('m.start_time <= :before')
                ->setParameter('before', $before)
            ;
        }

        return $query
                ->getQuery()
                ->getResult()
        ;
    }
}
