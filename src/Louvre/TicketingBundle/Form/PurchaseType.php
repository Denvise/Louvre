<?php

namespace Louvre\TicketingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PurchaseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateVisit', DateType::class, [
                'label' => 'Date de visite :',
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'hidden']
            ])
            ->add('typeTicket', ChoiceType::class, [
                    'label' => 'Type de billet :',
                    'choices' => [
                        'Demi-journée' => 'Demi-journée',
                        'Journée' => 'Journée'
                    ]
                ])

            ->add('tickets', CollectionType::class, [
                'entry_type' => TicketType::class,
                'label_attr' => ['class' => 'hidden'],
                'allow_add' => true
                ])

            ->add('email', TextType::class, [
                'label' => 'Email :',
                'attr' => ['placeholder' => 'exemple@mail.com']
            ])

            ->add('validate', SubmitType::class, array(
                'label' => 'Validez votre commande',
                'attr' => array('class' => 'btn-success btn-block')
            ));


    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvre\TicketingBundle\Entity\Purchase'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'louvre_ticketingbundle_purchase';
    }


}
