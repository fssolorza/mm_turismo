<?php

namespace AppBundle\Repository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends \Doctrine\ORM\EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($username)
    {
        $this->get('logger')->addInfo('loadUserByUsername has been called');
        $user= $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();

        if (null === $user) {
            $message = print_r(
                'Unable to find an active admin AppBundle:Usuario object identified by "%s".', $username);
            throw new UsernameNotFoundException($message);
        }
        return $user;
    }
}
