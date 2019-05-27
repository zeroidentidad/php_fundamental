CREATE VIEW reporte_producto
AS
SELECT
  c.id,
  YEAR(c.fecha) anio,
  MONTH(c.fecha) mes,
  p.nombre producto,
  cd.cantidad,
  cd.costo,
  cd.total,
  (cd.total - cd.costo) utilidad
FROM comprobante c
INNER JOIN comprobante_detalle cd
ON cd.comprobante_id = c.id
INNER JOIN producto p
ON p.id = cd.producto_id
WHERE c.anulado = 0