<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('dateBD',DateType::class, [
                'label' => 'Date of Birth',
                'widget'=>'single_text',
                'input'  => 'datetime_immutable',
                'required' => true


            ])
            ->add('sexe',ChoiceType::class, [
                'choices' => [
                    '' => null,
                    'Male' => "Male",
                    'Femele' => "Femele",
                ],
            ])
            ->add('phone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
