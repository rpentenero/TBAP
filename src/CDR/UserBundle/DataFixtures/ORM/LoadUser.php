<?php

// src/CDR/UserBundle/DataFixtures/ORM/LoadUser.php

namespace CDR\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CDR\UserBundle\Entity\User;

class LoadUser implements FixtureInterface {

    public function load(ObjectManager $manager) {
        // Les noms d'utilisateurs à créer
        $listAgents = array('andoche', 'bourau', 'belmahdi', 'exposito', 'heuman', 'kilgus', 'labede', 'saxemard');
        $listReferents = array('bourdeu', 'gonzalez', 'petitjean', 'vieillard');
        $listAdmin = array('codato', 'moity', 'pentenero');
        $index = 0;
        foreach ($listAgents as $name) {
            // On crée l'utilisateur
            $user = new User;
            $user->setNom("TOTO");
            $user->setPrenom("TOTO");
            $mail = (string) $index;
            $user->setEmail($mail);
            $index++;
            // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
            $user->setUsername($name);
            $user->setPassword($name);
            // On ne se sert pas du sel pour l'instant
            $user->setSalt('');
            // On définit uniquement le role ROLE_USER qui est le role de base
            $user->setRoles(array('ROLE_USER'));
            // On le persiste
            $manager->persist($user);
        }
        foreach ($listReferents as $name) {
            // On crée l'utilisateur
            $user = new User;
            $user->setNom("TOTO");
            $user->setPrenom("TOTO");
            $mail = (string) $index;
            $user->setEmail($mail);
            $index++;
            // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
            $user->setUsername($name);
            $user->setPassword($name);
            // On ne se sert pas du sel pour l'instant
            $user->setSalt('');
            // On définit uniquement le role ROLE_USER qui est le role de base
            $user->setRoles(array('ROLE_REFERENT'));
            // On le persiste
            $manager->persist($user);
        }
        foreach ($listAdmin as $name) {
            // On crée l'utilisateur
            $user = new User;
            $user->setNom("TOTO");
            $user->setPrenom("TOTO");
            $mail = (string) $index;
            $user->setEmail($mail);
            $index++;
            // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
            $user->setUsername($name);
            $user->setPassword($name);
            // On ne se sert pas du sel pour l'instant
            $user->setSalt('');
            // On définit uniquement le role ROLE_USER qui est le role de base
            $user->setRoles(array('ROLE_ADMIN'));
            // On le persiste
            $manager->persist($user);
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }

}
