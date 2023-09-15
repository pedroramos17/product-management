<?php

use function Livewire\Volt\{state};
use function Livewire\Volt\{rules};
use App\Models\Product;

rules([
  'name' => 'required|max:100',
  'description' => 'required|max:255',
  'price' => 'required|integer|max:8',
  'amount' => 'required|integer|max:10',
]);

state(
  name: '',
  description: '',
  price: 0.00,
  amount: 0,
  products: fn () => Product::all(),
);

$addProduct = function () {
  $this->validate();

  Product::create([
    'name' => $this->name,
    'description' => $this->description,
    'price' => $this->price,
    'amount' => $this->amount,
]);

  $this->name = '';
  $this->description = '';
  $this->price = 0.00;
  $this->amount = 0;
  $this->products = Product::all();
};
?>

<!DOCTYPE html>
<head>
  <title>Products</title>
  @vite('resources/css/app.css')
</head>
<body>
  @volt
    <div class="flex flex-col items-center p-4 space-y-4">
      <h1 class="text-2xl font-bold">Add Product</h1>
        <form wire:submit="addProduct" class="flex flex-col justify-center space-y-5 bg-zinc-200 px-10 py-4 rounded-sm ">
          <input type="text" wire:model="name" placeholder="Name">
          <input type="text" wire:model="description" placeholder="Description">
          <input type="text" wire:model="price" placeholder="Price">
          <input type="number" wire:model="amount" placeholder="Amount">
          <button type="submit" class="bg-blue-500 px-8 py-2 rounded-sm text-white self-end">Add</button>
        </form>

        <h1 class="text-2xl font-bold pt-24">Products</h1>
        <table class="table-auto flex justify-start items-end">
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Amount</th>
          </tr>
            @foreach ($products as $product)
              <tr class=" bg-slate-200 space-x-4 space-y-2 p-4 ">
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->amount }}</td>
              </tr>
            @endforeach
        </table>
    </div>
  @endvolt
</body>
</html>
