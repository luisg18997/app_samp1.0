PGDMP     1    *    	            v            movi_per    9.5.10    9.5.10    

           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            
           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            
           1262    25796    movi_per    DATABASE     z   CREATE DATABASE movi_per WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'es_VE.UTF-8' LC_CTYPE = 'es_VE.UTF-8';
    DROP DATABASE movi_per;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            
           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    7            
           0    0    public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    7                        3079    12435    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            
           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    25797    acciones_usuario    TABLE     �   CREATE TABLE acciones_usuario (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    id_accion integer NOT NULL,
    descripcion text,
    fecha timestamp without time zone
);
 $   DROP TABLE public.acciones_usuario;
       public         postgres    false    7            �            1259    25803    acciones_usuario_id_seq    SEQUENCE     y   CREATE SEQUENCE acciones_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.acciones_usuario_id_seq;
       public       postgres    false    181    7            
           0    0    acciones_usuario_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE acciones_usuario_id_seq OWNED BY acciones_usuario.id;
            public       postgres    false    182            �            1259    25805    catedra    TABLE     �   CREATE TABLE catedra (
    id integer NOT NULL,
    codigo integer NOT NULL,
    nombre character(100) NOT NULL,
    id_departamento integer NOT NULL
);
    DROP TABLE public.catedra;
       public         postgres    false    7            �            1259    25808    catedra_id_seq    SEQUENCE     p   CREATE SEQUENCE catedra_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.catedra_id_seq;
       public       postgres    false    7    183            
           0    0    catedra_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE catedra_id_seq OWNED BY catedra.id;
            public       postgres    false    184            �            1259    25810    departamento    TABLE     �   CREATE TABLE departamento (
    id integer NOT NULL,
    codigo integer NOT NULL,
    nombre character(100) NOT NULL,
    id_escuela integer NOT NULL
);
     DROP TABLE public.departamento;
       public         postgres    false    7            �            1259    25813    departamento_id_seq    SEQUENCE     u   CREATE SEQUENCE departamento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.departamento_id_seq;
       public       postgres    false    7    185            
           0    0    departamento_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE departamento_id_seq OWNED BY departamento.id;
            public       postgres    false    186            �            1259    25815    empleado    TABLE     p  CREATE TABLE empleado (
    id integer NOT NULL,
    id_idac integer,
    nacionalidad "char",
    cedula integer,
    nombre_1 character(30),
    nombre_2 character(30),
    apellido_1 character(30),
    apellido_2 character(30),
    fecha_nac date,
    genero "char",
    id_estado integer NOT NULL,
    id_municipio integer NOT NULL,
    id_parroquia integer,
    ubicacion text NOT NULL,
    direccion text NOT NULL,
    tipo_viv text NOT NULL,
    id_viv text NOT NULL,
    tlf_movil character(15),
    tlf_local character(15),
    id_sueldo integer NOT NULL,
    id_escuela integer NOT NULL,
    id_departamento integer NOT NULL,
    id_catedra integer NOT NULL,
    id_ingreso integer NOT NULL,
    id_tipo_ingreso integer NOT NULL,
    fecha_ing date NOT NULL,
    fecha_act date,
    id_unidad_ejec integer NOT NULL,
    fecha_retiro date,
    status boolean NOT NULL
);
    DROP TABLE public.empleado;
       public         postgres    false    7            �            1259    25821    empleado_anexo    TABLE     �   CREATE TABLE empleado_anexo (
    id integer NOT NULL,
    id_empleado integer NOT NULL,
    id_anexo integer NOT NULL,
    ruta text NOT NULL,
    fecha_subida date,
    fecha_elim date,
    status boolean
);
 "   DROP TABLE public.empleado_anexo;
       public         postgres    false    7            �            1259    25827    empleado_anexo_id_seq    SEQUENCE     w   CREATE SEQUENCE empleado_anexo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.empleado_anexo_id_seq;
       public       postgres    false    188    7            
           0    0    empleado_anexo_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE empleado_anexo_id_seq OWNED BY empleado_anexo.id;
            public       postgres    false    189            �            1259    25829    empleado_id_seq    SEQUENCE     q   CREATE SEQUENCE empleado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.empleado_id_seq;
       public       postgres    false    7    187            
           0    0    empleado_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE empleado_id_seq OWNED BY empleado.id;
            public       postgres    false    190            �            1259    25831    escuela    TABLE     a   CREATE TABLE escuela (
    id integer NOT NULL,
    codigo integer,
    nombre character(100)
);
    DROP TABLE public.escuela;
       public         postgres    false    7            �            1259    25834    escuela_id_seq    SEQUENCE     p   CREATE SEQUENCE escuela_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.escuela_id_seq;
       public       postgres    false    7    191            
           0    0    escuela_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE escuela_id_seq OWNED BY escuela.id;
            public       postgres    false    192            �            1259    25836    estado    TABLE     p   CREATE TABLE estado (
    id integer NOT NULL,
    descripcion character(50) COLLATE pg_catalog."C" NOT NULL
);
    DROP TABLE public.estado;
       public         postgres    false    7            �            1259    25839    estado_id_seq    SEQUENCE     o   CREATE SEQUENCE estado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.estado_id_seq;
       public       postgres    false    193    7            
           0    0    estado_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE estado_id_seq OWNED BY estado.id;
            public       postgres    false    194            �            1259    25841    fase_planilla    TABLE     W   CREATE TABLE fase_planilla (
    id integer NOT NULL,
    descripcion character(50)
);
 !   DROP TABLE public.fase_planilla;
       public         postgres    false    7            �            1259    25844    fase_planilla_id_seq    SEQUENCE     v   CREATE SEQUENCE fase_planilla_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.fase_planilla_id_seq;
       public       postgres    false    195    7            
           0    0    fase_planilla_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE fase_planilla_id_seq OWNED BY fase_planilla.id;
            public       postgres    false    196            �            1259    25846    idac_status    TABLE     �   CREATE TABLE idac_status (
    id integer NOT NULL,
    idac integer NOT NULL,
    status boolean NOT NULL,
    fecha_vacante timestamp without time zone
);
    DROP TABLE public.idac_status;
       public         postgres    false    7            �            1259    25849    idac_status_id_seq    SEQUENCE     t   CREATE SEQUENCE idac_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.idac_status_id_seq;
       public       postgres    false    7    197            
           0    0    idac_status_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE idac_status_id_seq OWNED BY idac_status.id;
            public       postgres    false    198            �            1259    25851    ingreso    TABLE     Z   CREATE TABLE ingreso (
    id integer NOT NULL,
    descripcion character(50) NOT NULL
);
    DROP TABLE public.ingreso;
       public         postgres    false    7            �            1259    25854    ingreso_id_seq    SEQUENCE     p   CREATE SEQUENCE ingreso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.ingreso_id_seq;
       public       postgres    false    199    7            
           0    0    ingreso_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE ingreso_id_seq OWNED BY ingreso.id;
            public       postgres    false    200            �            1259    25856 	   municipio    TABLE     k   CREATE TABLE municipio (
    id integer NOT NULL,
    descripcion character(100),
    id_estado integer
);
    DROP TABLE public.municipio;
       public         postgres    false    7            �            1259    25859    municipio_id_seq    SEQUENCE     r   CREATE SEQUENCE municipio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.municipio_id_seq;
       public       postgres    false    201    7            
           0    0    municipio_id_seq    SEQUENCE OWNED BY     7   ALTER SEQUENCE municipio_id_seq OWNED BY municipio.id;
            public       postgres    false    202            �            1259    25861 	   parroquia    TABLE     �   CREATE TABLE parroquia (
    id integer NOT NULL,
    descripcion character(100) NOT NULL,
    id_municipio integer NOT NULL
);
    DROP TABLE public.parroquia;
       public         postgres    false    7            �            1259    25864    parroquia_id_seq    SEQUENCE     r   CREATE SEQUENCE parroquia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.parroquia_id_seq;
       public       postgres    false    7    203            
           0    0    parroquia_id_seq    SEQUENCE OWNED BY     7   ALTER SEQUENCE parroquia_id_seq OWNED BY parroquia.id;
            public       postgres    false    204            �            1259    25866    perfil    TABLE     �   CREATE TABLE perfil (
    id integer NOT NULL,
    nombre character(100) NOT NULL,
    descripcion text,
    fecha_act timestamp with time zone,
    fecha_elim timestamp without time zone,
    status boolean NOT NULL
);
    DROP TABLE public.perfil;
       public         postgres    false    7            �            1259    25872    perfil_id_seq    SEQUENCE     o   CREATE SEQUENCE perfil_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.perfil_id_seq;
       public       postgres    false    205    7            
           0    0    perfil_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE perfil_id_seq OWNED BY perfil.id;
            public       postgres    false    206            �            1259    25874    planilla_empleado    TABLE     %  CREATE TABLE planilla_empleado (
    id integer NOT NULL,
    id_empleado integer NOT NULL,
    id_proceso integer,
    id_tipo_planilla integer NOT NULL,
    id_dedicacion_propuesta integer,
    id_movimiento integer NOT NULL,
    fecha_reg timestamp without time zone NOT NULL,
    codigo_planilla character(20),
    id_contable integer,
    id_programa integer NOT NULL,
    fecha_ini date NOT NULL,
    fecha_fin date NOT NULL,
    id_usuario_registro integer NOT NULL,
    fecha_apro timestamp without time zone,
    status boolean NOT NULL
);
 %   DROP TABLE public.planilla_empleado;
       public         postgres    false    7            �            1259    25877    planilla_empleado_id_seq    SEQUENCE     z   CREATE SEQUENCE planilla_empleado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.planilla_empleado_id_seq;
       public       postgres    false    207    7            
           0    0    planilla_empleado_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE planilla_empleado_id_seq OWNED BY planilla_empleado.id;
            public       postgres    false    208            �            1259    25879    pregunta_seguridad    TABLE     �   CREATE TABLE pregunta_seguridad (
    id integer NOT NULL,
    pregunta text COLLATE pg_catalog."C" NOT NULL,
    fecha_act timestamp without time zone,
    fehca_elim timestamp without time zone,
    status boolean NOT NULL
);
 &   DROP TABLE public.pregunta_seguridad;
       public         postgres    false    7            �            1259    25885    pregunta_seguridad_id_seq    SEQUENCE     {   CREATE SEQUENCE pregunta_seguridad_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.pregunta_seguridad_id_seq;
       public       postgres    false    209    7            
           0    0    pregunta_seguridad_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE pregunta_seguridad_id_seq OWNED BY pregunta_seguridad.id;
            public       postgres    false    210            �            1259    25887    proceso_planilla    TABLE     k  CREATE TABLE proceso_planilla (
    id integer NOT NULL,
    id_ubicacion integer NOT NULL,
    id_usuario_encargado integer NOT NULL,
    id_fase integer NOT NULL,
    fecha_llegada timestamp without time zone NOT NULL,
    fehca_rev timestamp without time zone,
    observacion text,
    fecha_salida timestamp without time zone,
    status boolean NOT NULL
);
 $   DROP TABLE public.proceso_planilla;
       public         postgres    false    7            �            1259    25893    proceso_planilla_id_seq    SEQUENCE     y   CREATE SEQUENCE proceso_planilla_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.proceso_planilla_id_seq;
       public       postgres    false    211    7            
           0    0    proceso_planilla_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE proceso_planilla_id_seq OWNED BY proceso_planilla.id;
            public       postgres    false    212            �            1259    25895    respuesta_seguridad    TABLE     �   CREATE TABLE respuesta_seguridad (
    id integer NOT NULL,
    id_pregunta integer,
    id_usuario integer NOT NULL,
    fecha_act date,
    respuesta text
);
 '   DROP TABLE public.respuesta_seguridad;
       public         postgres    false    7            �            1259    25898    respuesta_seguridad_id_seq    SEQUENCE     |   CREATE SEQUENCE respuesta_seguridad_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.respuesta_seguridad_id_seq;
       public       postgres    false    213    7             
           0    0    respuesta_seguridad_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE respuesta_seguridad_id_seq OWNED BY respuesta_seguridad.id;
            public       postgres    false    214            �            1259    25900    rol    TABLE     �   CREATE TABLE rol (
    id integer NOT NULL,
    nombre character(100) NOT NULL,
    descripcion text,
    fecha_act timestamp with time zone,
    fecha_elim timestamp without time zone,
    status boolean NOT NULL
);
    DROP TABLE public.rol;
       public         postgres    false    7            �            1259    25906 
   rol_id_seq    SEQUENCE     l   CREATE SEQUENCE rol_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 !   DROP SEQUENCE public.rol_id_seq;
       public       postgres    false    7    215            !
           0    0 
   rol_id_seq    SEQUENCE OWNED BY     +   ALTER SEQUENCE rol_id_seq OWNED BY rol.id;
            public       postgres    false    216            �            1259    25908 
   rol_perfil    TABLE     �   CREATE TABLE rol_perfil (
    id integer NOT NULL,
    id_perfil integer,
    id_rol integer,
    fecha_act timestamp without time zone,
    fecha_elim timestamp without time zone,
    status boolean
);
    DROP TABLE public.rol_perfil;
       public         postgres    false    7            �            1259    25911    rol_perfil_id_seq    SEQUENCE     s   CREATE SEQUENCE rol_perfil_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.rol_perfil_id_seq;
       public       postgres    false    7    217            "
           0    0    rol_perfil_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE rol_perfil_id_seq OWNED BY rol_perfil.id;
            public       postgres    false    218            �            1259    25913    rol_usuario    TABLE     �   CREATE TABLE rol_usuario (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    id_rol integer,
    fecha_act timestamp without time zone,
    fecha_elim timestamp without time zone,
    status boolean NOT NULL
);
    DROP TABLE public.rol_usuario;
       public         postgres    false    7            �            1259    25916    rol_usuario_id_seq    SEQUENCE     t   CREATE SEQUENCE rol_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.rol_usuario_id_seq;
       public       postgres    false    7    219            #
           0    0    rol_usuario_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE rol_usuario_id_seq OWNED BY rol_usuario.id;
            public       postgres    false    220            �            1259    25918    sueldo    TABLE     �   CREATE TABLE sueldo (
    id integer NOT NULL,
    anio date NOT NULL,
    id_categoria integer,
    id_dedicacion integer,
    sueldo money
);
    DROP TABLE public.sueldo;
       public         postgres    false    7            �            1259    25921    sueldo_id_seq    SEQUENCE     o   CREATE SEQUENCE sueldo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.sueldo_id_seq;
       public       postgres    false    221    7            $
           0    0    sueldo_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE sueldo_id_seq OWNED BY sueldo.id;
            public       postgres    false    222            �            1259    25923 
   tipo_anexo    TABLE     j   CREATE TABLE tipo_anexo (
    id integer NOT NULL,
    nombre character(30),
    id_movimiento integer
);
    DROP TABLE public.tipo_anexo;
       public         postgres    false    7            �            1259    25926    tipo_anexo_id_seq    SEQUENCE     s   CREATE SEQUENCE tipo_anexo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.tipo_anexo_id_seq;
       public       postgres    false    223    7            %
           0    0    tipo_anexo_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE tipo_anexo_id_seq OWNED BY tipo_anexo.id;
            public       postgres    false    224            �            1259    25928    tipo_categoria    TABLE     �   CREATE TABLE tipo_categoria (
    id integer NOT NULL,
    codigo integer,
    descripcion character(50),
    fecha_act timestamp without time zone,
    fecha_elim timestamp without time zone,
    status boolean
);
 "   DROP TABLE public.tipo_categoria;
       public         postgres    false    7            �            1259    25931    tipo_categoria_id_seq    SEQUENCE     w   CREATE SEQUENCE tipo_categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.tipo_categoria_id_seq;
       public       postgres    false    225    7            &
           0    0    tipo_categoria_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE tipo_categoria_id_seq OWNED BY tipo_categoria.id;
            public       postgres    false    226            �            1259    25933    tipo_contable    TABLE     �   CREATE TABLE tipo_contable (
    id integer NOT NULL,
    codigo integer,
    descripcion character(50),
    fecha_act timestamp without time zone,
    fecha_elim timestamp without time zone,
    status boolean
);
 !   DROP TABLE public.tipo_contable;
       public         postgres    false    7            �            1259    25936    tipo_contable_id_seq    SEQUENCE     v   CREATE SEQUENCE tipo_contable_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.tipo_contable_id_seq;
       public       postgres    false    227    7            '
           0    0    tipo_contable_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE tipo_contable_id_seq OWNED BY tipo_contable.id;
            public       postgres    false    228            �            1259    25938    tipo_dedicacion    TABLE     m   CREATE TABLE tipo_dedicacion (
    id integer NOT NULL,
    codigo integer,
    descripcion character(50)
);
 #   DROP TABLE public.tipo_dedicacion;
       public         postgres    false    7            �            1259    25941    tipo_dedicacion_id_seq    SEQUENCE     x   CREATE SEQUENCE tipo_dedicacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.tipo_dedicacion_id_seq;
       public       postgres    false    7    229            (
           0    0    tipo_dedicacion_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE tipo_dedicacion_id_seq OWNED BY tipo_dedicacion.id;
            public       postgres    false    230            �            1259    25943    tipo_ingreso    TABLE     �   CREATE TABLE tipo_ingreso (
    id integer NOT NULL,
    codigo integer,
    descripcion character(50),
    fecha_act timestamp without time zone,
    fecha_elim timestamp without time zone,
    status boolean
);
     DROP TABLE public.tipo_ingreso;
       public         postgres    false    7            �            1259    25946    tipo_ingreso_id_seq    SEQUENCE     u   CREATE SEQUENCE tipo_ingreso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.tipo_ingreso_id_seq;
       public       postgres    false    231    7            )
           0    0    tipo_ingreso_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE tipo_ingreso_id_seq OWNED BY tipo_ingreso.id;
            public       postgres    false    232            �            1259    25948    tipo_movimiento    TABLE     m   CREATE TABLE tipo_movimiento (
    id integer NOT NULL,
    codigo integer,
    descripcion character(50)
);
 #   DROP TABLE public.tipo_movimiento;
       public         postgres    false    7            �            1259    25951    tipo_movimiento_id_seq    SEQUENCE     x   CREATE SEQUENCE tipo_movimiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.tipo_movimiento_id_seq;
       public       postgres    false    7    233            *
           0    0    tipo_movimiento_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE tipo_movimiento_id_seq OWNED BY tipo_movimiento.id;
            public       postgres    false    234            �            1259    25953    tipo_planilla    TABLE     W   CREATE TABLE tipo_planilla (
    id integer NOT NULL,
    descripcion character(50)
);
 !   DROP TABLE public.tipo_planilla;
       public         postgres    false    7            �            1259    25956    tipo_planilla_id_seq    SEQUENCE     v   CREATE SEQUENCE tipo_planilla_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.tipo_planilla_id_seq;
       public       postgres    false    235    7            +
           0    0    tipo_planilla_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE tipo_planilla_id_seq OWNED BY tipo_planilla.id;
            public       postgres    false    236            �            1259    25958    tipo_programa    TABLE     �   CREATE TABLE tipo_programa (
    id integer NOT NULL,
    codigo integer,
    descripcion character(50),
    fecha_act timestamp without time zone,
    fecha_elim timestamp without time zone,
    status boolean
);
 !   DROP TABLE public.tipo_programa;
       public         postgres    false    7            �            1259    25961    tipo_programa_id_seq    SEQUENCE     v   CREATE SEQUENCE tipo_programa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.tipo_programa_id_seq;
       public       postgres    false    237    7            ,
           0    0    tipo_programa_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE tipo_programa_id_seq OWNED BY tipo_programa.id;
            public       postgres    false    238            �            1259    25963 	   ubicacion    TABLE     N   CREATE TABLE ubicacion (
    id integer NOT NULL,
    nombre character(50)
);
    DROP TABLE public.ubicacion;
       public         postgres    false    7            �            1259    25966    ubicacion_id_seq    SEQUENCE     r   CREATE SEQUENCE ubicacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.ubicacion_id_seq;
       public       postgres    false    7    239            -
           0    0    ubicacion_id_seq    SEQUENCE OWNED BY     7   ALTER SEQUENCE ubicacion_id_seq OWNED BY ubicacion.id;
            public       postgres    false    240            �            1259    25968    unidad_ejecutora    TABLE     �   CREATE TABLE unidad_ejecutora (
    id integer NOT NULL,
    codigo integer,
    descripcion character(100),
    fecha_act timestamp without time zone,
    fecha_elim timestamp without time zone,
    status boolean
);
 $   DROP TABLE public.unidad_ejecutora;
       public         postgres    false    7            �            1259    25971    unidad_ejecutora_id_seq    SEQUENCE     y   CREATE SEQUENCE unidad_ejecutora_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.unidad_ejecutora_id_seq;
       public       postgres    false    7    241            .
           0    0    unidad_ejecutora_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE unidad_ejecutora_id_seq OWNED BY unidad_ejecutora.id;
            public       postgres    false    242            �            1259    25973    usuario    TABLE     M  CREATE TABLE usuario (
    id integer NOT NULL,
    email character(70),
    nombre character(50) NOT NULL,
    apellido character(50) NOT NULL,
    clave text NOT NULL,
    status boolean NOT NULL,
    id_ubicacion integer NOT NULL,
    fecha_crea timestamp without time zone NOT NULL,
    fecha_elim timestamp without time zone
);
    DROP TABLE public.usuario;
       public         postgres    false    7            �            1259    25979    usuario_id_seq    SEQUENCE     p   CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public       postgres    false    243    7            /
           0    0    usuario_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE usuario_id_seq OWNED BY usuario.id;
            public       postgres    false    244            �           2604    25981    id    DEFAULT     l   ALTER TABLE ONLY acciones_usuario ALTER COLUMN id SET DEFAULT nextval('acciones_usuario_id_seq'::regclass);
 B   ALTER TABLE public.acciones_usuario ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    182    181            �           2604    25982    id    DEFAULT     Z   ALTER TABLE ONLY catedra ALTER COLUMN id SET DEFAULT nextval('catedra_id_seq'::regclass);
 9   ALTER TABLE public.catedra ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    184    183            �           2604    25983    id    DEFAULT     d   ALTER TABLE ONLY departamento ALTER COLUMN id SET DEFAULT nextval('departamento_id_seq'::regclass);
 >   ALTER TABLE public.departamento ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    186    185            �           2604    25984    id    DEFAULT     \   ALTER TABLE ONLY empleado ALTER COLUMN id SET DEFAULT nextval('empleado_id_seq'::regclass);
 :   ALTER TABLE public.empleado ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    190    187            �           2604    25985    id    DEFAULT     h   ALTER TABLE ONLY empleado_anexo ALTER COLUMN id SET DEFAULT nextval('empleado_anexo_id_seq'::regclass);
 @   ALTER TABLE public.empleado_anexo ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    189    188            �           2604    25986    id    DEFAULT     Z   ALTER TABLE ONLY escuela ALTER COLUMN id SET DEFAULT nextval('escuela_id_seq'::regclass);
 9   ALTER TABLE public.escuela ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    192    191            �           2604    25987    id    DEFAULT     X   ALTER TABLE ONLY estado ALTER COLUMN id SET DEFAULT nextval('estado_id_seq'::regclass);
 8   ALTER TABLE public.estado ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    194    193            �           2604    25988    id    DEFAULT     f   ALTER TABLE ONLY fase_planilla ALTER COLUMN id SET DEFAULT nextval('fase_planilla_id_seq'::regclass);
 ?   ALTER TABLE public.fase_planilla ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    196    195            �           2604    25989    id    DEFAULT     b   ALTER TABLE ONLY idac_status ALTER COLUMN id SET DEFAULT nextval('idac_status_id_seq'::regclass);
 =   ALTER TABLE public.idac_status ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    198    197            �           2604    25990    id    DEFAULT     Z   ALTER TABLE ONLY ingreso ALTER COLUMN id SET DEFAULT nextval('ingreso_id_seq'::regclass);
 9   ALTER TABLE public.ingreso ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    200    199            �           2604    25991    id    DEFAULT     ^   ALTER TABLE ONLY municipio ALTER COLUMN id SET DEFAULT nextval('municipio_id_seq'::regclass);
 ;   ALTER TABLE public.municipio ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    202    201            �           2604    25992    id    DEFAULT     ^   ALTER TABLE ONLY parroquia ALTER COLUMN id SET DEFAULT nextval('parroquia_id_seq'::regclass);
 ;   ALTER TABLE public.parroquia ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    204    203            �           2604    25993    id    DEFAULT     X   ALTER TABLE ONLY perfil ALTER COLUMN id SET DEFAULT nextval('perfil_id_seq'::regclass);
 8   ALTER TABLE public.perfil ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    206    205            �           2604    25994    id    DEFAULT     n   ALTER TABLE ONLY planilla_empleado ALTER COLUMN id SET DEFAULT nextval('planilla_empleado_id_seq'::regclass);
 C   ALTER TABLE public.planilla_empleado ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    208    207            �           2604    25995    id    DEFAULT     p   ALTER TABLE ONLY pregunta_seguridad ALTER COLUMN id SET DEFAULT nextval('pregunta_seguridad_id_seq'::regclass);
 D   ALTER TABLE public.pregunta_seguridad ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    210    209            �           2604    25996    id    DEFAULT     l   ALTER TABLE ONLY proceso_planilla ALTER COLUMN id SET DEFAULT nextval('proceso_planilla_id_seq'::regclass);
 B   ALTER TABLE public.proceso_planilla ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    212    211            �           2604    25997    id    DEFAULT     r   ALTER TABLE ONLY respuesta_seguridad ALTER COLUMN id SET DEFAULT nextval('respuesta_seguridad_id_seq'::regclass);
 E   ALTER TABLE public.respuesta_seguridad ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    214    213            �           2604    25998    id    DEFAULT     R   ALTER TABLE ONLY rol ALTER COLUMN id SET DEFAULT nextval('rol_id_seq'::regclass);
 5   ALTER TABLE public.rol ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    216    215            �           2604    25999    id    DEFAULT     `   ALTER TABLE ONLY rol_perfil ALTER COLUMN id SET DEFAULT nextval('rol_perfil_id_seq'::regclass);
 <   ALTER TABLE public.rol_perfil ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    218    217            �           2604    26000    id    DEFAULT     b   ALTER TABLE ONLY rol_usuario ALTER COLUMN id SET DEFAULT nextval('rol_usuario_id_seq'::regclass);
 =   ALTER TABLE public.rol_usuario ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    220    219            �           2604    26001    id    DEFAULT     X   ALTER TABLE ONLY sueldo ALTER COLUMN id SET DEFAULT nextval('sueldo_id_seq'::regclass);
 8   ALTER TABLE public.sueldo ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    222    221            �           2604    26002    id    DEFAULT     `   ALTER TABLE ONLY tipo_anexo ALTER COLUMN id SET DEFAULT nextval('tipo_anexo_id_seq'::regclass);
 <   ALTER TABLE public.tipo_anexo ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    224    223            �           2604    26003    id    DEFAULT     h   ALTER TABLE ONLY tipo_categoria ALTER COLUMN id SET DEFAULT nextval('tipo_categoria_id_seq'::regclass);
 @   ALTER TABLE public.tipo_categoria ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    226    225            �           2604    26004    id    DEFAULT     f   ALTER TABLE ONLY tipo_contable ALTER COLUMN id SET DEFAULT nextval('tipo_contable_id_seq'::regclass);
 ?   ALTER TABLE public.tipo_contable ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    228    227            �           2604    26005    id    DEFAULT     j   ALTER TABLE ONLY tipo_dedicacion ALTER COLUMN id SET DEFAULT nextval('tipo_dedicacion_id_seq'::regclass);
 A   ALTER TABLE public.tipo_dedicacion ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    230    229            �           2604    26006    id    DEFAULT     d   ALTER TABLE ONLY tipo_ingreso ALTER COLUMN id SET DEFAULT nextval('tipo_ingreso_id_seq'::regclass);
 >   ALTER TABLE public.tipo_ingreso ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    232    231            �           2604    26007    id    DEFAULT     j   ALTER TABLE ONLY tipo_movimiento ALTER COLUMN id SET DEFAULT nextval('tipo_movimiento_id_seq'::regclass);
 A   ALTER TABLE public.tipo_movimiento ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    234    233            �           2604    26008    id    DEFAULT     f   ALTER TABLE ONLY tipo_planilla ALTER COLUMN id SET DEFAULT nextval('tipo_planilla_id_seq'::regclass);
 ?   ALTER TABLE public.tipo_planilla ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    236    235            �           2604    26009    id    DEFAULT     f   ALTER TABLE ONLY tipo_programa ALTER COLUMN id SET DEFAULT nextval('tipo_programa_id_seq'::regclass);
 ?   ALTER TABLE public.tipo_programa ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    238    237            �           2604    26010    id    DEFAULT     ^   ALTER TABLE ONLY ubicacion ALTER COLUMN id SET DEFAULT nextval('ubicacion_id_seq'::regclass);
 ;   ALTER TABLE public.ubicacion ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    240    239            �           2604    26011    id    DEFAULT     l   ALTER TABLE ONLY unidad_ejecutora ALTER COLUMN id SET DEFAULT nextval('unidad_ejecutora_id_seq'::regclass);
 B   ALTER TABLE public.unidad_ejecutora ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    242    241            �           2604    26012    id    DEFAULT     Z   ALTER TABLE ONLY usuario ALTER COLUMN id SET DEFAULT nextval('usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    244    243            �	          0    25797    acciones_usuario 
   TABLE DATA               R   COPY acciones_usuario (id, id_usuario, id_accion, descripcion, fecha) FROM stdin;
    public       postgres    false    181   �4      0
           0    0    acciones_usuario_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('acciones_usuario_id_seq', 1, false);
            public       postgres    false    182            �	          0    25805    catedra 
   TABLE DATA               ?   COPY catedra (id, codigo, nombre, id_departamento) FROM stdin;
    public       postgres    false    183   �4      1
           0    0    catedra_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('catedra_id_seq', 1, false);
            public       postgres    false    184            �	          0    25810    departamento 
   TABLE DATA               ?   COPY departamento (id, codigo, nombre, id_escuela) FROM stdin;
    public       postgres    false    185   �4      2
           0    0    departamento_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('departamento_id_seq', 1, false);
            public       postgres    false    186            �	          0    25815    empleado 
   TABLE DATA               o  COPY empleado (id, id_idac, nacionalidad, cedula, nombre_1, nombre_2, apellido_1, apellido_2, fecha_nac, genero, id_estado, id_municipio, id_parroquia, ubicacion, direccion, tipo_viv, id_viv, tlf_movil, tlf_local, id_sueldo, id_escuela, id_departamento, id_catedra, id_ingreso, id_tipo_ingreso, fecha_ing, fecha_act, id_unidad_ejec, fecha_retiro, status) FROM stdin;
    public       postgres    false    187   5      �	          0    25821    empleado_anexo 
   TABLE DATA               d   COPY empleado_anexo (id, id_empleado, id_anexo, ruta, fecha_subida, fecha_elim, status) FROM stdin;
    public       postgres    false    188   "5      3
           0    0    empleado_anexo_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('empleado_anexo_id_seq', 1, false);
            public       postgres    false    189            4
           0    0    empleado_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('empleado_id_seq', 1, false);
            public       postgres    false    190            �	          0    25831    escuela 
   TABLE DATA               .   COPY escuela (id, codigo, nombre) FROM stdin;
    public       postgres    false    191   ?5      5
           0    0    escuela_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('escuela_id_seq', 1, false);
            public       postgres    false    192            �	          0    25836    estado 
   TABLE DATA               *   COPY estado (id, descripcion) FROM stdin;
    public       postgres    false    193   \5      6
           0    0    estado_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('estado_id_seq', 25, true);
            public       postgres    false    194            �	          0    25841    fase_planilla 
   TABLE DATA               1   COPY fase_planilla (id, descripcion) FROM stdin;
    public       postgres    false    195   �6      7
           0    0    fase_planilla_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('fase_planilla_id_seq', 1, false);
            public       postgres    false    196            �	          0    25846    idac_status 
   TABLE DATA               ?   COPY idac_status (id, idac, status, fecha_vacante) FROM stdin;
    public       postgres    false    197   �6      8
           0    0    idac_status_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('idac_status_id_seq', 1, false);
            public       postgres    false    198            �	          0    25851    ingreso 
   TABLE DATA               +   COPY ingreso (id, descripcion) FROM stdin;
    public       postgres    false    199   �6      9
           0    0    ingreso_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('ingreso_id_seq', 1, false);
            public       postgres    false    200            �	          0    25856 	   municipio 
   TABLE DATA               8   COPY municipio (id, descripcion, id_estado) FROM stdin;
    public       postgres    false    201   �6      :
           0    0    municipio_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('municipio_id_seq', 335, true);
            public       postgres    false    202            �	          0    25861 	   parroquia 
   TABLE DATA               ;   COPY parroquia (id, descripcion, id_municipio) FROM stdin;
    public       postgres    false    203   zD      ;
           0    0    parroquia_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('parroquia_id_seq', 1133, true);
            public       postgres    false    204            �	          0    25866    perfil 
   TABLE DATA               Q   COPY perfil (id, nombre, descripcion, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    205   bu      <
           0    0    perfil_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('perfil_id_seq', 1, false);
            public       postgres    false    206            �	          0    25874    planilla_empleado 
   TABLE DATA               �   COPY planilla_empleado (id, id_empleado, id_proceso, id_tipo_planilla, id_dedicacion_propuesta, id_movimiento, fecha_reg, codigo_planilla, id_contable, id_programa, fecha_ini, fecha_fin, id_usuario_registro, fecha_apro, status) FROM stdin;
    public       postgres    false    207   u      =
           0    0    planilla_empleado_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('planilla_empleado_id_seq', 1, false);
            public       postgres    false    208            �	          0    25879    pregunta_seguridad 
   TABLE DATA               R   COPY pregunta_seguridad (id, pregunta, fecha_act, fehca_elim, status) FROM stdin;
    public       postgres    false    209   �u      >
           0    0    pregunta_seguridad_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('pregunta_seguridad_id_seq', 10, true);
            public       postgres    false    210            �	          0    25887    proceso_planilla 
   TABLE DATA               �   COPY proceso_planilla (id, id_ubicacion, id_usuario_encargado, id_fase, fecha_llegada, fehca_rev, observacion, fecha_salida, status) FROM stdin;
    public       postgres    false    211   av      ?
           0    0    proceso_planilla_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('proceso_planilla_id_seq', 1, false);
            public       postgres    false    212            �	          0    25895    respuesta_seguridad 
   TABLE DATA               Y   COPY respuesta_seguridad (id, id_pregunta, id_usuario, fecha_act, respuesta) FROM stdin;
    public       postgres    false    213   ~v      @
           0    0    respuesta_seguridad_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('respuesta_seguridad_id_seq', 1, false);
            public       postgres    false    214            �	          0    25900    rol 
   TABLE DATA               N   COPY rol (id, nombre, descripcion, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    215   �v      A
           0    0 
   rol_id_seq    SEQUENCE SET     1   SELECT pg_catalog.setval('rol_id_seq', 6, true);
            public       postgres    false    216            �	          0    25908 
   rol_perfil 
   TABLE DATA               S   COPY rol_perfil (id, id_perfil, id_rol, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    217   "w      B
           0    0    rol_perfil_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('rol_perfil_id_seq', 1, false);
            public       postgres    false    218            �	          0    25913    rol_usuario 
   TABLE DATA               U   COPY rol_usuario (id, id_usuario, id_rol, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    219   ?w      C
           0    0    rol_usuario_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('rol_usuario_id_seq', 1, false);
            public       postgres    false    220            �	          0    25918    sueldo 
   TABLE DATA               H   COPY sueldo (id, anio, id_categoria, id_dedicacion, sueldo) FROM stdin;
    public       postgres    false    221   \w      D
           0    0    sueldo_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('sueldo_id_seq', 1, false);
            public       postgres    false    222            �	          0    25923 
   tipo_anexo 
   TABLE DATA               8   COPY tipo_anexo (id, nombre, id_movimiento) FROM stdin;
    public       postgres    false    223   yw      E
           0    0    tipo_anexo_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('tipo_anexo_id_seq', 1, false);
            public       postgres    false    224            �	          0    25928    tipo_categoria 
   TABLE DATA               Y   COPY tipo_categoria (id, codigo, descripcion, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    225   �w      F
           0    0    tipo_categoria_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('tipo_categoria_id_seq', 3, true);
            public       postgres    false    226            �	          0    25933    tipo_contable 
   TABLE DATA               X   COPY tipo_contable (id, codigo, descripcion, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    227   �w      G
           0    0    tipo_contable_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('tipo_contable_id_seq', 1, false);
            public       postgres    false    228            �	          0    25938    tipo_dedicacion 
   TABLE DATA               ;   COPY tipo_dedicacion (id, codigo, descripcion) FROM stdin;
    public       postgres    false    229   �w      H
           0    0    tipo_dedicacion_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('tipo_dedicacion_id_seq', 1, false);
            public       postgres    false    230            �	          0    25943    tipo_ingreso 
   TABLE DATA               W   COPY tipo_ingreso (id, codigo, descripcion, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    231   �w      I
           0    0    tipo_ingreso_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('tipo_ingreso_id_seq', 1, false);
            public       postgres    false    232            �	          0    25948    tipo_movimiento 
   TABLE DATA               ;   COPY tipo_movimiento (id, codigo, descripcion) FROM stdin;
    public       postgres    false    233   
x      J
           0    0    tipo_movimiento_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('tipo_movimiento_id_seq', 1, false);
            public       postgres    false    234            �	          0    25953    tipo_planilla 
   TABLE DATA               1   COPY tipo_planilla (id, descripcion) FROM stdin;
    public       postgres    false    235   'x      K
           0    0    tipo_planilla_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('tipo_planilla_id_seq', 1, false);
            public       postgres    false    236             
          0    25958    tipo_programa 
   TABLE DATA               X   COPY tipo_programa (id, codigo, descripcion, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    237   Dx      L
           0    0    tipo_programa_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('tipo_programa_id_seq', 1, false);
            public       postgres    false    238            
          0    25963 	   ubicacion 
   TABLE DATA               (   COPY ubicacion (id, nombre) FROM stdin;
    public       postgres    false    239   ax      M
           0    0    ubicacion_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('ubicacion_id_seq', 3, true);
            public       postgres    false    240            
          0    25968    unidad_ejecutora 
   TABLE DATA               [   COPY unidad_ejecutora (id, codigo, descripcion, fecha_act, fecha_elim, status) FROM stdin;
    public       postgres    false    241   �x      N
           0    0    unidad_ejecutora_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('unidad_ejecutora_id_seq', 1, false);
            public       postgres    false    242            
          0    25973    usuario 
   TABLE DATA               l   COPY usuario (id, email, nombre, apellido, clave, status, id_ubicacion, fecha_crea, fecha_elim) FROM stdin;
    public       postgres    false    243   �x      O
           0    0    usuario_id_seq    SEQUENCE SET     6   SELECT pg_catalog.setval('usuario_id_seq', 1, false);
            public       postgres    false    244            �           2606    26014    acciones_usuario_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY acciones_usuario
    ADD CONSTRAINT acciones_usuario_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.acciones_usuario DROP CONSTRAINT acciones_usuario_pkey;
       public         postgres    false    181    181            �           2606    26016    catedra_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY catedra
    ADD CONSTRAINT catedra_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.catedra DROP CONSTRAINT catedra_pkey;
       public         postgres    false    183    183            �           2606    26018    departamento_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY departamento
    ADD CONSTRAINT departamento_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.departamento DROP CONSTRAINT departamento_pkey;
       public         postgres    false    185    185            �           2606    26020    empleado_anexo_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY empleado_anexo
    ADD CONSTRAINT empleado_anexo_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.empleado_anexo DROP CONSTRAINT empleado_anexo_pkey;
       public         postgres    false    188    188            �           2606    26022    empleado_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_pkey;
       public         postgres    false    187    187            �           2606    26024    escuela_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY escuela
    ADD CONSTRAINT escuela_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.escuela DROP CONSTRAINT escuela_pkey;
       public         postgres    false    191    191            �           2606    26026    estado_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY estado
    ADD CONSTRAINT estado_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.estado DROP CONSTRAINT estado_pkey;
       public         postgres    false    193    193            �           2606    26028    fase_planilla_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY fase_planilla
    ADD CONSTRAINT fase_planilla_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.fase_planilla DROP CONSTRAINT fase_planilla_pkey;
       public         postgres    false    195    195            �           2606    26030    idac_status_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY idac_status
    ADD CONSTRAINT idac_status_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.idac_status DROP CONSTRAINT idac_status_pkey;
       public         postgres    false    197    197            	           2606    26032    ingreso_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY ingreso
    ADD CONSTRAINT ingreso_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.ingreso DROP CONSTRAINT ingreso_pkey;
       public         postgres    false    199    199            	           2606    26034    municipio_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.municipio DROP CONSTRAINT municipio_pkey;
       public         postgres    false    201    201            	           2606    26036    parroquia_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY parroquia
    ADD CONSTRAINT parroquia_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.parroquia DROP CONSTRAINT parroquia_pkey;
       public         postgres    false    203    203            	           2606    26038    perfil_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.perfil DROP CONSTRAINT perfil_pkey;
       public         postgres    false    205    205            		           2606    26040    planilla_empleado_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_pkey;
       public         postgres    false    207    207            	           2606    26042    pregunta_seguridad_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY pregunta_seguridad
    ADD CONSTRAINT pregunta_seguridad_pkey PRIMARY KEY (id);
 T   ALTER TABLE ONLY public.pregunta_seguridad DROP CONSTRAINT pregunta_seguridad_pkey;
       public         postgres    false    209    209            	           2606    26044    proceso_planilla_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY proceso_planilla
    ADD CONSTRAINT proceso_planilla_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.proceso_planilla DROP CONSTRAINT proceso_planilla_pkey;
       public         postgres    false    211    211            	           2606    26046    respuesta_seguridad_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY respuesta_seguridad
    ADD CONSTRAINT respuesta_seguridad_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.respuesta_seguridad DROP CONSTRAINT respuesta_seguridad_pkey;
       public         postgres    false    213    213            	           2606    26048    rol_perfil_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY rol_perfil
    ADD CONSTRAINT rol_perfil_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.rol_perfil DROP CONSTRAINT rol_perfil_pkey;
       public         postgres    false    217    217            	           2606    26050    rol_pkey 
   CONSTRAINT     C   ALTER TABLE ONLY rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (id);
 6   ALTER TABLE ONLY public.rol DROP CONSTRAINT rol_pkey;
       public         postgres    false    215    215            	           2606    26052    rol_usuario_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY rol_usuario
    ADD CONSTRAINT rol_usuario_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.rol_usuario DROP CONSTRAINT rol_usuario_pkey;
       public         postgres    false    219    219            	           2606    26054    sueldo_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY sueldo
    ADD CONSTRAINT sueldo_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.sueldo DROP CONSTRAINT sueldo_pkey;
       public         postgres    false    221    221            	           2606    26056    tipo_anexo_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY tipo_anexo
    ADD CONSTRAINT tipo_anexo_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.tipo_anexo DROP CONSTRAINT tipo_anexo_pkey;
       public         postgres    false    223    223            	           2606    26058    tipo_categoria_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY tipo_categoria
    ADD CONSTRAINT tipo_categoria_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.tipo_categoria DROP CONSTRAINT tipo_categoria_pkey;
       public         postgres    false    225    225            	           2606    26060    tipo_contable_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY tipo_contable
    ADD CONSTRAINT tipo_contable_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.tipo_contable DROP CONSTRAINT tipo_contable_pkey;
       public         postgres    false    227    227            	           2606    26062    tipo_dedicacion_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY tipo_dedicacion
    ADD CONSTRAINT tipo_dedicacion_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.tipo_dedicacion DROP CONSTRAINT tipo_dedicacion_pkey;
       public         postgres    false    229    229            !	           2606    26064    tipo_ingreso_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY tipo_ingreso
    ADD CONSTRAINT tipo_ingreso_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.tipo_ingreso DROP CONSTRAINT tipo_ingreso_pkey;
       public         postgres    false    231    231            #	           2606    26066    tipo_movimiento_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY tipo_movimiento
    ADD CONSTRAINT tipo_movimiento_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.tipo_movimiento DROP CONSTRAINT tipo_movimiento_pkey;
       public         postgres    false    233    233            %	           2606    26068    tipo_planilla_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY tipo_planilla
    ADD CONSTRAINT tipo_planilla_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.tipo_planilla DROP CONSTRAINT tipo_planilla_pkey;
       public         postgres    false    235    235            '	           2606    26070    tipo_programa_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY tipo_programa
    ADD CONSTRAINT tipo_programa_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.tipo_programa DROP CONSTRAINT tipo_programa_pkey;
       public         postgres    false    237    237            )	           2606    26072    ubicacion_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY ubicacion
    ADD CONSTRAINT ubicacion_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.ubicacion DROP CONSTRAINT ubicacion_pkey;
       public         postgres    false    239    239            +	           2606    26074    unidad_ejecutora_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY unidad_ejecutora
    ADD CONSTRAINT unidad_ejecutora_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.unidad_ejecutora DROP CONSTRAINT unidad_ejecutora_pkey;
       public         postgres    false    241    241            -	           2606    26076    usuario_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public         postgres    false    243    243            .	           2606    26077    acciones_usuario_id_accion_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY acciones_usuario
    ADD CONSTRAINT acciones_usuario_id_accion_fkey FOREIGN KEY (id_accion) REFERENCES perfil(id);
 Z   ALTER TABLE ONLY public.acciones_usuario DROP CONSTRAINT acciones_usuario_id_accion_fkey;
       public       postgres    false    181    2311    205            /	           2606    26082     acciones_usuario_id_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY acciones_usuario
    ADD CONSTRAINT acciones_usuario_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id);
 [   ALTER TABLE ONLY public.acciones_usuario DROP CONSTRAINT acciones_usuario_id_usuario_fkey;
       public       postgres    false    181    2349    243            0	           2606    26087    catedra_id_departamento_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY catedra
    ADD CONSTRAINT catedra_id_departamento_fkey FOREIGN KEY (id_departamento) REFERENCES departamento(id);
 N   ALTER TABLE ONLY public.catedra DROP CONSTRAINT catedra_id_departamento_fkey;
       public       postgres    false    183    2291    185            1	           2606    26092    departamento_id_escuela_fkey    FK CONSTRAINT        ALTER TABLE ONLY departamento
    ADD CONSTRAINT departamento_id_escuela_fkey FOREIGN KEY (id_escuela) REFERENCES escuela(id);
 S   ALTER TABLE ONLY public.departamento DROP CONSTRAINT departamento_id_escuela_fkey;
       public       postgres    false    2297    191    185            =	           2606    26097    empleado_anexo_id_anexo_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY empleado_anexo
    ADD CONSTRAINT empleado_anexo_id_anexo_fkey FOREIGN KEY (id_anexo) REFERENCES tipo_anexo(id);
 U   ALTER TABLE ONLY public.empleado_anexo DROP CONSTRAINT empleado_anexo_id_anexo_fkey;
       public       postgres    false    188    2329    223            >	           2606    26102    empleado_anexo_id_empleado_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY empleado_anexo
    ADD CONSTRAINT empleado_anexo_id_empleado_fkey FOREIGN KEY (id_empleado) REFERENCES usuario(id);
 X   ALTER TABLE ONLY public.empleado_anexo DROP CONSTRAINT empleado_anexo_id_empleado_fkey;
       public       postgres    false    243    2349    188            2	           2606    26107    empleado_id_catedra_fkey    FK CONSTRAINT     w   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_catedra_fkey FOREIGN KEY (id_catedra) REFERENCES catedra(id);
 K   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_catedra_fkey;
       public       postgres    false    183    2289    187            3	           2606    26112    empleado_id_departamento_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_departamento_fkey FOREIGN KEY (id_departamento) REFERENCES departamento(id);
 P   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_departamento_fkey;
       public       postgres    false    185    2291    187            4	           2606    26117    empleado_id_escuela_fkey    FK CONSTRAINT     w   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_escuela_fkey FOREIGN KEY (id_escuela) REFERENCES escuela(id);
 K   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_escuela_fkey;
       public       postgres    false    187    2297    191            5	           2606    26122    empleado_id_estado_fkey    FK CONSTRAINT     t   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES estado(id);
 J   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_estado_fkey;
       public       postgres    false    187    2299    193            6	           2606    26127    empleado_id_idac_fkey    FK CONSTRAINT     u   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_idac_fkey FOREIGN KEY (id_idac) REFERENCES idac_status(id);
 H   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_idac_fkey;
       public       postgres    false    187    197    2303            7	           2606    26132    empleado_id_ingreso_fkey    FK CONSTRAINT     w   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_ingreso_fkey FOREIGN KEY (id_ingreso) REFERENCES ingreso(id);
 K   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_ingreso_fkey;
       public       postgres    false    199    187    2305            8	           2606    26137    empleado_id_municipio_fkey    FK CONSTRAINT     }   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES municipio(id);
 M   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_municipio_fkey;
       public       postgres    false    2307    201    187            9	           2606    26142    empleado_id_parroquia_fkey    FK CONSTRAINT     }   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_parroquia_fkey FOREIGN KEY (id_parroquia) REFERENCES parroquia(id);
 M   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_parroquia_fkey;
       public       postgres    false    2309    187    203            :	           2606    26147    empleado_id_sueldo_fkey    FK CONSTRAINT     t   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_sueldo_fkey FOREIGN KEY (id_sueldo) REFERENCES sueldo(id);
 J   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_sueldo_fkey;
       public       postgres    false    221    187    2327            ;	           2606    26152    empleado_id_tipo_ingreso_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_tipo_ingreso_fkey FOREIGN KEY (id_tipo_ingreso) REFERENCES tipo_ingreso(id);
 P   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_tipo_ingreso_fkey;
       public       postgres    false    2337    231    187            <	           2606    26157 !   empleado_id_unidad_ejecutora_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY empleado
    ADD CONSTRAINT empleado_id_unidad_ejecutora_fkey FOREIGN KEY (id_unidad_ejec) REFERENCES unidad_ejecutora(id);
 T   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_id_unidad_ejecutora_fkey;
       public       postgres    false    187    2347    241            ?	           2606    26162    municipio_id_estado_fkey    FK CONSTRAINT     v   ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES estado(id);
 L   ALTER TABLE ONLY public.municipio DROP CONSTRAINT municipio_id_estado_fkey;
       public       postgres    false    201    193    2299            @	           2606    26167    parroquia_id_municipio_fkey    FK CONSTRAINT        ALTER TABLE ONLY parroquia
    ADD CONSTRAINT parroquia_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES municipio(id);
 O   ALTER TABLE ONLY public.parroquia DROP CONSTRAINT parroquia_id_municipio_fkey;
       public       postgres    false    201    203    2307            A	           2606    26172 "   planilla_empleado_id_contable_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_id_contable_fkey FOREIGN KEY (id_contable) REFERENCES tipo_contable(id);
 ^   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_id_contable_fkey;
       public       postgres    false    207    2333    227            B	           2606    26177 .   planilla_empleado_id_dedicacion_propuesta_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_id_dedicacion_propuesta_fkey FOREIGN KEY (id_dedicacion_propuesta) REFERENCES tipo_dedicacion(id);
 j   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_id_dedicacion_propuesta_fkey;
       public       postgres    false    229    2335    207            C	           2606    26182 "   planilla_empleado_id_empleado_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_id_empleado_fkey FOREIGN KEY (id_empleado) REFERENCES empleado(id);
 ^   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_id_empleado_fkey;
       public       postgres    false    2293    207    187            D	           2606    26187 $   planilla_empleado_id_movimiento_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_id_movimiento_fkey FOREIGN KEY (id_movimiento) REFERENCES tipo_movimiento(id);
 `   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_id_movimiento_fkey;
       public       postgres    false    2339    207    233            E	           2606    26192 !   planilla_empleado_id_proceso_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_id_proceso_fkey FOREIGN KEY (id_proceso) REFERENCES proceso_planilla(id);
 ]   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_id_proceso_fkey;
       public       postgres    false    207    211    2317            F	           2606    26197 "   planilla_empleado_id_programa_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_id_programa_fkey FOREIGN KEY (id_programa) REFERENCES tipo_programa(id);
 ^   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_id_programa_fkey;
       public       postgres    false    207    2343    237            G	           2606    26202 '   planilla_empleado_id_tipo_planilla_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_id_tipo_planilla_fkey FOREIGN KEY (id_tipo_planilla) REFERENCES tipo_planilla(id);
 c   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_id_tipo_planilla_fkey;
       public       postgres    false    2341    235    207            H	           2606    26207 *   planilla_empleado_id_usuario_registro_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY planilla_empleado
    ADD CONSTRAINT planilla_empleado_id_usuario_registro_fkey FOREIGN KEY (id_usuario_registro) REFERENCES usuario(id);
 f   ALTER TABLE ONLY public.planilla_empleado DROP CONSTRAINT planilla_empleado_id_usuario_registro_fkey;
       public       postgres    false    2349    243    207            I	           2606    26212    proceso_planilla_id_fase_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY proceso_planilla
    ADD CONSTRAINT proceso_planilla_id_fase_fkey FOREIGN KEY (id_fase) REFERENCES fase_planilla(id);
 X   ALTER TABLE ONLY public.proceso_planilla DROP CONSTRAINT proceso_planilla_id_fase_fkey;
       public       postgres    false    2301    211    195            J	           2606    26217 "   proceso_planilla_id_ubicacion_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY proceso_planilla
    ADD CONSTRAINT proceso_planilla_id_ubicacion_fkey FOREIGN KEY (id_ubicacion) REFERENCES ubicacion(id);
 ]   ALTER TABLE ONLY public.proceso_planilla DROP CONSTRAINT proceso_planilla_id_ubicacion_fkey;
       public       postgres    false    239    2345    211            K	           2606    26222 *   proceso_planilla_id_usuario_encargado_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY proceso_planilla
    ADD CONSTRAINT proceso_planilla_id_usuario_encargado_fkey FOREIGN KEY (id_usuario_encargado) REFERENCES usuario(id);
 e   ALTER TABLE ONLY public.proceso_planilla DROP CONSTRAINT proceso_planilla_id_usuario_encargado_fkey;
       public       postgres    false    243    211    2349            L	           2606    26227 $   respuesta_seguridad_id_pregunta_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY respuesta_seguridad
    ADD CONSTRAINT respuesta_seguridad_id_pregunta_fkey FOREIGN KEY (id_pregunta) REFERENCES pregunta_seguridad(id);
 b   ALTER TABLE ONLY public.respuesta_seguridad DROP CONSTRAINT respuesta_seguridad_id_pregunta_fkey;
       public       postgres    false    2315    209    213            M	           2606    26232 #   respuesta_seguridad_id_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY respuesta_seguridad
    ADD CONSTRAINT respuesta_seguridad_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id);
 a   ALTER TABLE ONLY public.respuesta_seguridad DROP CONSTRAINT respuesta_seguridad_id_usuario_fkey;
       public       postgres    false    213    243    2349            N	           2606    26237    rol_perfil_id_perfil_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY rol_perfil
    ADD CONSTRAINT rol_perfil_id_perfil_fkey FOREIGN KEY (id_perfil) REFERENCES perfil(id);
 N   ALTER TABLE ONLY public.rol_perfil DROP CONSTRAINT rol_perfil_id_perfil_fkey;
       public       postgres    false    2311    217    205            O	           2606    26242    rol_perfil_id_rol_fkey    FK CONSTRAINT     o   ALTER TABLE ONLY rol_perfil
    ADD CONSTRAINT rol_perfil_id_rol_fkey FOREIGN KEY (id_rol) REFERENCES rol(id);
 K   ALTER TABLE ONLY public.rol_perfil DROP CONSTRAINT rol_perfil_id_rol_fkey;
       public       postgres    false    2321    215    217            P	           2606    26247    rol_usuario_id_rol_fkey    FK CONSTRAINT     q   ALTER TABLE ONLY rol_usuario
    ADD CONSTRAINT rol_usuario_id_rol_fkey FOREIGN KEY (id_rol) REFERENCES rol(id);
 M   ALTER TABLE ONLY public.rol_usuario DROP CONSTRAINT rol_usuario_id_rol_fkey;
       public       postgres    false    2321    219    215            Q	           2606    26252    rol_usuario_id_usuario_fkey    FK CONSTRAINT     }   ALTER TABLE ONLY rol_usuario
    ADD CONSTRAINT rol_usuario_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES usuario(id);
 Q   ALTER TABLE ONLY public.rol_usuario DROP CONSTRAINT rol_usuario_id_usuario_fkey;
       public       postgres    false    219    243    2349            R	           2606    26257    sueldo_id_categoria_fkey    FK CONSTRAINT     ~   ALTER TABLE ONLY sueldo
    ADD CONSTRAINT sueldo_id_categoria_fkey FOREIGN KEY (id_categoria) REFERENCES tipo_categoria(id);
 I   ALTER TABLE ONLY public.sueldo DROP CONSTRAINT sueldo_id_categoria_fkey;
       public       postgres    false    221    225    2331            S	           2606    26262    sueldo_id_dedicacion_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY sueldo
    ADD CONSTRAINT sueldo_id_dedicacion_fkey FOREIGN KEY (id_dedicacion) REFERENCES tipo_dedicacion(id);
 J   ALTER TABLE ONLY public.sueldo DROP CONSTRAINT sueldo_id_dedicacion_fkey;
       public       postgres    false    221    2335    229            T	           2606    26267    tipo_anexo_id_movimiento_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY tipo_anexo
    ADD CONSTRAINT tipo_anexo_id_movimiento_fkey FOREIGN KEY (id_movimiento) REFERENCES tipo_movimiento(id);
 R   ALTER TABLE ONLY public.tipo_anexo DROP CONSTRAINT tipo_anexo_id_movimiento_fkey;
       public       postgres    false    223    2339    233            U	           2606    26272    usuario_id_ubicacion_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_ubicacion_fkey FOREIGN KEY (id_ubicacion) REFERENCES ubicacion(id);
 K   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_id_ubicacion_fkey;
       public       postgres    false    2345    239    243            �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	   (  x���=n�0�g�>A�v~F�I��E�Zta�U�Z-mn�C����t�ə��(aczOƻ���x���
�<�����P
E{v��u�d*�����\�
�& ��ɰvJ��Ύ?'$��	�n��
Jw�͚O�`���$�4MOH	�h��ehEL�]25c���p��H]���́we�Ce[&��������O�l��OSr	��|h��')�
�B�}5��8��e�Pv��ZN���g$���J�%��_,*��`/TB�����c��x�B�(�2      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	     x����r�����S�	N�"�h[k�d�H�����YzT��@u��<�B
��m���P�|��a�r��H4z��wO$��V�A�:�>":�ź����mWu0P|��� ���8�R�F�P�2��J8(����(,� ���_�A+q5=u�{�7H{ R)֭����D�X���@�H���a�5�����{��H�^�bQLJ�+��]p*�A��y1)o��M`_Ĩ\����wX�cRaI��혴o۝�S�O[i�I�xG�)ة`Cn��l�Hq�|�/��_�"qQg�,@XR,.4�b;��ŉ��Z����)Nť�����B�z������aD�*���]C�&�Z7��68����^�~Ef���ng����`�R\w��kp��$NT�9���HO
'�e~�D�b���0��%*���d?��W�(���F��R("e6oF��3Y���1��(�*�7ʴ�١_�`1���dEAf#p�Τ�B?IQKO�ǹn%�뺚������JCqFǯ�u�b�H�x��ӷ`�_�WupN�%� �Ϭ7ӷZ�7��[+�YW�I��Jݫv���0*�S�!Rƹ��4��B�.xK�ig���Q��P�W'(�>���㴊��a��I��J��F�*LZYҵ"�4��@Ti�2MO'�G��
��B��c�BW�U�0q �"q=V�zՁ��}x8R">��l6�eR*~�M��A�L�kvH]�6��"��J��E�"?�r�n)>�����kpZ���Ȳ	Uj�Z�~α�+BX#�Vbmtߨv���?�JqJޡE'��Iz�����K:<v�2�b��A}5��w�I�����(8?&��C>�37"Q��݂Mϑ(��ztl���5���-�Sø�]��$��t�������z�P1�1���b�����"qf8�[d��I��M�{����K��#i�|�
c2�����G��^����#/���Zpk�I��@�H+q�n)��V'E����j��`�U87��n����L��/U-Y\�'R�E.���E�J�����s��	�"�&e~�EDʹ]4P.����B��b�--2i%.G��m�V�L�u������J[��J~�'ܣbT$>��O~&Ŕ�>t���#07�I���m���)6)#�Gg!�LpD�)�l����];B¤B\�J�f��LZy��7/�"R�E�m�ZT�\Bz5=IXQD!�Xf��O����c%\3�^���+7c5�ip�Բ2��:���+"V�@fa�8�����ZX**�eT+NGP��X6	�f����b��.յ�H��[y;B��3+�T�UFB��J�YW���~,o�K���,�d�|���Y7t�a�/�X�=��܎���YV�y]�EN�Fc4�naqH�a�Ⱦ��g3�":���Y�'١�%NM�,�A�Rq��{��ee~����������p�ą��b]�l%>��A��U��3+	��l?b�O�	�����*�s�纫:��E�J��t���N�J}��,-�i7r�� �lw���ϔi�Q}+V[�ԅ�k�ҏ:�J���v�L�XV)�='C��m��l1��JC������h�0�.�jǊm,@�Hǋn�K�mʙ�r�d�,�* �]��9X:�W\H3=Y��;�|t�`�'9U�#s��ՃgwgV!��3��@�/Y+�N7ӷ<(�`��p,p�e6m���҈Q����0�sIF�>��?�mY�����b�X��i�(%��q�k!`�s%�R��kYT��U��BOa;+?:��(�FU�����^�t� �{�圷YQ�H�qi��F-�9VĬ�j����H���n+f���� �+�!0Y�eҰ�C��Q�2��Ѭ��`���$��=U�U̲��J6]oGY u�Z����~T�b�c�,�қ|^C�ڏXE(����~+W��^�W���g,~���ˈ�$9V⩨Ȭ����ee�ƺ�7j��ۦ#����w�\���"�EAG��>���k�+rc��8�-ub�BA����3�"q:��e���v���m,+�p��?�R�1���\���8X���$x�c�U:�D�;d߱
?+n,����z�*m��3=�̐e���MQ����PSt�x.ʞA7}9V".k�ف���ci�Z���=Ջ�Uxjd2k�I[��k^z#�S�V�t�0[��w`Kt�����yR�[�����4�� '~�r?Cz�U�˱��s����{b�ӣ�⦳��v.fE!�z�$�ˉ�k�ĝ��ҊQA���F�JT]���3i*��z�e�l����R��p#�������#�J ��+)�n������/(�n�ϥ-,�͸��mLǊ�'�K�t�5+�ћS# '���^���Q���������Բ2�a�����g��3��Uɶ�"瓮k��m��\���V�C?�`��JKX�q�jt����Y�E&b�Z�]յ����XN6/���qm�J�J����e�	,�T�`7Y��_Gg���^QI��Fi�la���^�U�S<��`iH0�L��4�|�W���J�ڲkY7V�`�c�����W��0J[�-<�a6�@_�0�V⊟����t�+yy�sX��Nw,~�(�&l ﳅQ��UVc�;�eY�'la��L�V̇-,ZXN��f�a��Vބ>=�l�oL`ga+?O�U>�Ĉ�����-,)ٜ{�`Wc:X䧵nY�x7=���� ;l+��L>I����XZڢ[ X��v���DU�U�s�SN�y��A|�n��R\�VR��a�*�Y1��G����h���І�cqݣ�����z׵�OM:��;�na>���q'�y���ĵ�vf�N�;V���!K�ԲV<]��_�ɬR|�A?���*��MD�Gյ�w����Ʒ4R@U��l4+uSH��m������A3+?,P5��.(e��d#�?Y&����p��?�ZPcd��`�4��hY��� f��+ѯg��dˊ�5�=(�`1Ep�|(���-��hY�!��$9V�S�
s��c垂f�ƌ�h=�c��Hg-��;���Yb%!�LA	�VL�H�)��{PNY���,���zJoq�?7^[��٨C����<��u�;���A�G+8�1�%�Us�eb-'�tH�aOͱJ�^�-�̊Bw	1u�E�5T��X��C�Y���~��D±R�I��=3�/nk8 &?u)w��������Ae^L�X�}[��a����)��-6 eV�+�=�2,�ZH��V&����g�c�F������Zg����Y�w����׭�{�ϻ�����`s��Z5wf�k�G�p�M�%y��mǁb��[v�	M�by:y`��x�7^};=�`V����d�է�Jj���}�;���������lY�A�	����_c���IcjY��MG4h��a���������?      �	      x����r�Ȳ�ǥ�����2e[v�dkI�cwǙ�j
� �.:ۚ�G��Vxֱf|���U�(��������������f�WVW���>*<��i��_��q��3�.M�-��ٺ�5��R������YW�$Łr����ַ�����Po/fW����-�g"Rɏtm*k�ǁ@a��/�i�?�Bu�����:�}�I_�
��X]���R�nt;;]�[2|-�
jnl���F�X&eB����a Ϩܡz���<���X��[2i�g��V7����n�Q�ƚ-�bR�nz�{(�)RQ<[���� *&��}��;�fc{4�D	$������cRJ�z$Ǒ�J��Z�<l���r"��s�w�G���$*��zC�^����T�����Hq����.��ym�?��m�����$&_�����fa,�|��k�86ȡ"E��7�a*B�ꪡ���M�Ι���^��ߒ��d&�vكQLbgb�q�$�%���R�uG�l����P��$.�\�OAJui�5Ť�"�u��K��@)?I"���(��y�'$�5��@G�H�I�p���A$
8���q�L����f�<I|���zh�F(2V�z;�\��4��Pap��3Q���{�Pi��8�֚-��!߆��`}$AEt,���o���I�K,�X}j;`Bl@E'�KN\�E�y	��@t���$�0>I3�c�[��$�y�Yh΀P�IZ�S��������$�����cTz���h@/��C�W��(�FE곭�A�C�G�8�������|�;:�F�D�G��I��uGG���ԥ^�-.���,g��`=[�*Լ���:��?= m�*O����ݎ�K僋n�;RE�I.cv�w�r�"o�>��o@�.�X��;���{KE�I���n��ϟ�`g��;�F~����ӝ��v�<*:ɳ�7�=��BA����
N���쟠֝Y%����T|R�?��K�3oj������w���G[�;RP���`��֣�G?A&�Q���%}��N��X�I�
����7��A����E���X�I!5��;�۪��2A�*>��иg'���B�I����ؕn�m��OJNv֜ق~�xopm�O��M\7ػDP���ʰ�^�r	�3[ow�PX�z�\�\h���YwGWE�II�����v�%pS7c��*�`t��=ρU+n���m������3���b��t��}a�����z9�d1�[g҄��˾�/� V��ћ����(ȕA�B�kۣ{VT�m����[6�ĊN�0��ݙ
l���U�;d�ԁ�뺭8E��cc���痺2�t(�g%\�#Oc���{VL,�6N��mGV�Fj��S����7��F��P��R�P:V�κ�~|�b%'a����5�M߱��ܥ�]鯐�̱":�}D�qJ����om�m3q�d���8#V����y0�0E`.�qh�����j�7�(���Z��[�N��w@�+XN0.���NcfS���ʜ���w+T�隋���p��?��1m��)V��#=�eM����+V�]�����t�����	�k�O͈e6G#��]Z�
�q�:�7��W;!W;N��۵���~�e��guF�՝�`�r%�3��_�A�����s��.���;�`̱Ju�mg�<�P�buaq�^Zz�4�����r�P�i��z���9ء�K�8τI3莬���<�#]�#rG*��%I�8oC�t�ؾή�C&K��sʃ�����ȬLqY����'�a�������UHN���{d��Pؒ��%r�ì�q�JȽO�Na�����~F,�w�g?�S|��]�\9����r�BN���a��T�kn$��k�du[��T	y�i�����-���%�<�4U��F2�\ґ�;�k�X��Cl�u�;��������B����Xô���ɡ���R�6ZC�ߕ��9��[%�g�:%7�����f̫�W02w`Q��]�5�Rܾ������	-V�=���D�g%�ܚ{l۲JɃ�Ru[��,V��LyU����a��n2x1ݳ
����EnNV���l�b�R�s��U���b �P���r�h���buڳ��{��<�ܷ��WK��d��ҟ���v�}��s0?�"N�m_���5���;�<��M�yV���%Y�Uogo�59:�����K7�?��*|�y�=��o���/���d֋����g:V|�b�ŉ�Sr��D}����󫾩Q�	c���6��.��\�z��@��\�"��R[���,Η�>�5:|�k%=mw]��Y9f��!>:���-k���Rr��Љ�y�i:�)0�����G>d�~3�����%�.��]��'���.^�F��,��{UX���v[;ZνM���4�"�;M.�ؖر��Вy��j�u���.��=�T�����9�m��v76�â��-ܽj�;XW�c���	l�=.�
��6�b�jm�b�s=+1�un��b��
�>���3�,������8?�I�妫�3���Co[����9+|�{��2��U��a��J����E�,�Т���≔+�;����YL,�Ւ�V��Y�4)p�i��Ï�+W��v����*�Y�s�k��ִ�b�j8�����n����wv]/0����~ |�� ���o:T��+>���Y����l��i�T��:�b�B-�h
�>�;���RYF��Y����/	������3��M��mu�p8��]G���(�!S�*ˉ'*_�X�4��J
L`�(�q3�Y��t��p�'�bǣu������t�R�����+	ԧ��ƦӅ�a���
yn�M���)�h23ŴX}n�B�G��X���[� ��R�.4��ɱ2�{Wu8��cV>���$V�N��i�Rly�Y��
8X��������(��`)7ǒ�(����X���ﹷ�:��cs�UD���s��m�U+U��8v�7���)7l�P86����9���V�C	�;����Q#�fe<�b��z���O,8��v,ނ��z_��b��Aw),�u� �K;��)��<&V:� ^�,����W󒕫ϛ	fZ�U��@M<h�J�K��]�� f��4�Q�ˍ� GZ�V�n�����ğY1w5m��yN,٠b��ce5���.�=y��fae겣k~�0k"�Aajn�{pF,��rQ=������-�q��7hs��(�("[���wZ���pV"~��㣚�iA�G�i��y�ʆL�iS����
��\[i�.f�	&g�U*�����
���2P��m�G�P}h�fc�_-.=�
�yG^�.� :V<�$|E�UTA�o�L�"��LY�d��XŻ �M�JW�c����\�R��v]ӭ��8�ҭA0�1KV ���b�#�*��+t��Xq�N��X�앰Bu��z�i���cE���7���;,VW��	K�+S�+K��둬�X�i����`�%��7�!_�2$V1MFVX�4ݫ�b�R'�|]��`�r�$W�Ϊ;����t�ֱ�\��Q+�hM��&��+ݽY�;�ʈX��җ��
���'YY,���b��+:�s�1�T�Ft�[��c�ua�=�<��"����ow�b�
�&���opu�[��ira��R�@,��2%��W�]��J�YqTf�ʦ�U.sb��Ϳ<�2Y�U���Y^`�ڭP����ܴ�C�����K�B���#�[P%��q�n떜�86>�ݵ�'�<C˳[�.$����|��8Rg=z��)���uex�D?���a�p�\�V��@��R_��1\W��Iز���4+L����ty�9q�>�1�}��J���u���>�����l�F�vR;X8�%v�H93e����K�b��H�v���D#�*��;�վ!B��`��6�R/5;����'9WI��%]3�ĩ�e��t���\���t2[Ыv�\jI[^42�n���zZq$�}jWN_�~���=�<օ�},ԗڮD?��9QG�%L7,�/FNxqpq%������'Z�-���@� uKyEL_}̤��f�l��-`��+D�     ,R�0
�R�^m����)hY ��n�dk`w�@��~��&=,R�G�h��]�ˆ��y��7gԶ�v��b�,U;\g�����Mk�%���i�4+O�P�����0 X�oZ���xn�����%Y<L�]��$�R��3����q����^��,����}���a��<`��G0׵΃��ruUsyu��C��M+�8���5+��S�@��Qx]�����3-dN�+��`������s;�L̽��͵&�@_��۪�fÅ���(��8��F�0�`�=X4{����xw����mWX������_��K�`e�*w�=v_��Mԉ�`�l�;��<Z�HXZ��L�ؒ[�m �0�!N|�%�5N�5x(�a�r�x���7�mс�(�.KuiZ�^����%^����>���GY�r�ec1=�D+�FF����8<,V�Gnvc�C`��L���`�4���S��������M�7�W�˘���cG��X	�����@�'BnD`!����k��Y,"ÿ� &�B���:N��,��5zﱃ�G���3B��h���������%-�[�r�\'�b�=ېS�g ��`���+�R�_��@]�J���`�4}�&cu���7�eDsBw; A0��"�a�Y���fv� xX�jaμ� O�a����W�"��\}��.�`����k56!�m9��1ȁ7��!�t&ZARv�5l�Ү�xC6{�V���c���E"�����S�2rµ��H	�0&+ΧFcrzX U7z������K���5d�ɰD���z�Î(8���إޑ�;"����y�F�\�{n�~����xғ}b��۔`��%��0�p��^�`�� �)��vn�d+X��a��k?@+_}�Iu�����-D�]���4x>'�؂�P�.ۀ�c<,~�8���K��F6����s���(�`[��@�t_�X�}a{�� �(�Hs��fl����b�y�yL1�ތ���0�A�����������]��ii�0D�U�؏
��g�[?�z\7���YG ���/:k�Gԃ`��(�y�Qh�e}Z���3��B;����'��U/Эs+_�h���s�����ӬB���a{�%wl�5�0�)>�"N�w�[^,�zr��X��7�b��;N�e��V�<,���wv��ށw�|�<�������\�M=����iꍙ�r� a���b��IzVN#q$�"Pg][�M����4Q9Cw�4/[F���F����` ��_Вi�,Ul����,�H���r^޵��ck��2�B� �(��q�V*�4'��#jU����B�9��������|@h�+y��BOsY����|�8�/�sQ���}<,a��]͊`����?�̪�) Že����/h"�lkx�W`�z_7R,���)��� �J��_wK:Q��
dXϰ���d��\�a�(Xc��4���9Y°4 X"Mtx%����9�t��+0��]=�
O##�ۑ�5~M��F�η�\��i�_��O��f_�F'i�����v0���B馨��w�V���г���3S�,��G��
�Q�a	�4���-�C� :��,",G�
���£DRXEތ\��\�7V��tc[�aRh��f��f����d���Ʃ#zX��
��ra��EB3���	�{X���Wb}�M�F�LgA��?�Rukk'��רp��d�����Ҙ`�D1���a����$�J��Z�A?j�s��+v�λ�q�Ԍ�#$\B�P���v,�֋ư�ԕ�yG�c_��E���/h���׺^�b��������K�a�5�ZzLé[z�5ܶw��F�/�9��\D���lP!XJ�B]��F�|cZF��Ѥ�c;s3k(X������ycd���E��`�Dç���V�a$O+��y�M�88�RnF��`��D�������$�Z��3O#+�W����a��*�������@�V�\-�z�0-	�wƶ�'�d�2�G�F���i�,B��0�{�Yt��M���Ѳ-S�즇\۞�+�]&;��z�S�Wa����o���r#N�9���'i������������F��0;�^�?�ZRt@��q��pOa�Mo�[F�o����9q�9+rf��n�c�[n��cٍ��D��&����O��Pʸ�ԭ���ٛ�;�&PYɎ?:7�a95[]�-�p����P��mt��i�lT���"��/�F��`�sšc�X�8���'s)�wfȷz�țq������{X溊���0��<Nfi���|G��
QS�h��#��Ju�sg�F#62:Z��3�4��O[�u���qnde�S�ϰ�nz�o��ۆ�6Ti�h�'zݢ�F�HMF穾�e�^w;��LcU ����ĖD��`ū1�Ӧ�?=��i����<�6�y/�Hf��HV?���ѯT�D!��@0�zKn�z����������������;�e�Th�_��B�&Z�$�\�u�� ��jN�|Y�sc�- #I�[�� S��T�z����yt��0� ���D�[
x�Z�D�@�V��e_{F�̈����M`�K�rP���g����&���	��^�����Ȇt�9���)�B����j��(�mUM�����E�_1)���g���q�w������m��5U-#Z��0���q�x��7��Ch9�r���=p�	�-�WȺ8�,��x������aQ�T��L���&��~���z��D�,-�/xX����Iq��j�$5�V���\ۦ{0��3^����hv�.���BEu+µ�h�$+�����^^-.$Ofs�n4���"�M�O����I��u�:XH�Z��=�7Ь7\d�	�}g��#FAh��F0��UAF,]g�%6�ڼ]�kg�V�m�ņ����1�쇇���.��h�F]\ƺN+�.�g�\�Mgh�`��d�[���n,�`N�AbCy�%�v�Ti���@K�g`w��!W��a%�O���} ��&��o̺����#+)ԧJ�ʁR��P����7�hi�I�˅����9X�h��z�c�䆈�*8=���f�9kD���	X�K�V|�������l��:>l�E_!��F�c�����t+��{L^�;.��t��d�7Wu��%���OF�w����{��P8�|^	��#��Y��ՍW䵰�c&}"o����G�0�~�;��l��ޢR�B��S�/��)R�%ytY�S�`���S)=����۬x� '��+���_�7CaN�h���\���3����5�*
�;�ө`��sV)Z�Cz��&�����3V��rӸ� �i7ӑܲ�G��hE�$���ʁy��tM�a����Z��≶;Z2)M�"��,���
�k`ﶇ�Ӭ͊�BrƧ�]��t�a��lV�u����z!]{xX�D�ѫW�w�1���ZF����K�  ��6jv����dͻ��Zu�T��o�y�Ѹ:����0W�=몾~���s�f7�{ =͹"_�ʌ/��
�/�E�02"N��Y� #X$mK�V�,>�Ҁ%rU�ި�KX��.k�h��r��� ]��r��W=���øϬ���5��+�?����)��*AQP-Tsn�[�	V,�j�v�I�Nߋ����X}�b2�^��+o�3����`h!�R�+߮MQ�;�E�|��.�J�Q,��?l#��
����f�vK�/��91�i	�J��	���(�(���D�(b�9
�q��Nok�m�s���S��9�u�W��� K9_\[t�=
鶎2uţG;�q��\�.m_@4���BTVVvàa���Mk��H�A���3¯`t[ǯ�PX4ѓE����
�IyXr���3���L0rC�TA��޴�}������|���ft/%G�!qẈN��ڞV�.H�r��������`�:�� �j��C"�@����T`�V�6�v�.y�K�9a1��z��2�a    f�v�n�\��e�M�P��%z��0�D��*}k�ҵ������ԛ�|<�|���쎫4���_	G~O(�2���L;�U���ܬ�u (��i,��b�i����(���a�ԥ����;��(���, ��\��*��Vi�D+���Ӭ�f�T�Ú�!٘���Ѳ�9M�T  ��Y��]յ��,�wXU�(&�8�_	W}jǿ��D����6���5�.��FE�����,��z� �՜B��*��|�h���/���V�WG˃W����N��qe�<,�Jz����/d.�������"�E|F�l����Z��R�㟻��ö��ȅ^XH����u,�ٜ`=,���\t)�?�~�FaFΩ����i��ȩ�]Տ�$���Y՜���� {�l$����_D�
�l{Y�8nQ���U���O�i^�bh�47h�;}�q�4,s]0��S�!2��뺭�n�X!��4�s��p��w�z�����[��иk�o���+d��a䌴��-����PlX�<�I���+%�dp�N75
�a�7�v��J sވ���Q�]J�ȕ��k�ڬ(�@�,Յ��K ��� P��nK�輇��\!�a1�"��6X�c���3b[S�3x�e��L$t�#I���k<^�`���|S�����=�X��� �a��}ȃ:��vhٍ,|�d��k��d�d��w����r����
u02!]�5p�_`)K1�o�m����V
�V/xp���
���P��c��]���q�(Pצ]£O'J�	l(�xqh0->�C�J�%���������x�I�V�T��2uMA|3c`���u�?V������DhZ���ƴ"@�U���-Լ^�oK���hK�Y�c{\��)ֵ����6U�������t��`��36P�S�Q�S4�;/hƹ��X����jyX�ݸ�IrF+Շ��`��,9ivڮ��:VD� 4	��¡��|�c������vP)�gX�S���wcK�y�#k�vK�u�"܅^����#������*<,e]W6[8�-�h)��7�ɉ\H]��i4�"5ɫEx\���k�w���i�m�K�>/@U4G�*=gre��F�V)�\�%��?a�;�,�z���h�4�����4��)D��Y0y?�_�{n욧䮻-DA���!�sF�r�K�y\�ޮE���k�;zϹ���7֎)�D0r��Rf��R�X�Kz$و1��-���s!���N�g��o!yvY��V��`��L�ȕ���������h�5�~`�-U�����V�Km�V��V\�7n����@9I�:M�o�;��3���m�M��Ju�0��YT#�.ԛ���]���m:������%�v�a����_���}���zZ�䂩w=�řh�E��t�3Xo��Ru�2Բ&
#�5���D��$2��ު�uX�U��ͧ��8���@��l�����V�!�X�`��('���c4�H����)"��ؖ��%F��%���e!l�B`�zc����r��ɲ�;���KWp�U��vH� c�w�A���%]:=O�J�H`^+�,����x��u�W���#��=Vg{l-�`�d��T��9y%w�����b�cC��ބE�#L�х]�b����{a�K��r�� ;��4H�`䊔�`S�e�0����zZ��x�4}���ʚUע��	V�&m�9QEE@��mߓ�c�ޓм6��G��ؠu�a�V���F��`�T��25���������[�&��9Wc����Z�}��8�����'��#*^��������/���+v,T�x��E|2K���^	v0=�|�;C�p�o�.��:��B�vXD��%���a%ym�,y�x�T)������-�l��,Rgt�-�*0�7���>�LK�d��nD�3}�c?����H�q��j�N�#XB�\��5VH�V�%�ƈ��LQ�׆g3p����!!0
h��|p$K	&�~����ឹ��el&z�����S�9�D��"(��=,m�3��U�0w�Êɜ��h�T�LK�V��ʚ-r*�(�56�NH�iN7\9D�Z�[�eU�Y��C�X�D��pCV,u0�]�>&6�̴5x)��$)�:�����I`�L��{�V��g���N�N�T�"t
%�2<,|9"�M��;;�>�ǉD�\����F�|�����ڿ�Q8���� ��R�0t2x;�d�(�O�J<���/`�,��`��Њ���VN<��f���Ѣ[|�>| �"57���ÆO�H-�}��9�ָwԨ�q2Hs՛E���<,u^?7q@�Q����uձ��lNц�2 kܸ*n�icV�0T`"�ﱃdV��Ҳ���?����.w͠;��b�<T��-z��-g�4��
p��첮;:��ݒܭոZ��h��(߶���WH��?J
{�T���Ɩ�5�0�-;����nL#K�)Ap��ø�:��Ű��
|<Gc�U>�o�|N�ul�q�fQ���A�� ZD��=���@���K���1L��C�h��L�5r�����~�/����o<��j5��q�?�����2�܀-����e�`�?�������`!�le�d����`Os�4}�X,%��{#_�8��.z��P�m(����Ecv����I���h]v㐆���B�u`�Ȯ�/�?XS�`��v���Xk�ؽ��42"���w�	����w?�p^�1��}�-���iu��A�4^���d.��i�Du�8��s���^�>�
Ѽ�Xg*���C�4rx�l0R���!�p��"ZƴP����7��Lc1x�NV�L���ڂEX�V2��Iӭ��-U�fm,ts�3-�ZS.ąl��\�.�`��n�,�ī"��Iȷ@XzQ[Q$@�"/\�j������������8�.��W��]�m�$_9Q�,=�W=���4�r�D��zi����ö����
D�.�8M�Wh=	O��.��R��U _����> ���D+��g�P\o8�ۍ_z��[��j;L��%.TR�Ċih.[r[�ɧ6�y�).l��j����8��c�}��9�t���!�'e{/z]�fO��Am��Õ�^�~��ʠ���q�z���9��^,����4������d���m[� ?t@�h{$�H#������3/V���`�s���@�'>1�]~�����@V_��Ov�[>�������Ų�,�kl�/h�oE���[��G�"lqh��C��t��OK�,��C���Y��D�Pyh��3/�������D�P.�pG�7t�Q��8�H�D���,
�	k]CKH-�V�N�w������4��1��d�H:�t允0\9���e���E?��P�f�,��[�o�zc���}����57�!d�q�!�'���d����<�������h�����|�neݧ{T��h���X._]���#Z)�F���G4i��BW���i��zZ����<�Z�h1[�]�tk7@�
�gz�0��+�N�U
-u{�?�V��㲗K�Ȱ�#,���eϕ��Y���\)7@��Z����a��V�����]��~�-���\���q�-���h��Z8-V�z�z��%�!�yg��%�j���8GT��b�8�@��U��$2`Z�DR��k�@�{p䟘JVT��놲(�t
�{��d=��i&���3���"�EGI��������/�sm�@�Շ�i�������� C:�HW�Tr��|�Q.؀K�-������=K�����l�v�ѫ�����@�է���jދ�4���(k��)�8�C����P1��� �t�W�Źr¯x�H���E��鍣�i���r���I����Wu=��W��������pCW���>-�,o)��W�h��dq�q�A�:�E�4x����K��z��w8/�Y�;�NY&4�J��i^����%->r�@k��h������=�|9�$�,�; 3��IT�loȀs �   �����|���\�ݹGL4	�L�=�A��=.
��rP(G��Z8�Ƞ�E��L��q2��A�ڻ(s�ɛ�8do����E�>x�%L��=����\�����ɡ�V�~&���v�Kpjw=��g�P�����<�q�D��z�c�7�z5D���'��_�j����-eZ4�+'����g�i����?�urr�� N�Lx      �	      x������ � �      �	      x������ � �      �	   �   x�m�M� F�p
N`���4����nF+���^L�I��dv��7�lON�p ��!B(��*�|�NXG�H8�g�ٰcʎ�D.p'�[�����0}�s}��`;2���l۠1:e��ޒVכ^Z��+d���b:B��Ř�]��2�yۍ����]}�����C*$��q�_�)j[      �	      x������ � �      �	      x������ � �      �	   w   x�3�tL����,.)JL�/R����.#N����ԜDمi�1gPjriQq~��Ginb����&����E)�y�0MIU���m4�(J-.-(M-.ɧ��l4C�#�T���=... 8ox�      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �      �	      x������ � �       
      x������ � �      
   N   x�3�t-N.M�IT pq��$�$���+��*�&��+x��&�iLM���R�KJS��\6��qqq ��%�      
      x������ � �      
      x������ � �     