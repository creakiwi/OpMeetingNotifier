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
        $future_meetings    = $this->em->getRepository('Ck\OpMeetingNotifier\Entity\Meeting')->findStartingAfterAndBefore(null, $in10days);

        foreach ($future_meetings as $meeting)
            $this->handleMeeting($meeting);
    }

    protected function handleMeeting(Meeting $meeting)
    {
        $title      = $meeting->getTitle();
        $date       = $meeting->getStartTime();
        $date->setTimezone(new \DateTimeZone('Europe/London'));
        $date->setTimezone(new \DateTimeZone('Europe/Paris'));
        $start_date = $date->format($this->config['op_meeting_notifier']['date_format']);
        $project_name = $meeting->getProject()->getName();
        $transport  = \Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');
        $mailer     = \Swift_Mailer::newInstance($transport);
        $subject    = sprintf('%sMeeting "%s" scheduled on %s', 
                                $this->config['op_meeting_notifier']['subject_prefix'],
                                $title, $start_date);
$content = <<<EOT
Hello,

You have been invited to the following meeting: $title
Project : $project_name
Start time: $start_date
        
Please refer to the openproject interface for furthermore informations.
        
Sincerely,
Your devoted OpMeetingNotifier.
EOT;

        $msg = \Swift_Message::newInstance()
                ->setTo($meeting->getEmails())
                ->setSubject($subject)
                ->addFrom($this->config['op_meeting_notifier']['from'])
                ->addReplyTo($this->config['op_meeting_notifier']['reply_to'])
                ->setBody($content);

        $mailer->send($msg);
    }
}
