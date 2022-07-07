<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('utiNom')
            ->add('utiPrenom')
            ->add('utiDateNaissance')
            ->add('utiAdresse')
            ->add('utiAdresse2')
            ->add('utiAdresse3')
            ->add('utiCodePostal')
            ->add('utiCommune')
            ->add('utiMail')
            ->add('utiTelephoneFixe')
            ->add('utiTelephoneMobile')
            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
