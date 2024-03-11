CREATE TABLE product (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, price DECIMAL(18, 2) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE product_photo (id BIGINT AUTO_INCREMENT, product_id BIGINT, filename VARCHAR(255), caption VARCHAR(255) NOT NULL, INDEX product_id_idx (product_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE product_photo ADD CONSTRAINT product_photo_product_id_product_id FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE;
