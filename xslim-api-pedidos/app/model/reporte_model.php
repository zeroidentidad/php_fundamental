<?php
namespace App\Model;

use App\Lib\Response;

class ReporteModel
{
    private $db;
    private $response;
    
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    
    public function topEmpleado()
    {
        /*-- top empleados
        SELECT
        e.Imagen,
        e.Nombre,
        COUNT(p.id) pedidos
        FROM empleado e LEFT JOIN pedido p
        ON e.id = p.Empleado_id
        AND p.Estado_id=1
        GROUP BY e.id
        ORDER BY pedidos DESC*/
        
        return $this->db->from("empleado e")
            ->select('e.Imagen, e.Nombre, COUNT(p.id) pedidos')
            ->leftJoin('pedido p ON e.id = p.Empleado_id AND p.Estado_id=1')
            ->groupBy('e.id')
            ->orderBy('pedidos DESC')
            ->fetchAll();              
    }

    public function topProducto()
    {
        /*-- top productos
        SELECT
        pr.Imagen,
        pr.Nombre,
        IFNULL(SUM(pd.Cantidad),0) cantidad,
        IFNULL(SUM(pd.Total),0) total
        FROM producto pr
        LEFT JOIN pedido_detalle pd
        ON pr.id=pd.Producto_id
        LEFT JOIN pedido p
        ON p.id = pd.Pedido_id
        AND p.Estado_id=1
        GROUP BY pr.id
        ORDER BY cantidad DESC, total DESC*/

        return $this->db->from("producto pr")
            ->select('pr.Imagen, pr.Nombre, IFNULL(SUM(pd.Cantidad),0) cantidad, IFNULL(SUM(pd.Total),0) total')
            ->leftJoin('pedido_detalle pd ON pr.id=pd.Producto_id')
            ->leftJoin('pedido p ON p.id = pd.Pedido_id AND p.Estado_id=1')
            ->groupBy('pr.id')
            ->orderBy('cantidad DESC, total DESC')
            ->fetchAll();   
    }

    public function ventaMensual()
    {
        /*-- ventas mensuales
        SELECT
        CONCAT(YEAR(p.Fecha), ", ", MONTH(p.Fecha)) periodo,
        SUM(p.Total) total
        FROM pedido p
        WHERE p.Estado_id=1
        GROUP BY periodo
        ORDER BY periodo DESC
        */

        return $this->db->from("pedido p")
            ->select("CONCAT(YEAR(p.Fecha), ', ', MONTH(p.Fecha)) periodo, IFNULL(SUM(p.Total),0) total")
            ->where('p.Estado_id=1')
            ->groupBy('YEAR(p.Fecha), MONTH(p.Fecha)')
            ->orderBy('periodo DESC')
            ->fetchAll();   
    }    

}