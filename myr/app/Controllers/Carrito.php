<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CarritoModel;
use App\Models\ProductModel;

class Carrito extends Controller
{
    protected $carritoModel;
    
    public function __construct()
    {
        $this->carritoModel = new CarritoModel();
        helper(['form', 'url']);
    }
    
    public function index()
    {
        if (!session('id')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión');
        }
        
        $data = [
            'items' => $this->carritoModel->getCarritoUsuario(session('id')),
            'total' => $this->carritoModel->getTotalCarrito(session('id'))
        ];
        
        return view('carrito', $data);
    }
    
    public function agregar()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['error' => 'Método no permitido']);
        }
        
        $producto_id = $this->request->getPost('producto_id');
        $cantidad = $this->request->getPost('cantidad') ?? 1;
        
        // Verificar si el producto existe
        $productModel = new ProductModel();
        if (!$productModel->find($producto_id)) {
            return $this->response->setJSON(['error' => 'Producto no encontrado']);
        }
        
        // Verificar si ya está en el carrito
        $item = $this->carritoModel->where([
            'usuario_id' => session('id'),
            'producto_id' => $producto_id
        ])->first();
        
        if ($item) {
            // Actualizar cantidad
            $this->carritoModel->update($item['id'], ['cantidad' => $item['cantidad'] + $cantidad]);
        } else {
            // Agregar nuevo item
            $this->carritoModel->insert([
                'usuario_id' => session('id'),
                'producto_id' => $producto_id,
                'cantidad' => $cantidad
            ]);
        }
        
        return $this->response->setJSON([
            'success' => true,
            'count' => $this->carritoModel->contarItems(session('id'))
        ]);
    }
    
    public function actualizar()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['error' => 'Método no permitido']);
        }
        
        $item_id = $this->request->getPost('item_id');
        $change = $this->request->getPost('change');
        
        $item = $this->carritoModel->find($item_id);
        
        if (!$item || $item['usuario_id'] != session('id')) {
            return $this->response->setJSON(['error' => 'Item no válido']);
        }
        
        $nueva_cantidad = $item['cantidad'] + $change;
        
        if ($nueva_cantidad < 1) {
            return $this->response->setJSON(['error' => 'La cantidad no puede ser menor a 1']);
        }
        
        $this->carritoModel->update($item_id, ['cantidad' => $nueva_cantidad]);
        
        return $this->response->setJSON([
            'success' => true,
            'newQuantity' => $nueva_cantidad,
            'newTotal' => $this->carritoModel->getTotalCarrito(session('id'))
        ]);
    }
    
    public function eliminar($id)
    {
        $item = $this->carritoModel->find($id);
        
        if (!$item || $item['usuario_id'] != session('id')) {
            return redirect()->back()->with('error', 'Item no válido');
        }
        
        $this->carritoModel->delete($id);
        
        return redirect()->to('/carrito')->with('success', 'Producto eliminado del carrito');
    }
    
    public function contarItems()
    {
        if (!session('id')) {
            return $this->response->setJSON(['count' => 0]);
        }
        
        return $this->response->setJSON([
            'count' => $this->carritoModel->contarItems(session('id'))
        ]);
    }
}