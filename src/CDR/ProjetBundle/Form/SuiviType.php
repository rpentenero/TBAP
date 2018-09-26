<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CDR\ProjetBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of SuiviType
 *
 * @author admin
 */
class SuiviType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('Date', DateType::class, array(
    'widget' => 'single_text',
    'html5' => false,
    'attr' => ['class' => 'js-datepicker'],
))
                ->add('Moyen', ChoiceType::class, array('choices'  => array(
        'Téléphone' => "Téléphone",
        'Email' => "Email",
    )))
                ->add('Contenu', TextareaType::class)
                ->add('Fichier', FileType::class, array('label' => 'Pièce jointe'))
                ->add('Enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CDR\ProjetBundle\Entity\Suivi'
        ));
    }

}
