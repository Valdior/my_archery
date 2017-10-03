<?php

namespace TournamentBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TournamentBundle\Entity\Tournament;
/**
 * Description of LoadAddressData
 *
 * @author Valdior
 */
class LoadTournamentData  extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tournament = new Tournament();
        $tournament->setDateStart(new \DateTime('05/21/2017'));
        $tournament->setDateEnd(new \DateTime('05/21/2017'));
        $tournament->setType('outdoor');
        
        $this->addReference('tournoi-itw', $tournament);
        $manager->persist($tournament);        
        
        $tournament = new Tournament();
        $tournament->setDateStart(new \DateTime('06/17/2017'));
        $tournament->setDateEnd(new \DateTime('06/18/2017'));
        $tournament->setType('outdoor');
        
        $this->addReference('tournoi-lie', $tournament);
        $manager->persist($tournament);
        
        $tournament = new Tournament();
        $tournament->setDateStart(new \DateTime('09/30/2017'));
        $tournament->setDateEnd(new \DateTime('10/01/2017'));
        $tournament->setType('indoor');
        
        $this->addReference('tournoi-fbg', $tournament);
        $manager->persist($tournament);
        $manager->flush();
    }
    
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }
}
