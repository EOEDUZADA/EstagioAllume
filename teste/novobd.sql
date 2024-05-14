CREATE TABLE produtos (
 id_produto serial primary key,   
 und_produto varchar(255),
 nome_produto varchar(255),
 ncm_produto varchar(255),
 ean_produto varchar(255),
 peso_produto varchar(255),
 tamanho_produto varchar(255),
 cod_barra_produto varchar(255),
 valor_referencia_produto float,
 valor_custo_produto float,
 valor_minimo_produto float,
 
 marca_1 varchar(255),
 modelo_1 varchar(255),
 vcr_compra_1 varchar(255),
 vcr_custo_1 varchar(255),

marca_2 varchar(255),
 modelo_2 varchar(255),
 vcr_compra_2 varchar(255),
 vcr_custo_2 varchar(255),

  marca_3 varchar(255),
 modelo_3 varchar(255),
 vcr_compra_3 varchar(255),
 vcr_custo_3 varchar(255),

  marca_4 varchar(255),
 modelo_4 varchar(255),
 vcr_compra_4 varchar(255),
 vcr_custo_4 varchar(255),

 marca_5 varchar(255),
 modelo_5 varchar(255),
 vcr_compra_5 varchar(255),
 vcr_custo_5 varchar(255)
);

