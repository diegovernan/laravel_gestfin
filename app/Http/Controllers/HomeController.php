<?php

namespace App\Http\Controllers;

use App\Category;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\TransactionRequest;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $month = empty($request->get('month')) ? date('m') : $request->get('month');
        $year = empty($request->get('year')) ? date('Y') : $request->get('year');

        $transactions = Transaction::where('user_id', auth()->user()->id)->whereMonth('date', $month)->whereYear('date', $year)->orderBy('date')->get();

        $categories = Category::where('user_id', auth()->user()->id)->latest()->get();

        $month_zero = Transaction::where('user_id', auth()->user()->id)->whereMonth('date', $month)->whereYear('date', $year)->whereType(0)->sum('value');
        $month_one = Transaction::where('user_id', auth()->user()->id)->whereMonth('date', $month)->whereYear('date', $year)->whereType(1)->sum('value');

        $year_zero = Transaction::where('user_id', auth()->user()->id)->whereYear('date', $year)->whereType(0)->sum('value');
        $year_one = Transaction::where('user_id', auth()->user()->id)->whereYear('date', $year)->whereType(1)->sum('value');

        $all_zero = Transaction::where('user_id', auth()->user()->id)->whereType(0)->sum('value');
        $all_one = Transaction::where('user_id', auth()->user()->id)->whereType(1)->sum('value');

        return view('home', compact('transactions', 'categories', 'month_zero', 'month_one', 'year_zero', 'year_one', 'all_zero', 'all_one'));
    }

    public function storeCategory(CategoryRequest $request)
    {
        $category = new Category;
        $category->user_id = auth()->user()->id;
        $category->name = $request->name;

        $category->save();

        return redirect()->back()->with('success', 'Categoria adicionada!');
    }

    public function storeTransaction(TransactionRequest $request)
    {
        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->category_id = $request->category_id;
        $transaction->type = $request->type;
        $transaction->date = $request->date;
        $transaction->description = $request->description;
        $transaction->value = str_replace(",", ".", $request->value);

        $transaction->save();

        return redirect()->back()->with('success', 'Transação adicionada!');
    }

    public function updateCategory(CategoryRequest $request, Category $category)
    {
        $category->user_id = auth()->user()->id;
        $category->name = $request->name;

        $category->save();

        return redirect()->back()->with('success', 'Categoria atualizada!');
    }

    public function updateTransaction(TransactionRequest $request, Transaction $transaction)
    {
        $transaction->user_id = auth()->user()->id;
        $transaction->category_id = $request->category_id;
        $transaction->type = $request->type;
        $transaction->date = $request->date;
        $transaction->description = $request->description;
        $transaction->value = str_replace(",", ".", $request->value);

        $transaction->save();

        return redirect()->back()->with('success', 'Transação atualizada!');
    }

    public function deleteCategory(Category $category)
    {
        try {
            $category->delete();

            return redirect()->back()->with('success', 'Categoria excluída!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('A categoria não pode ser excluída. Apenas categorias sem transações podem ser excluídas.');
        }
    }

    public function deleteTransaction(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->back()->with('success', 'Transação excluída!');
    }
}
