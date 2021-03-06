<?php

namespace Louvre\TicketingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('buyerLastname', TextType::class, [
                'label' => 'Nom :',
                'label_attr' => ['class' => 'label_block'],

            ])
            ->add('buyerFirstname', TextType::class, [
                 'label' => 'Prénom :',
                'label_attr' => ['class' => 'label_block'],

            ])
            ->add('buyerCountry', CountryType::class, [
              'label' => 'Pays :',
                'label_attr' => ['class' => 'label_block',],
                'preferred_choices' => ['France']
            ])

            ->add('buyerBirthday', BirthdayType::class, [
                'label' => 'Date de naissance :',
                'label_attr' => ['class' => 'label_block'],
                'placeholder' => [
                    'day' => 'Jour',
                    'month' => 'Mois',
                    'year' => 'Année'
                ]
            ])
            ->add('reducedPrice', CheckboxType::class, [
                'label' => 'Tarif réduit',
                'required' => false
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvre\TicketingBundle\Entity\Ticket'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'louvre_ticketingbundle_ticket';
    }


}
