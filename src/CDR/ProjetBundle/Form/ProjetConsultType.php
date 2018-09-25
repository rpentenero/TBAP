<?php
namespace CDR\ProjetBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
class ProjetConsultType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
    $patternRef = '%REFERENT%';
    $patternAdm = '%ADMIN%';
    $patternAgt = '%a:0%';
        $builder
                ->add('NumLDR', TextType::class,['disabled' => true])
                ->add('Nom', TextType::class,['disabled' => true])
                ->add('Referent', EntityType::class, array(
                    'class' => 'CDRUserBundle:User',
                    'disabled' => true,
                    'choice_label' => 'PrenomEtNom',
                    'placeholder' => 'Sélectionner un référent',
                    'query_builder' => function(UserRepository $repository) use($patternRef, $patternAdm) {
                        return $repository->getRefEtAdm($patternRef, $patternAdm);
                    }
                ))
                ->add('agent1', EntityType::class, array(
                    'attr' => array(
                        'read_only' => true,
                    ), 
                    'class' => 'CDRUserBundle:User',
                    'disabled' => true,
                    'choice_label' => 'PrenomEtNom',
                    'placeholder' => 'Sélectionner un agent',
                    'query_builder' => function(UserRepository $repository) use($patternAgt) {
                        return $repository->getAgt($patternAgt);
                    }
                ))
                ->add('agent2', EntityType::class, array(
                    'attr' => array(
                        'read_only' => true,
                    ), 
                    'class' => 'CDRUserBundle:User',
                    'disabled' => true,
                    'choice_label' => 'PrenomEtNom',
                    'placeholder' => 'Sélectionner un agent',
                    'query_builder' => function(UserRepository $repository) use($patternAgt) {
                        return $repository->getAgt($patternAgt);
                    }
                ))
                ->add('agent3', EntityType::class, array(
                    'attr' => array(
                        'read_only' => true,
                    ), 
                    'class' => 'CDRUserBundle:User',
                    'disabled' => true,
                    'choice_label' => 'PrenomEtNom',
                    'placeholder' => 'Sélectionner un agent',
                    'query_builder' => function(UserRepository $repository) use($patternAgt) {
                        return $repository->getAgt($patternAgt);
                    }
                ))
                ->add('agent4', EntityType::class, array(
                    'attr' => array(
                        'read_only' => true,
                    ), 
                    'class' => 'CDRUserBundle:User',
                    'disabled' => true,
                    'choice_label' => 'PrenomEtNom',
                    'placeholder' => 'Sélectionner un agent',
                    'query_builder' => function(UserRepository $repository) use($patternAgt) {
                        return $repository->getAgt($patternAgt);
                    }
                ))
                ->add('agent5', EntityType::class, array(
                    'attr' => array(
                        'read_only' => true,
                    ), 
                    'class' => 'CDRUserBundle:User',
                    'disabled' => true,
                    'choice_label' => 'PrenomEtNom',
                    'placeholder' => 'Sélectionner un agent',
                    'query_builder' => function(UserRepository $repository) use($patternAgt) {
                        return $repository->getAgt($patternAgt);
                    }
                ))
                ;
                
    }
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CDR\ProjetBundle\Entity\Projet'
        ));
    }
}