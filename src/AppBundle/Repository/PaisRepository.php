<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Pais;

/**
 * PaisRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PaisRepository extends \Doctrine\ORM\EntityRepository
{
	public function buscarPaisSimilar(Pais $pais){
		$paisNombre = $pais->getNombre();
		$likelyPais = $this->createQueryBuilder('p')->where('p.nombre like :paisNombre')->setParameter('paisNombre', $paisNombre)->getQuery()->getOneOrNullResult();
		return $likelyPais;
	}	
}
