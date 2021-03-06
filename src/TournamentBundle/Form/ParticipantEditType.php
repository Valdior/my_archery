<?php

namespace TournamentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use ArcheryBundle\Repository\ArcherRepository;

class ParticipantEditType extends AbstractType
{   
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('participant')
                ->add('point',      IntegerType::class)
                ->add('x',          IntegerType::class, array('required' => false))
                ->add('ten',        IntegerType::class)
                ->add('nine',       IntegerType::class, array('required' => false))
                ->add('isForfait',  CheckboxType::class, array('required' => false))
                ->add('save',       SubmitType::class);
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
        return 'tournamentbundle_participant_edit';
    }

    public function getParent()
    {
      return ParticipantType::class;
    }
}
