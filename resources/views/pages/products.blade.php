<?php

use function Livewire\Volt\{state};
use function Livewire\Volt\{rules};
use App\Models\Product;

rules([
  'name' => 'required|max:100',
  'description' => 'required|max:255',
  'price' => 'required|max:8',
  'amount' => 'required|integer',
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
  $this->price = 0;
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
    <div class="flex flex-col items-center p-8 space-y-4">
      <h1 class="text-2xl font-bold">Add Product</h1>
        <form wire:submit="addProduct" class="flex flex-col justify-start space-y-5 bg-zinc-200 px-6 py-4 rounded-sm w-3/4">
          <label>Name</label>
          <input type="text" wire:model="name" placeholder="Name">
          @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
          <label>Description</label>
          <input type="text" wire:model="description" placeholder="Description">
          @error('description') <p class="text-red-500">{{ $message }}</p> @enderror
          <label>Price</label>
          <input type="number" step="0.01" wire:model="price" placeholder="Price 0.00">
          @error('price') <p class="text-red-500">{{ $message }}</p> @enderror
          <label>Amount</label>
          <input type="number" wire:model="amount" placeholder="Amount">
          @error('amount') <p class="text-red-500">{{ $message }}</p> @enderror
          <button type="submit" class="bg-blue-500 px-8 py-2 rounded-sm text-white self-end">Add</button>
        </form>

        <h1 class="text-2xl font-bold pt-24">Products</h1>
        <table class="w-full">
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Amount</th>
          </tr>
            @foreach ($products as $product)
              <tr class="bg-slate-200 space-x-4 space-y-2 p-4 rounded-2xl">
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
