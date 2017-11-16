<?php

namespace TournamentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use ArcheryBundle\Repository\ArcherRepository;

class ParticipantType extends AbstractType
{   
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $entity = $builder->getData();

        var_dump($entity->getPeloton()->getId());
        $pattern = $entity->getPeloton()->getId();

        $builder->add('participant', EntityType::class, array(
                    'class'        => 'ArcheryBundle:Archer',
                    'choice_label' => 'fullname',
                    'multiple'     => false,
                    'query_builder' => function(ArcherRepository $repository) use($pattern) {
                        return $repository->getNotRegistered($pattern);
                    }
                ))
                ->add('save',      SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TournamentBundle\Entity\Participant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tournamentbundle_participant';
    }


}
