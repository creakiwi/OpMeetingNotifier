<?php

namespace Ck\OpMeetingNotifier\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * NotifyCommand
 *
 * @author Alexandre ANDRE
 */
class NotifyCommand extends Command
{
    private $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('op:meeting:notify')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em->getRepository('Meeting')->findAll();
    }
}
