
CREATE TABLE public.objeto_imagem (
                id_objeto INTEGER NOT NULL,
                id_imagem INTEGER NOT NULL,
                type INTEGER NOT NULL,
                CONSTRAINT objeto_imagem_pk PRIMARY KEY (id_objeto, id_imagem, type)
);
COMMENT ON COLUMN public.objeto_imagem.type IS '1 for prouduto	
2 for semi-novas
3 for noticias

';


CREATE TABLE public.visualizacoes (
                id_objeto INTEGER NOT NULL,
                type INTEGER NOT NULL,
                data DATE NOT NULL,
                CONSTRAINT visualizacoes_pk PRIMARY KEY (id_objeto, type)
);
COMMENT ON COLUMN public.visualizacoes.type IS '1 for prouduto	
2 for semi-novas
3 for noticias
';


CREATE SEQUENCE public.categoria_id_categoria_seq_1;

CREATE TABLE public.categoria (
                id_categoria INTEGER NOT NULL DEFAULT nextval('public.categoria_id_categoria_seq_1'),
                nome VARCHAR NOT NULL,
                CONSTRAINT categoria_pk PRIMARY KEY (id_categoria)
);


ALTER SEQUENCE public.categoria_id_categoria_seq_1 OWNED BY public.categoria.id_categoria;

CREATE SEQUENCE public.marca_id_marca_seq_1;

CREATE TABLE public.marca (
                id_marca INTEGER NOT NULL DEFAULT nextval('public.marca_id_marca_seq_1'),
                nome VARCHAR NOT NULL,
                CONSTRAINT marca_pk PRIMARY KEY (id_marca)
);


ALTER SEQUENCE public.marca_id_marca_seq_1 OWNED BY public.marca.id_marca;

CREATE SEQUENCE public.img_id_img_seq_3;

CREATE TABLE public.img (
                id_img INTEGER NOT NULL DEFAULT nextval('public.img_id_img_seq_3'),
                imagem_path VARCHAR NOT NULL,
                CONSTRAINT img_pk PRIMARY KEY (id_img)
);


ALTER SEQUENCE public.img_id_img_seq_3 OWNED BY public.img.id_img;

CREATE SEQUENCE public.seminovas_id_seminovas_seq;

CREATE TABLE public.seminovas (
                id_seminovas INTEGER NOT NULL DEFAULT nextval('public.seminovas_id_seminovas_seq'),
                marca VARCHAR NOT NULL,
                modelo VARCHAR NOT NULL,
                ano NUMERIC(4) NOT NULL,
                cilindradas INTEGER,
                transmissao VARCHAR,
                partida VARCHAR,
                refrigeracao VARCHAR,
                freio VARCHAR,
                abs BOOLEAN,
                rodas VARCHAR,
                esa BOOLEAN,
                ascs BOOLEAN,
                rdc BOOLEAN,
                bc BOOLEAN,
                observacao VARCHAR,
                bolsas INTEGER,
                motor VARCHAR,
                potencia INTEGER NOT NULL,
                cor VARCHAR NOT NULL,
                km INTEGER NOT NULL,
                estilo VARCHAR,
                preco NUMERIC(12,2) NOT NULL,
                id_img INTEGER NOT NULL,
                CONSTRAINT seminovas_pk PRIMARY KEY (id_seminovas)
);


ALTER SEQUENCE public.seminovas_id_seminovas_seq OWNED BY public.seminovas.id_seminovas;

CREATE SEQUENCE public.noticia_id_noticia_seq;

CREATE TABLE public.noticia (
                id_noticia INTEGER NOT NULL DEFAULT nextval('public.noticia_id_noticia_seq'),
                manchete VARCHAR NOT NULL,
                post VARCHAR NOT NULL,
                data VARCHAR NOT NULL,
                id_img INTEGER NOT NULL,
                CONSTRAINT noticia_pk PRIMARY KEY (id_noticia)
);


ALTER SEQUENCE public.noticia_id_noticia_seq OWNED BY public.noticia.id_noticia;

CREATE SEQUENCE public.produto_id_produto_seq;

CREATE TABLE public.produto (
                id_produto INTEGER NOT NULL DEFAULT nextval('public.produto_id_produto_seq'),
                nome VARCHAR NOT NULL,
                data DATE,
                descricao VARCHAR NOT NULL,
                view_status BOOLEAN NOT NULL,
                preco NUMERIC(12,2) NOT NULL,
                lancamento BOOLEAN NOT NULL,
                id_categoria INTEGER NOT NULL,
                id_marca INTEGER NOT NULL,
                prazo NUMERIC(12,2) NOT NULL,
                parcelas INTEGER NOT NULL,
                id_img INTEGER NOT NULL,
                CONSTRAINT produto_pk PRIMARY KEY (id_produto)
);


ALTER SEQUENCE public.produto_id_produto_seq OWNED BY public.produto.id_produto;

ALTER TABLE public.produto ADD CONSTRAINT categoria_produto_fk
FOREIGN KEY (id_categoria)
REFERENCES public.categoria (id_categoria)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.produto ADD CONSTRAINT marca_produto_fk
FOREIGN KEY (id_marca)
REFERENCES public.marca (id_marca)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.seminovas ADD CONSTRAINT img_seminovas_fk
FOREIGN KEY (id_img)
REFERENCES public.img (id_img)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.noticia ADD CONSTRAINT img_noticia_fk
FOREIGN KEY (id_img)
REFERENCES public.img (id_img)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.produto ADD CONSTRAINT img_produto_fk
FOREIGN KEY (id_img)
REFERENCES public.img (id_img)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;