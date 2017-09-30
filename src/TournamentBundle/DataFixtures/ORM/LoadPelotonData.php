<?php

namespace TournamentBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TournamentBundle\Entity\Peloton;

/**
 * Description of LoadPelotonData
 *
 * @author Valdior
 */
class LoadPelotonData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_50_30);
        $peloton->setMaxParticipant("120");
        $peloton->setStartTime(new \DateTime('08:30:00'));
        $peloton->setTournament($this->getReference('tournoi-itw'));
        
        $manager->persist($peloton);        
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_2_25);
        $peloton->setMaxParticipant(120);
        $peloton->setStartTime(new \DateTime('13:30:00'));
        $peloton->setTournament($this->getReference('tournoi-itw'));
        
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_50_30);
        $peloton->setMaxParticipant("120");
        $peloton->setStartTime(new \DateTime('08:30:00'));
        $peloton->setTournament($this->getReference('tournoi-lie'));
        
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_2_25);
        $peloton->setMaxParticipant("120");
        $peloton->setStartTime(new \DateTime('13:30:00'));
        $peloton->setTournament($this->getReference('tournoi-lie'));
        
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_2_70);
        $peloton->setMaxParticipant("120");
        $peloton->setStartTime(new \DateTime('08:30:00'));
        $peloton->setTournament($this->getReference('tournoi-lie'));
        
        $manager->persist($peloton);
        $manager->flush();
    }
    
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 8;
    }
}