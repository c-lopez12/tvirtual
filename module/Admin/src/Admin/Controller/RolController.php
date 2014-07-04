<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Entity\Rol;
use Admin\Entity\Usuario;

class RolController extends AbstractActionController
{    // creamos una conexion
    public function listarAction()
    {
        $objectManager = $this
                ->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        
        // LISTAR TODOS LOS DATOS
        $claseRol = $objectManager->getRepository('Admin\Entity\Rol');
        $rol = $claseRol->findAll(); //RECUPERA TODOS LOS DATOS
        //print_r($rol);
        $valores=array("titulo"=>'LISTADO DE ROLES',
            "datos"=>$rol);
        
         return new ViewModel($valores);
         
        // INSERTAR DATOS A ROL
        /**
        $rol = new Rol();
        $rol->setNombre('PEDRO');
        $objectManager->persist($rol);
        $objectManager->flush();
        echo $rol->getId();
        echo ' - ';
        echo $rol->getNombre();
        */
        
        // BUSCAR POR ID
        /**
        $rol = $objectManager->find('Admin\Entity\Rol',5);
        
        // MODIFICAR UN CAMPO
        $rol->setNombre('EMPLEADO');        
        $objectManager->flush();
        var_dump($rol->getNombre());
        */
        
        /**
        // ELIMINAR DATOS
        $rol = $objectManager->find('Admin\Entity\Rol',4);
        $objectManager->remove($rol);
        $objectManager->flush();
        echo $rol->getNombre() .'FUE ELIMINADO DE LA BASE DE DATOS';
         */
        

         
        
        // GUARDAR UNA NUEVA ASOCIACION DE CLASES DE MUCHOS A UNO
        //CREAR USUARIO
         /**
        $usuario = new Usuario();
        $usuario->setNombrecompleto('CARLITOS');
        $usuario->setUser('carlos');
        $usuario->setPassword('123456');
        $usuario->setEstado('activo');
        $objectManager->persist($usuario);
        
        // OBTENER OBJETO ROL A ASOCIAR
        $rol = $objectManager->find('Admin\Entity\Rol', 1);
        $usuario->setRol($rol);
        $objectManager->flush();
        echo $usuario->getNombrecompleto() .'FUE GUARDADO CORRECTAMENTE';
        */
       
    }
}
