<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    // Adicionar produto ao carrinho
    public function carrinho(Request $request)
    {
        $productId = $request->input('product_id');  // ID do produto
        $quantity = $request->input('quantity', 1);   // Quantidade (padrão: 1)

        // Recupera o carrinho da sessão
        $carrinho = session()->get('carrinho', []);

        // Verifica se o produto já está no carrinho
        if (isset($carrinho[$productId])) {
            $carrinho[$productId]['quantity'] += $quantity;  // Incrementa a quantidade
        } else {
            // Adiciona novo produto ao carrinho
            $carrinho[$productId] = [
                'name' => $request->input('product_name'),
                'price' => $request->input('product_price'),
                'quantity' => $quantity,
            ];
        }

        // Atualiza o carrinho na sessão
        session()->put('carrinho', $carrinho);

        // Atualiza o contador de itens
        session()->put('cart_count', array_sum(array_column($carrinho, 'quantity')));

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    // Exibir o carrinho
    public function showCart()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho', compact('carrinho'));
    }

    // Remover produto do carrinho
    public function removeFromCart($productId)
    {
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$productId])) {
            unset($carrinho[$productId]);
        }

        session()->put('carrinho', $carrinho);
        session()->put('cart_count', array_sum(array_column($carrinho, 'quantity')));

        return redirect()->back()->with('success', 'Produto removido do carrinho!');
    }

    // Atualizar quantidade de um produto no carrinho
    public function updateQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$productId])) {
            // Atualiza a quantidade (remove se for 0 ou menor)
            if ($quantity > 0) {
                $carrinho[$productId]['quantity'] = $quantity;
            } else {
                unset($carrinho[$productId]);
            }
        }

        session()->put('carrinho', $carrinho);
        session()->put('cart_count', array_sum(array_column($carrinho, 'quantity')));

        return redirect()->back()->with('success', 'Quantidade atualizada com sucesso!');
    }
}
