

CREATE OR REPLACE VIEW view_hitorico_productos  AS SELECT 
b.marca_id AS marca_id, b.descripcion_marca AS descripcion_marca,
b.modelo_id AS modelo_id, b.descripcion_modelo AS descripcion_modelo, 
b.articulo_id AS articulo_id, b.descripcion_articulo AS descripcion_articulo, 
a.producto_id AS producto_id, a.descripcion AS descripcion, 
a.precio_compra AS precio_compra, a.precio_venta AS precio_venta, 
a.cantidad_base AS cantidad_base, a.existencia_agregar AS existencia_agregar, 
a.existencia_actual AS existencia_actual, a.created_at AS created_at, 
a.updated_at AS updated_at 
FROM (historico_productos a join productos_articulos_marcas_modelos b)
WHERE a.producto_id = b.producto_id ;
