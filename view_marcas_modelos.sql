
CREATE OR REPLACE VIEW marcas_modelos  AS  select 
a.id as marca_id,
a.descripcion_marca,
b.id as modelo_id,
b.descripcion_modelo

from marcas as a join modelos as b
    where a.id = b.marca_id