<?php

namespace App\Enums;

use Exception;
use ReflectionClass;

abstract class RolesEnum
{

    CONST ADMINISTRADOR = 'Administrador';
    CONST SUPER_ADMIN = 'Super Admin';
    CONST SUPERVISOR = 'Supervisor';
    CONST VIGILANTE = 'Vigilante';
    CONST ADMIN = 'johndoe';

    /**
     * Retorna todas las constantes de esta clase, es decir, todos los roles
     */
    public static function getRoles()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }



    public static function getPermisosDeRol($nombreRol)
    {
        switch ($nombreRol) {
            case self::SUPER_ADMIN:
                return self::PERMISOS_SUPER_ADMIN();
            break;
            case self::ADMINISTRADOR:
                return self::PERMISOS_ADMINISTRADOR();
            break;
            case self::SUPERVISOR:
                return self::PERMISOS_SUPERVISOR();
            break;
            case self::VIGILANTE:
                return self::PERMISOS_VIGILANTE();
            break;
            default:
                return [];
            break;
        }
    }

    private static function PERMISOS_SUPER_ADMIN()
    {
        // Super Admin tiene todos los permisos

        return [
            PermisosEnum::VER_LISTA_USUARIOS,
            PermisosEnum::CREAR_USUARIO,
            PermisosEnum::EDITAR_DATOS_USUARIO,
            PermisosEnum::CAMBIAR_CARGO_USUARIO,
            PermisosEnum::CAMBIAR_ROLE_USUARIO,
            PermisosEnum::CAMBIAR_CREDENCIALES_USUARIO,
            PermisosEnum::DESACTIVAR_USUARIO,
            PermisosEnum::VER_LISTA_USUARIOS_INACTIVOS,
            PermisosEnum::ACTIVAR_USUARIO,
            PermisosEnum::REGISTRAR_DISPOSITIVO,
            PermisosEnum::DESACTIVAR_DISPOSITIVO,
            PermisosEnum::VER_LISTA_DISPOSITIVOS,
            PermisosEnum::ELIMINAR_DISPOSITIVO,
        ];
    }

    private static function PERMISOS_ADMINISTRADOR()
    {
        return [

            PermisosEnum::VER_LISTA_REGISTROS_CATALOGO,
            PermisosEnum::CREAR_REGISTRO_CATALOGO,
            PermisosEnum::EDITAR_REGISTRO_CATALOGO,
            PermisosEnum::ELIMINAR_REGISTRO_CATALOGO,
            PermisosEnum::VER_LISTA_CENTROS,
            PermisosEnum::REGISTRAR_CENTROS,
            PermisosEnum::EDITAR_CENTROS,
            PermisosEnum::ELIMINAR_CENTROS,
            PermisosEnum::VER_LISTA_VIGILANTES,
            PermisosEnum::VER_LISTA_VIGILANTES_DESACTIVADOS,
            PermisosEnum::REGISTRAR_VIGILANTE,
            PermisosEnum::EDITAR_DATOS_VIGILANTE,
            PermisosEnum::DESACTIVAR_VIGILANTE,
            PermisosEnum::ACTIVAR_VIGILANTE,
        ];
    }

    private static function PERMISOS_SUPERVISOR()
    {
        return [
            PermisosEnum::VER_RESULTADOS,
            PermisosEnum::GENERAR_REPORTE,

        ];
    }

    private static function PERMISOS_VIGILANTE()
    {
        return [
            PermisosEnum::REGISTAR_VOTOS,
            PermisosEnum::ADJUNTAR_COMPROBANTE,
            PermisosEnum::VER_DETALLE_ACTA,
        ];
    }

}

