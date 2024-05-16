CREATE TABLE produtos (
 id_produto INT AUTO_INCREMENT PRIMARY KEY,   
 und varchar(255),
 nome_produto varchar(255),
 ncm varchar(255),
 ean varchar(255),
 peso varchar(255),
 tamanho varchar(255),
 cod_barra varchar(255)
 );


CREATE TABLE marcas(
 id_marca INT AUTO_INCREMENT PRIMARY KEY,
 marca varchar(255),
 modelo varchar(255),
 vcr_compra varchar(255),
 vcr_custo varchar(255),
 id_produto int,
 FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);