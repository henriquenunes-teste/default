--
-- PostgreSQL database dump
--

-- Dumped from database version 13.15
-- Dumped by pg_dump version 16.3

-- Started on 2026-05-21 07:24:23

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
-- TOC entry 5 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 200 (class 1259 OID 41027)
-- Name: carrinho; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carrinho (
    id integer NOT NULL,
    usuario_id integer NOT NULL,
    total numeric(10,2) NOT NULL
);


ALTER TABLE public.carrinho OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 41030)
-- Name: carrinho_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.carrinho_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.carrinho_id_seq OWNER TO postgres;

--
-- TOC entry 3067 (class 0 OID 0)
-- Dependencies: 201
-- Name: carrinho_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.carrinho_id_seq OWNED BY public.carrinho.id;


--
-- TOC entry 202 (class 1259 OID 41032)
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categoria (
    id integer NOT NULL,
    cor character(7) NOT NULL,
    nome character varying(120) NOT NULL
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 41035)
-- Name: categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categoria_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categoria_id_seq OWNER TO postgres;

--
-- TOC entry 3068 (class 0 OID 0)
-- Dependencies: 203
-- Name: categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categoria_id_seq OWNED BY public.categoria.id;


--
-- TOC entry 204 (class 1259 OID 41037)
-- Name: itens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.itens (
    id integer NOT NULL,
    produto_id integer NOT NULL,
    carrinho_id integer NOT NULL,
    quantidade integer NOT NULL,
    preco numeric(10,2) NOT NULL
);


ALTER TABLE public.itens OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 41040)
-- Name: itens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.itens_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.itens_id_seq OWNER TO postgres;

--
-- TOC entry 3069 (class 0 OID 0)
-- Dependencies: 205
-- Name: itens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.itens_id_seq OWNED BY public.itens.id;


--
-- TOC entry 206 (class 1259 OID 41042)
-- Name: pagamento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pagamento (
    id integer NOT NULL,
    valor numeric(10,2) NOT NULL,
    data date NOT NULL,
    taxa numeric(5,2) NOT NULL
);


ALTER TABLE public.pagamento OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 41045)
-- Name: pagamento_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pagamento_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pagamento_id_seq OWNER TO postgres;

--
-- TOC entry 3070 (class 0 OID 0)
-- Dependencies: 207
-- Name: pagamento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pagamento_id_seq OWNED BY public.pagamento.id;


--
-- TOC entry 208 (class 1259 OID 41047)
-- Name: produto_categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produto_categoria (
    id integer NOT NULL,
    produto_id integer NOT NULL,
    categoria_id integer NOT NULL
);


ALTER TABLE public.produto_categoria OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 41050)
-- Name: produto_categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produto_categoria_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produto_categoria_id_seq OWNER TO postgres;

--
-- TOC entry 3071 (class 0 OID 0)
-- Dependencies: 209
-- Name: produto_categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produto_categoria_id_seq OWNED BY public.produto_categoria.id;


--
-- TOC entry 210 (class 1259 OID 41052)
-- Name: produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produtos (
    id integer NOT NULL,
    nome character varying(150) NOT NULL,
    preco numeric(10,2) NOT NULL,
    quantidade integer NOT NULL,
    foto character varying(160)
);


ALTER TABLE public.produtos OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 41055)
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produtos_id_seq OWNER TO postgres;

--
-- TOC entry 3072 (class 0 OID 0)
-- Dependencies: 211
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_id_seq OWNED BY public.produtos.id;


--
-- TOC entry 212 (class 1259 OID 41057)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(90) NOT NULL,
    senha character varying(120) NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 41060)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO postgres;

--
-- TOC entry 3073 (class 0 OID 0)
-- Dependencies: 213
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- TOC entry 2887 (class 2604 OID 41201)
-- Name: carrinho id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carrinho ALTER COLUMN id SET DEFAULT nextval('public.carrinho_id_seq'::regclass);


--
-- TOC entry 2888 (class 2604 OID 41202)
-- Name: categoria id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria ALTER COLUMN id SET DEFAULT nextval('public.categoria_id_seq'::regclass);


--
-- TOC entry 2889 (class 2604 OID 41203)
-- Name: itens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens ALTER COLUMN id SET DEFAULT nextval('public.itens_id_seq'::regclass);


--
-- TOC entry 2890 (class 2604 OID 41204)
-- Name: pagamento id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pagamento ALTER COLUMN id SET DEFAULT nextval('public.pagamento_id_seq'::regclass);


--
-- TOC entry 2891 (class 2604 OID 41205)
-- Name: produto_categoria id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_categoria ALTER COLUMN id SET DEFAULT nextval('public.produto_categoria_id_seq'::regclass);


--
-- TOC entry 2892 (class 2604 OID 41206)
-- Name: produtos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN id SET DEFAULT nextval('public.produtos_id_seq'::regclass);


--
-- TOC entry 2893 (class 2604 OID 41207)
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- TOC entry 3047 (class 0 OID 41027)
-- Dependencies: 200
-- Data for Name: carrinho; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3049 (class 0 OID 41032)
-- Dependencies: 202
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3051 (class 0 OID 41037)
-- Dependencies: 204
-- Data for Name: itens; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3053 (class 0 OID 41042)
-- Dependencies: 206
-- Data for Name: pagamento; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3055 (class 0 OID 41047)
-- Dependencies: 208
-- Data for Name: produto_categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3057 (class 0 OID 41052)
-- Dependencies: 210
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3059 (class 0 OID 41057)
-- Dependencies: 212
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3074 (class 0 OID 0)
-- Dependencies: 201
-- Name: carrinho_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.carrinho_id_seq', 1, true);


--
-- TOC entry 3075 (class 0 OID 0)
-- Dependencies: 203
-- Name: categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categoria_id_seq', 1, false);


--
-- TOC entry 3076 (class 0 OID 0)
-- Dependencies: 205
-- Name: itens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.itens_id_seq', 1, false);


--
-- TOC entry 3077 (class 0 OID 0)
-- Dependencies: 207
-- Name: pagamento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pagamento_id_seq', 1, false);


--
-- TOC entry 3078 (class 0 OID 0)
-- Dependencies: 209
-- Name: produto_categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produto_categoria_id_seq', 1, false);


--
-- TOC entry 3079 (class 0 OID 0)
-- Dependencies: 211
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_id_seq', 1, false);


--
-- TOC entry 3080 (class 0 OID 0)
-- Dependencies: 213
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 2, true);


--
-- TOC entry 2895 (class 2606 OID 41070)
-- Name: carrinho carrinho_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carrinho
    ADD CONSTRAINT carrinho_pkey PRIMARY KEY (id);


--
-- TOC entry 2897 (class 2606 OID 41072)
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id);


--
-- TOC entry 2899 (class 2606 OID 41074)
-- Name: itens itens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens
    ADD CONSTRAINT itens_pkey PRIMARY KEY (id);


--
-- TOC entry 2901 (class 2606 OID 41076)
-- Name: pagamento pagamento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pagamento
    ADD CONSTRAINT pagamento_pkey PRIMARY KEY (id);


--
-- TOC entry 2903 (class 2606 OID 41078)
-- Name: produto_categoria produto_categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_categoria
    ADD CONSTRAINT produto_categoria_pkey PRIMARY KEY (id);


--
-- TOC entry 2905 (class 2606 OID 41080)
-- Name: produtos produtos_nome_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_nome_key UNIQUE (nome);


--
-- TOC entry 2907 (class 2606 OID 41082)
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- TOC entry 2909 (class 2606 OID 41084)
-- Name: usuarios usuarios_nome_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_nome_key UNIQUE (nome);


--
-- TOC entry 2911 (class 2606 OID 41086)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- TOC entry 2912 (class 2606 OID 41087)
-- Name: carrinho carrinho_usuario_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carrinho
    ADD CONSTRAINT carrinho_usuario_id_fkey FOREIGN KEY (usuario_id) REFERENCES public.usuarios(id);


--
-- TOC entry 2913 (class 2606 OID 41092)
-- Name: itens itens_carrinho_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens
    ADD CONSTRAINT itens_carrinho_id_fkey FOREIGN KEY (carrinho_id) REFERENCES public.carrinho(id);


--
-- TOC entry 2914 (class 2606 OID 41097)
-- Name: itens itens_produto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens
    ADD CONSTRAINT itens_produto_id_fkey FOREIGN KEY (produto_id) REFERENCES public.produtos(id);


--
-- TOC entry 2915 (class 2606 OID 41102)
-- Name: produto_categoria produto_categoria_categoria_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_categoria
    ADD CONSTRAINT produto_categoria_categoria_id_fkey FOREIGN KEY (categoria_id) REFERENCES public.categoria(id);


--
-- TOC entry 2916 (class 2606 OID 41107)
-- Name: produto_categoria produto_categoria_produto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_categoria
    ADD CONSTRAINT produto_categoria_produto_id_fkey FOREIGN KEY (produto_id) REFERENCES public.produtos(id);


--
-- TOC entry 3066 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2026-05-21 07:24:23

--
-- PostgreSQL database dump complete
--

