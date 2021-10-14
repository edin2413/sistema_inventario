CREATE OR REPLACE VIEW productos_articulos_marcas_modelos AS select
a.marca_id, a.descripcion_marca,
a.modelo_id, a.descripcion_modelo,
b.id as articulo_id, b.descripcion_articulo,
c.id as producto_id, c.descripcion, c.precio_compra, 
c.precio_venta, c.cantidad_base, c.existencia_agregar, 
c.existencia_actual, c.created_at, c.updated_at
from marcas_modelos as a join articulos as b join productos as c
where a.modelo_id = c.modelo_id and b.id = c.articulo_id
