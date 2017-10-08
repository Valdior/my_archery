<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use UserBundle\Entity\User;

/**
 * Description of LoadCercleData
 *
 * @author Valdior
 */
class LoadUserData implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
         $userManager = $this->container->get('fos_user.user_manager');
         
        $user = $userManager->createUser();
        $user->setUsername('admin');
//        $user->setSalt(md5(uniqid()));

        // the 'security.password_encoder' service requires Symfony 2.6 or higher
//        $encoder = $this->container->get('security.password_encoder');
//        $password = $encoder->encodePassword($user, 'admin');        
//        $user->setPassword($password);
        $user->setPlainPassword('admin');
        $user->addRole('ROLE_ADMIN');
        $user->setEmail('admin@admin.be');
        $user->setEnabled(true);

        $manager->persist($user);
//        $userManager->updateUser($user, true);
        
        $user = $userManager->createUser();
        $user->setUsername('user');
//        $user->setSalt(md5(uniqid()));

        // the 'security.password_encoder' service requires Symfony 2.6 or higher
//        $encoder = $this->container->get('security.password_encoder');
//        $password = $encoder->encodePassword($user, 'user');
//        $user->setPassword($password);
        $user->setPlainPassword('user');
        $user->setEmail('user@user.be');
        $user->setEnabled(true);

//        $manager->persist($user);
//        $manager->flush();
        $userManager->updateUser($user, true);
    }
    
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
