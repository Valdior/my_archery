<?php

namespace TournamentBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TournamentBundle\Entity\Participant;

/**
 * Description of LoadParticpantData
 *
 * @author Valdior
 */
class LoadParticipantData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $participant = new Participant();
        $participant->setPeloton($this->getReference('peloton-itw1'));
        $participant->setParticipant($this->getReference('archer-pm'));        
        
        $manager->persist($participant);
        
        $participant = new Participant();
        $participant->setPeloton($this->getReference('peloton-itw2'));
        $participant->setParticipant($this->getReference('archer-pm'));        
        
        $manager->persist($participant);
        
        $participant = new Participant();
        $participant->setPeloton($this->getReference('peloton-lie1'));
        $participant->setParticipant($this->getReference('archer-pm'));        
        
        $manager->persist($participant);
        
        $participant = new Participant();
        $participant->setPeloton($this->getReference('peloton-fbg3'));
        $participant->setParticipant($this->getReference('archer-cg'));     
        $participant->setNine(25);
        $participant->setPoint(532);
        $participant->setTen(18);
        
        $manager->persist($participant);
        
        $participant = new Participant();
        $participant->setPeloton($this->getReference('peloton-ads4'));
        $participant->setParticipant($this->getReference('archer-pm'));        
        
        $manager->persist($participant);
        
        $participant = new Participant();
        $participant->setPeloton($this->getReference('peloton-ads2'));
        $participant->setParticipant($this->getReference('archer-cg'));        
        
        $manager->persist($participant);
        $manager->flush();
    }
    
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 9;
    }
}