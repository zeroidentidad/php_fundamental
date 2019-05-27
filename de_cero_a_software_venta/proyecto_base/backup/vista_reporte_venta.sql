CREATE view reporte_venta
AS
SELECT
  YEAR(c.fecha) anio,
  MONTH(c.fecha) mes,
  SUM(cd.costo) costo,
  SUM(c.total) total,
  (SUM(c.total - cd.costo)) utilidad
FROM comprobante c
INNER JOIN (
  SELECT comprobante_id, SUM(costo * cantidad) costo FROM comprobante_detalle
  GROUP BY comprobante_id
) cd ON cd.comprobante_id = c.id
WHERE c.anulado = 0
GROUP BY anio, mes
ORDER BY anio desc, mes desc