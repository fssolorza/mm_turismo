<?php

namespace AppBundle\Repository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function filterByServicioGeneral(Pais $pais){
		$paisNombre = $pais->getNombre();
		$likelyPais = $this->createQueryBuilder('p')->where('p.nombre like :paisNombre')->setParameter('paisNombre', $paisNombre)->getQuery()->getOneOrNullResult();
		return $likelyPais;
	}
	
	public function filterByFecha(Date $aDate){
		$paisNombre = $pais->getNombre();
		$likelyPais = $this->createQueryBuilder('p')->where('p.nombre like :paisNombre')->setParameter('paisNombre', $paisNombre)->getQuery()->getOneOrNullResult();
		return $likelyPais;
	}	
	
	
}
