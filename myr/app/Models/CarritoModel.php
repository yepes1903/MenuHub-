<?php
namespace App\Models;

use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'producto_id', 'cantidad', 'fecha_agregado'];
    protected $returnType = 'array';
    
    public function getCarritoUsuario($usuario_id)
    {
        return $this->select('carrito.*, productos.nombre, productos.precio, productos.imagen, productos.categoria')
                   ->join('productos', 'productos.id = carrito.producto_id')
                   ->where('usuario_id', $usuario_id)
                   ->findAll();
    }
    
    
    public function getTotalCarrito($usuario_id)
{
    // Opción 1: Usando una expresión más simple
    $result = $this->select('SUM(productos.precio * carrito.cantidad) as total')
                  ->join('productos', 'productos.id = carrito.producto_id')
                  ->where('usuario_id', $usuario_id)
                  ->first();
    
    // Opción 2: Alternativa más compatible
    /*
    $result = $this->db->query("
        SELECT SUM(productos.precio * carrito.cantidad) as total
        FROM carrito
        JOIN productos ON productos.id = carrito.producto_id
        WHERE carrito.usuario_id = ?
    ", [$usuario_id])->getRowArray();
    */
    
    return $result['total'] ?? 0;
}

    public function contarItems($usuario_id)
    {
        return $this->where('usuario_id', $usuario_id)->countAllResults();
    }
}