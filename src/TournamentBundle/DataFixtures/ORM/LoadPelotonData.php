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
        $peloton->setStartTime(new \DateTime('05/21/2017 08:30:00'));
        $peloton->setTournament($this->getReference('tournoi-itw'));
        
        $this->addReference('peloton-itw1', $peloton);
        $manager->persist($peloton);        
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_2_25);
        $peloton->setMaxParticipant(120);
        $peloton->setStartTime(new \DateTime('05/21/2017 13:30:00'));
        $peloton->setTournament($this->getReference('tournoi-itw'));
        
        $this->addReference('peloton-itw2', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_50_30);
        $peloton->setMaxParticipant("120");
        $peloton->setStartTime(new \DateTime('06/17/2017 08:30:00'));
        $peloton->setTournament($this->getReference('tournoi-lie'));
        
        $this->addReference('peloton-lie1', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_2_25);
        $peloton->setMaxParticipant("120");
        $peloton->setStartTime(new \DateTime('06/17/2017 13:30:00'));
        $peloton->setTournament($this->getReference('tournoi-lie'));
        
        $this->addReference('peloton-lie2', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_2_70);
        $peloton->setMaxParticipant("120");
        $peloton->setStartTime(new \DateTime('06/18/2017 08:30:00'));
        $peloton->setTournament($this->getReference('tournoi-lie'));
        
        $this->addReference('peloton-lie3', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setMaxParticipant("60");
        $peloton->setStartTime(new \DateTime('09/30/2017 13:30:00'));
        $peloton->setTournament($this->getReference('tournoi-fbg'));
        
        $this->addReference('peloton-fbg1', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setMaxParticipant("60");
        $peloton->setStartTime(new \DateTime('09/30/2017 18:30:00'));
        $peloton->setTournament($this->getReference('tournoi-fbg'));
        
        $this->addReference('peloton-fbg2', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setMaxParticipant("60");
        $peloton->setStartTime(new \DateTime('10/01/2017 08:30:00'));
        $peloton->setTournament($this->getReference('tournoi-fbg'));
        
        $this->addReference('peloton-fbg3', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setMaxParticipant("60");
        $peloton->setStartTime(new \DateTime('10/01/2017 13:30:00'));
        $peloton->setTournament($this->getReference('tournoi-fbg'));
        
        $this->addReference('peloton-fbg4', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setMaxParticipant("60");
        $peloton->setStartTime(new \DateTime('10/14/2017 13:30:00'));
        $peloton->setTournament($this->getReference('tournoi-ads'));
        
        $this->addReference('peloton-ads1', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setMaxParticipant("60");
        $peloton->setStartTime(new \DateTime('10/14/2017 18:30:00'));
        $peloton->setTournament($this->getReference('tournoi-ads'));
        
        $this->addReference('peloton-ads2', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setMaxParticipant("60");
        $peloton->setStartTime(new \DateTime('10/15/2017 08:30:00'));
        $peloton->setTournament($this->getReference('tournoi-ads'));
        
        $this->addReference('peloton-ads3', $peloton);
        $manager->persist($peloton);
        
        $peloton = new Peloton();
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setMaxParticipant("60");
        $peloton->setStartTime(new \DateTime('10/15/2017 13:30:00'));
        $peloton->setTournament($this->getReference('tournoi-ads'));
        
        $this->addReference('peloton-ads4', $peloton);
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
