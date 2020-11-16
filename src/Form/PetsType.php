<?php

namespace App\Form;

use App\Entity\Pet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('weightKg')
            ->add('chipNumber')
            ->add('crossed')
            ->add('birthDate', DateType::class, array(

                'required' => false,
                'widget' => 'single_text',
                'empty_data' =>''
            ))
            ->add('color')
            ->add('sterilized')
            ->add('isDeceased')
            ->add('createDate',DateType::class,array(
                'required' => false,
                'widget' => 'single_text',
                'empty_data' =>''
                ))
            ->add('createUserId')
            ->add('updateDate',DateType::class,array(
                'required' => false,
                'widget' => 'single_text',
                'empty_data' =>''
            ))
            ->add('updateUserId')
            ->add('breed')
            ->add('gender')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pet::class,
        ]);
    }
}
