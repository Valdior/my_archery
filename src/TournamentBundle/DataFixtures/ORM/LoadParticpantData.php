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
class LoadParticpantData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $participant = new Participant();
        $participant->setPelotons($this->getReference('peloton-itw1'));
        $participant->setArchers($this->getReference('archer-pm'));        
        
        $manager->persist($participant);
        
        $participant = new Participant();
        $participant->setPelotons($this->getReference('peloton-itw2'));
        $participant->setArchers($this->getReference('archer-pm'));        
        
        $manager->persist($participant);
        
        $participant = new Participant();
        $participant->setPelotons($this->getReference('peloton-lie1'));
        $participant->setArchers($this->getReference('archer-pm'));        
        
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