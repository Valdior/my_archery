<?php

namespace ArcheryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ArcheryBundle\Entity\Affiliate;

/**
 * Description of LoadAffiliateData
 *
 * @author Valdior
 */
class LoadAffiliateData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $affiliation = new Affiliate();
        $affiliation->setArcher($this->getReference('archer-pm'));
        $affiliation->setClub($this->getReference('cercle-itw'));
        $affiliation->setAffiliatedSince(new \DateTime('01/01/2014'));
        $affiliation->setAffiliatedEnd(new \DateTime('09/30/2016'));
        $affiliation->setRegistrationnumber('414022');
        
        $manager->persist($affiliation);
        
        $affiliation = new Affiliate();
        $affiliation->setArcher($this->getReference('archer-ab'));
        $affiliation->setClub($this->getReference('cercle-itw'));
        $affiliation->setAffiliatedSince(new \DateTime('01/01/2013'));
        $affiliation->setRegistrationnumber('414002');
        
        $manager->persist($affiliation);
        
        $affiliation = new Affiliate();
        $affiliation->setArcher($this->getReference('archer-pm'));
        $affiliation->setClub($this->getReference('cercle-lie'));
        $affiliation->setAffiliatedSince(new \DateTime('10/01/2016'));
        $affiliation->setRegistrationnumber('89H01558');
        
        $manager->persist($affiliation);
        
        $affiliation = new Affiliate();
        $affiliation->setArcher($this->getReference('archer-rs'));
        $affiliation->setClub($this->getReference('cercle-itw'));
        $affiliation->setAffiliatedSince(new \DateTime('10/01/2008'));
        $affiliation->setRegistrationnumber('414012');
        
        $manager->persist($affiliation);
        
        $affiliation = new Affiliate();
        $affiliation->setArcher($this->getReference('archer-cg'));
        $affiliation->setClub($this->getReference('cercle-lie'));
        $affiliation->setAffiliatedSince(new \DateTime('10/01/2014'));
        $affiliation->setRegistrationnumber('403065');
        
        $manager->persist($affiliation);
        $manager->flush();
    }
    
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}
