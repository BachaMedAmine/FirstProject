<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{EmailType, TextType, SubmitType, TextareaType};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom',TextType::class,[
                'attr'=>[
                    'class'=>'stext-111 cl2 plh3 size-116 p-l-62 p-r-30'
                ]
            ])
            ->add('email',EmailType::class,[
                'attr'=>[
                    'class'=>'stext-111 cl2 plh3 size-116 p-l-62 p-r-30'
                ]
            ])
            ->add('message',TextareaType::class,[
                'attr'=>[
                    'class'=>'stext-111 cl2 plh3 size-116 p-l-62 p-r-30'
                ]
            ])
            ->add('envoyer',SubmitType::class,[
                'attr'=>[
                    'class'=>'flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
