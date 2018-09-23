<?php

namespace CDR\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use CDR\UserBundle\Repository\UserRepository;

/**
 * Description of ProjetEditType
 *
 * @author admin
 */
class ProjetSaisieIndicsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('indic1_satisfactionClient', RangeType::class, array(
    'attr' => array(
        'min' => 0,
        'max' => 100,
        'onchange'=> "updateTextInput(this.value);"
    )
))
                ->add('indic2_ratioCharges', PercentType::class)
                ->add('indic3_tauxCouverture', PercentType::class)
                ->add('indic4_tauxFSDeclassees', PercentType::class)
                ->add('indic5_nombreTests', IntegerType::class)
                ->add('indic6_nombreRelivraisons', IntegerType::class)
                ->add('Enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CDR\ProjetBundle\Entity\Projet'
        ));
    }

}
