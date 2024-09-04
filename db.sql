--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 16.3

-- Started on 2024-09-03 22:23:02

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 4 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: pg_database_owner
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO pg_database_owner;

--
-- TOC entry 4866 (class 0 OID 0)
-- Dependencies: 4
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: pg_database_owner
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 19411)
-- Name: aulas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aulas (
    idaula integer NOT NULL,
    numero integer,
    nombre character varying(150),
    capacidad integer NOT NULL
);


ALTER TABLE public.aulas OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 19410)
-- Name: aulas_idaula_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aulas_idaula_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.aulas_idaula_seq OWNER TO postgres;

--
-- TOC entry 4867 (class 0 OID 0)
-- Dependencies: 217
-- Name: aulas_idaula_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aulas_idaula_seq OWNED BY public.aulas.idaula;


--
-- TOC entry 220 (class 1259 OID 19418)
-- Name: materiales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materiales (
    idmateriales integer NOT NULL,
    nombre character varying(150) NOT NULL,
    cantidad integer NOT NULL,
    idtipomaterial integer,
    idaula integer,
    fechaadquisicion date DEFAULT CURRENT_DATE
);


ALTER TABLE public.materiales OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 19417)
-- Name: materiales_idmateriales_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.materiales_idmateriales_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.materiales_idmateriales_seq OWNER TO postgres;

--
-- TOC entry 4868 (class 0 OID 0)
-- Dependencies: 219
-- Name: materiales_idmateriales_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.materiales_idmateriales_seq OWNED BY public.materiales.idmateriales;


--
-- TOC entry 216 (class 1259 OID 19402)
-- Name: tiposmateriales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tiposmateriales (
    idtipomaterial integer NOT NULL,
    nombre character varying(100) NOT NULL
);


ALTER TABLE public.tiposmateriales OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 19401)
-- Name: tiposmateriales_idtipomaterial_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tiposmateriales_idtipomaterial_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tiposmateriales_idtipomaterial_seq OWNER TO postgres;

--
-- TOC entry 4869 (class 0 OID 0)
-- Dependencies: 215
-- Name: tiposmateriales_idtipomaterial_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tiposmateriales_idtipomaterial_seq OWNED BY public.tiposmateriales.idtipomaterial;


--
-- TOC entry 4699 (class 2604 OID 19414)
-- Name: aulas idaula; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aulas ALTER COLUMN idaula SET DEFAULT nextval('public.aulas_idaula_seq'::regclass);


--
-- TOC entry 4700 (class 2604 OID 19421)
-- Name: materiales idmateriales; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materiales ALTER COLUMN idmateriales SET DEFAULT nextval('public.materiales_idmateriales_seq'::regclass);


--
-- TOC entry 4698 (class 2604 OID 19405)
-- Name: tiposmateriales idtipomaterial; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tiposmateriales ALTER COLUMN idtipomaterial SET DEFAULT nextval('public.tiposmateriales_idtipomaterial_seq'::regclass);


--
-- TOC entry 4858 (class 0 OID 19411)
-- Dependencies: 218
-- Data for Name: aulas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (1, 101, 'Laboratorio de Informática', 30);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (2, 102, 'Aula de Matemáticas', 25);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (3, 103, 'Laboratorio de Electrónica', 20);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (4, 104, 'Aula de Física', 25);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (5, 105, 'Sala de Conferencias', 50);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (6, 106, 'Laboratorio de Redes', 30);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (7, 107, 'Aula de Química', 25);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (8, 108, 'Aula de Biología', 25);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (9, 109, 'Laboratorio de Robótica', 20);
INSERT INTO public.aulas (idaula, numero, nombre, capacidad) VALUES (10, 110, 'Aula de Idiomas', 20);


--
-- TOC entry 4860 (class 0 OID 19418)
-- Dependencies: 220
-- Data for Name: materiales; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (1, 'PC Dell Inspiron', 10, 1, 1, '2023-08-01');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (2, 'Escritorio de Madera', 15, 2, 1, '2022-05-15');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (3, 'Silla de Oficina', 30, 3, 1, '2022-05-15');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (4, 'Proyector Epson', 1, 4, 5, '2023-01-10');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (5, 'Pizarra Blanca', 1, 5, 2, '2021-09-20');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (6, 'Monitor LG 24"', 10, 6, 6, '2022-11-11');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (7, 'Teclado Mecánico', 10, 7, 1, '2023-02-25');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (8, 'Mouse Inalámbrico', 10, 8, 1, '2023-02-25');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (9, 'Impresora HP LaserJet', 1, 9, 5, '2023-03-30');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (10, 'Altavoces Logitech', 4, 10, 5, '2022-12-05');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (29, 'Razer', 12, 2, 5, '2024-09-03');
INSERT INTO public.materiales (idmateriales, nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (31, 'Pc Hp ', 12, 1, 1, '2024-09-03');


--
-- TOC entry 4856 (class 0 OID 19402)
-- Dependencies: 216
-- Data for Name: tiposmateriales; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (1, 'PC');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (2, 'Escritorio');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (3, 'Silla');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (4, 'Proyector');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (5, 'Pizarra');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (6, 'Monitor');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (7, 'Teclado');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (8, 'Mouse');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (9, 'Impresora');
INSERT INTO public.tiposmateriales (idtipomaterial, nombre) VALUES (10, 'Altavoces');


--
-- TOC entry 4870 (class 0 OID 0)
-- Dependencies: 217
-- Name: aulas_idaula_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aulas_idaula_seq', 10, true);


--
-- TOC entry 4871 (class 0 OID 0)
-- Dependencies: 219
-- Name: materiales_idmateriales_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.materiales_idmateriales_seq', 31, true);


--
-- TOC entry 4872 (class 0 OID 0)
-- Dependencies: 215
-- Name: tiposmateriales_idtipomaterial_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tiposmateriales_idtipomaterial_seq', 10, true);


--
-- TOC entry 4707 (class 2606 OID 19416)
-- Name: aulas aulas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aulas
    ADD CONSTRAINT aulas_pkey PRIMARY KEY (idaula);


--
-- TOC entry 4709 (class 2606 OID 19424)
-- Name: materiales materiales_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materiales
    ADD CONSTRAINT materiales_pkey PRIMARY KEY (idmateriales);


--
-- TOC entry 4703 (class 2606 OID 19409)
-- Name: tiposmateriales tiposmateriales_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tiposmateriales
    ADD CONSTRAINT tiposmateriales_nombre_key UNIQUE (nombre);


--
-- TOC entry 4705 (class 2606 OID 19407)
-- Name: tiposmateriales tiposmateriales_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tiposmateriales
    ADD CONSTRAINT tiposmateriales_pkey PRIMARY KEY (idtipomaterial);


--
-- TOC entry 4710 (class 2606 OID 19430)
-- Name: materiales materiales_idaula_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materiales
    ADD CONSTRAINT materiales_idaula_fkey FOREIGN KEY (idaula) REFERENCES public.aulas(idaula);


--
-- TOC entry 4711 (class 2606 OID 19425)
-- Name: materiales materiales_idtipomaterial_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materiales
    ADD CONSTRAINT materiales_idtipomaterial_fkey FOREIGN KEY (idtipomaterial) REFERENCES public.tiposmateriales(idtipomaterial);


-- Completed on 2024-09-03 22:23:02

--
-- PostgreSQL database dump complete
--
