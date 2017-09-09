<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ArcheryBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ArcheryBundle\Entity\Club;

/**
 * Description of LoadClubData
 *
 * @author Valdior
 */
class LoadClubData  extends AbstractFixture implements OrderedFixtureInterface
{    
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
    
    public function load(ObjectManager $manager)
    {
        $club = new Club();
        $club->setName('Compagnie Royale d’Archers Liège');
        $club->setNumber('403');
        $club->setAcronym('LIE');
        $this->addReference('cercle-lie', $club);

        $manager->persist($club);
        
        $club  = new Club();
        $club->setName('Archery Club Grivegnée');
        $club->setNumber('401');
        $club->setAcronym('ACG ');

        $manager->persist($club);
        
        $club = new Club();
        $club->setName('Compagnie des Archers de Huy');
        $club->setNumber('402');
        $club->setAcronym('HUY');

        $manager->persist($club);
        
        $club = new Club();
        $club->setName('Confrérie des Archers Spadois');
        $club->setNumber('404');
        $club->setAcronym('CAS');

        $manager->persist($club);
        
        $club = new Club();
        $club->setName('Archers de l’Ordre du Chuffin');
        $club->setNumber('405');
        $club->setAcronym('CTH');

        $manager->persist($club);
        
        $club = new Club();
        $club->setName('Archers du Coq Mosan Oupeye');
        $club->setNumber('407');
        $club->setAcronym('ACM');

        $manager->persist($club);
        $club = new Club();
        $club->setName('Archers de Seraing');
        $club->setNumber('411');
        $club->setAcronym('ADS');

        $manager->persist($club);
        $club = new Club();
        $club->setName('Intertir Welkenraedt');
        $club->setNumber('414');
        $club->setAcronym('ITW');
        $this->addReference('cercle-itw', $club);

        $manager->persist($club);
        
        $club = new Club();
        $club->setName('Confrérie des archers de la Julienne');
        $club->setNumber('416');
        $club->setAcronym('CAJ');

        $manager->persist($club);
        $club = new Club();
        $club->setName('Compagnie des Archers Fléronnais');
        $club->setNumber('417');
        $club->setAcronym('CAF');

        $manager->persist($club);
        $club = new Club();
        $club->setName('Les Archers du Val de Blegny');
        $club->setNumber('418');
        $club->setAcronym('AVB');

        $manager->persist($club);
        
        $club = new Club();
        $club->setName('Archery Club de Malmedy');
        $club->setNumber('420');
        $club->setAcronym('MDY');

        $manager->persist($club);
        $manager->flush();
    }
}
