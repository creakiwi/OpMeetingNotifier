<?php

namespace Ck\OpMeetingNotifier\Command;

use Ck\OpMeetingNotifier\Entity\Meeting;
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
    private $config;

    public function setConfiguration(array $config)
    {
        $this->config = $config;
    }

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
        $in10days = new \DateTime();
        $in10days->modify('+10 days');
        $future_meetings    = $this->em->getRepository('Ck\OpMeetingNotifier\Entity\Meeting')->findStartingAfter(null, $in10days);
        $title              = $meeting->getTitle();
        $start_date         = $meeting->getStartTime()->format($this->config['op_meeting_notifier']['date_format']);

        foreach ($future_meetings as $meeting)
            $this->handleMeeting($meeting);
    }

    protected function handleMeeting(Meeting $meeting)
    {
        $subject    = sprintf('%sMeeting "%s" scheduled on %s', 
                                $this->config['op_meeting_notifier']['subject_prefix'],
                                $meeting->getTitle(),
                                $meeting->getStartTime()->format($this->config['op_meeting_notifier']['date_format']));

$content = <<<EOT
Hello,

You have been invited to the following meeting : $meeting->getTitle(),
Start time: $meeting->getStartTime()->format($this->config['op_meeting_notifier']['date_format'])
        
Please refer to the openproject interface for furthermore informations.
        
Sincerely,
Your devoted OpMeetingNotifier.
EOT;

        $msg = \Swift_Message::newInstance()
                ->addTo($meeting->getEmails())
                ->addFrom($this->config['op_meeting_notifier']['from'])
                ->addReplyTo($this->config['op_meeting_notifier']['reply_to'])
                ->setBody('');
    }
}
