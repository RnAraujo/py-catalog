CREATE TABLE catalog
(
    id SERIAL PRIMARY KEY,
    item_code CHARACTER(13) NOT NULL,
    description CHARACTER VARYING(200) NOT NULL,
    unit_measurement CHARACTER VARYING(40) NOT NULL,
    expense_clasifier CHARACTER VARYING(30) NULL,
    pricetag DECIMAL(10,2) NOT NULL,
    enabled BOOLEAN NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
