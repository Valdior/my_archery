<?php
namespace ArcheryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ArcheryBundle\Entity\Archer;

/**
 * Description of LoadArcherData
 *
 * @author Valdior
 */
class LoadArcherData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $archer = new Archer();
        $archer->setFirstname("Pierre");
        $archer->setLastname('Maréchal');
        
        $this->addReference('archer-pm', $archer);
        $manager->persist($archer);
        
        $archer = new Archer();
        $archer->setFirstname("Andy");
        $archer->setLastname('Bardoul');
        
        $this->addReference('archer-ab', $archer);
        
        $archer = new Archer();
        $archer->setFirstname("Roland");
        $archer->setLastname('Stammen');
        
        $this->addReference('archer-rs', $archer);
        $manager->persist($archer);
        
        $archer = new Archer();
        $archer->setFirstname("Francine");
        $archer->setLastname('Hanique');
        
        $this->addReference('archer-fh', $archer);
        $manager->persist($archer);
        $manager->flush();
    }
    
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }
}
