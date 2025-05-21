<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class CarrinhoController extends Controller
{
    // Adicionar item ao carrinho
    public function addToCart(Request $request)
    {
        $equipment = Equipment::findOrFail($request->equipment_id);
        $quantity = max(1, (int) $request->quantity);

        $cart = session()->get('cart', []);

        if (isset($cart[$equipment->id])) {
            $cart[$equipment->id]['quantity'] += $quantity;
        } else {
            $cart[$equipment->id] = [
                'name' => $equipment->name,
                'brand' => $equipment->brand,
                'reference' => $equipment->reference,
                'image' => $equipment->image,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);
        $this->updateCartCount($cart); // 👉 Atualiza o total

        return redirect()->route('carrinho.exibir')->with('success', 'Produto adicionado ao carrinho!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->updateCartCount($cart); // 👉 Atualiza o total
            return redirect()->route('carrinho.exibir')->with('success', 'Produto removido do carrinho!');
        }

        return redirect()->route('carrinho.exibir')->with('error', 'Produto não encontrado no carrinho.');
    }

    public function updateQuantity(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            $this->updateCartCount($cart); // 👉 Atualiza o total
            return redirect()->route('carrinho.exibir')->with('success', 'Quantidade atualizada com sucesso!');
        }

        return redirect()->route('carrinho.exibir')->with('error', 'Produto não encontrado no carrinho.');
    }

    // 🔁 Atualiza a contagem total de itens no carrinho
    private function updateCartCount($cart)
    {
        $totalItems = array_sum(array_column($cart, 'quantity'));
        session()->put('cart_count', $totalItems);
    }
}
