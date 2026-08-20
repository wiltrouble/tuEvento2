<?php

use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'products' => Product::where('active', true)->get(),
    ]);
});

Route::get('/login', function () {
    return view('auth.login', [
        'needsAdmin' => User::count() === 0,
    ]);
})->middleware('guest')->name('login');

Route::post('/login', function (Request $request) {
    $validated = $request->validateWithBag('login', [
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El correo electrónico no es válido.',
        'password.required' => 'La contraseña es obligatoria.',
    ]);

    if (! Auth::attempt($validated, $request->boolean('remember'))) {
        return back()
            ->withErrors(['email' => 'Las credenciales no son válidas.'], 'login')
            ->onlyInput('email');
    }

    $request->session()->regenerate();

    return redirect('/dashboard');
});

Route::post('/registro', function (Request $request) {
    if (User::count() > 0) {
        abort(404);
    }

    $validated = $request->validateWithBag('registro', [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required',
        'password' => 'required|min:6',
    ], [
        'name.required' => 'El nombre es obligatorio.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El correo electrónico no es válido.',
        'email.unique' => 'Ese correo electrónico ya está registrado.',
        'phone.required' => 'El teléfono es obligatorio.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
    ]);

    $user = User::create($validated);
    Auth::login($user);
    $request->session()->regenerate();

    return redirect('/dashboard');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
});

Route::middleware('auth')->group(function () {
Route::get('/clientes', function () {
    $clients = Client::all();

    return view('clientes.index', [
        'clients' => $clients,
    ]);
});

Route::get('/clientes/nuevo', function () {
    return view('clientes.nuevo');
});

Route::post('/clientes/nuevo', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'nullable|email',
        'address' => 'nullable',
    ], [
        'name.required' => 'El nombre es obligatorio.',
        'phone.required' => 'El teléfono es obligatorio.',
        'email.email' => 'El correo electrónico no es válido.',
    ]);

    Client::create($validated);

    return redirect('/clientes');
});

Route::get('/categorias', function () {
    $categories = Category::all();

    return view('categorias.index', [
        'categories' => $categories,
    ]);
});

Route::get('/categorias/nuevo', function () {
    return view('categorias.nuevo');
});

Route::post('/categorias/nuevo', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'nullable',
    ], [
        'name.required' => 'El nombre es obligatorio.',
    ]);

    Category::create($validated);

    return redirect('/categorias');
});

Route::get('/categorias/{id}/editar', function ($id) {
    $category = Category::findOrFail($id);

    return view('categorias.editar', [
        'category' => $category,
    ]);
});

Route::post('/categorias/{id}/editar', function (Request $request, $id) {
    $category = Category::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required',
        'description' => 'nullable',
    ], [
        'name.required' => 'El nombre es obligatorio.',
    ]);

    $category->update($validated);

    return redirect('/categorias');
});

Route::get('/productos', function (Request $request) {
    $categories = Category::all();
    $categoryId = $request->query('category_id');

    $products = Product::with('category');

    if ($categoryId) {
        $products->where('category_id', $categoryId);
    }

    return view('productos.index', [
        'products' => $products->get(),
        'categories' => $categories,
        'categoryId' => $categoryId,
    ]);
});

Route::get('/productos/nuevo', function () {
    $categories = Category::all();

    return view('productos.nuevo', [
        'categories' => $categories,
    ]);
});

Route::post('/productos/nuevo', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'category_id' => 'required',
        'stock_quantity' => 'required|integer|min:0',
        'price' => 'required|integer|min:0',
        'active' => 'nullable',
    ], [
        'name.required' => 'El nombre es obligatorio.',
        'category_id.required' => 'La categoría es obligatoria.',
        'stock_quantity.required' => 'La cantidad en stock es obligatoria.',
        'stock_quantity.integer' => 'La cantidad en stock debe ser un número entero.',
        'stock_quantity.min' => 'La cantidad en stock no puede ser negativa.',
        'price.required' => 'El precio es obligatorio.',
        'price.integer' => 'El precio debe ser un número entero.',
        'price.min' => 'El precio no puede ser negativo.',
    ]);

    $validated['active'] = $request->has('active');

    Product::create($validated);

    return redirect('/productos');
});

Route::get('/cotizaciones', function (Request $request) {
    $status = $request->query('status');

    $quotations = Quotation::with('client');

    if ($status) {
        $quotations->where('status', $status);
    }

    return view('cotizaciones.index', [
        'quotations' => $quotations->get(),
        'status' => $status,
    ]);
});
});

Route::get('/cotizaciones/rapida', function () {
    $products = Product::where('active', true)->get();

    return view('cotizaciones.rapida', [
        'products' => $products,
    ]);
});

Route::post('/cotizaciones/rapida', function (Request $request) {
    $validated = $request->validate([
        'client_name' => 'required',
        'phone' => 'nullable',
        'event_date' => 'required|date',
        'event_type' => 'required',
        'event_address' => 'required',
        'notes' => 'nullable',
        'quantities' => 'nullable|array',
        'quantities.*' => 'integer|min:0',
    ], [
        'client_name.required' => 'El nombre del cliente es obligatorio.',
        'event_date.required' => 'La fecha del evento es obligatoria.',
        'event_date.date' => 'La fecha del evento no es válida.',
        'event_type.required' => 'El tipo de evento es obligatorio.',
        'event_address.required' => 'La dirección del evento es obligatoria.',
        'quantities.*.integer' => 'La cantidad debe ser un número entero.',
        'quantities.*.min' => 'La cantidad no puede ser negativa.',
    ]);

    $quantities = $validated['quantities'] ?? [];
    $stockErrors = [];
    $items = [];
    $subtotal = 0;

    foreach ($quantities as $productId => $quantity) {
        $quantity = (int) $quantity;

        if ($quantity <= 0) {
            continue;
        }

        $product = Product::find($productId);

        if (! $product || ! $product->active) {
            $stockErrors["quantities.$productId"] = 'El producto no está disponible.';
            continue;
        }

        if ($quantity > $product->stock_quantity) {
            $stockErrors["quantities.$productId"] = "La cantidad de {$product->name} supera el stock disponible ({$product->stock_quantity}).";
            continue;
        }

        $unitPrice = $product->price;
        $itemSubtotal = $quantity * $unitPrice;

        $items[] = [
            'name' => $product->name,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'subtotal' => $itemSubtotal,
        ];

        $subtotal += $itemSubtotal;
    }

    if ($stockErrors !== []) {
        return back()->withErrors($stockErrors)->withInput();
    }

    if ($items === []) {
        return back()->withErrors([
            'quantities' => 'Seleccione al menos un producto.',
        ])->withInput();
    }

    $shareLines = [
        '*Cotiza tu evento*',
        'Cotización rápida',
        '',
        'Cliente: '.$validated['client_name'],
        'Fecha: '.$validated['event_date'],
        'Tipo: '.$validated['event_type'],
        'Dirección: '.$validated['event_address'],
    ];

    if (! empty($validated['phone'])) {
        $shareLines[] = 'Teléfono del cliente: '.$validated['phone'];
    }

    if (! empty($validated['notes'])) {
        $shareLines[] = 'Notas: '.$validated['notes'];
    }

    $shareLines[] = '';
    $shareLines[] = 'Productos:';

    foreach ($items as $item) {
        $shareLines[] = '- '.$item['name'].' x '.$item['quantity'].' = '.$item['subtotal'];
    }

    $shareLines[] = '';
    $shareLines[] = 'Total: '.$subtotal;

    $shareText = implode("\n", $shareLines);
    $adminPhone = preg_replace('/\D+/', '', (string) User::query()->orderBy('id')->value('phone'));
    $whatsappUrl = $adminPhone !== ''
        ? 'https://wa.me/'.$adminPhone.'?text='.rawurlencode($shareText)
        : 'https://wa.me/?text='.rawurlencode($shareText);

    return view('cotizaciones.rapida-resultado', [
        'clientName' => $validated['client_name'],
        'phone' => $validated['phone'] ?? null,
        'eventDate' => $validated['event_date'],
        'eventType' => $validated['event_type'],
        'eventAddress' => $validated['event_address'],
        'notes' => $validated['notes'] ?? null,
        'items' => $items,
        'total' => $subtotal,
        'shareText' => $shareText,
        'whatsappUrl' => $whatsappUrl,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'clientsCount' => Client::count(),
            'categoriesCount' => Category::count(),
            'productsCount' => Product::count(),
            'quotationsCount' => Quotation::count(),
            'pendingCount' => Quotation::where('status', 'pending')->count(),
            'approvedCount' => Quotation::where('status', 'approved')->count(),
        ]);
    });

    Route::post('/perfil', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'password' => 'nullable|min:6',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'phone.required' => 'El teléfono es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        $user = $request->user();
        $user->name = $validated['name'];
        $user->phone = $validated['phone'];

        if (! empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect('/dashboard');
    });

    Route::get('/usuarios', function () {
        return view('usuarios.index', [
            'users' => User::all(),
        ]);
    });

    Route::get('/usuarios/nuevo', function () {
        return view('usuarios.nuevo');
    });

    Route::post('/usuarios/nuevo', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'Ese correo electrónico ya está registrado.',
            'phone.required' => 'El teléfono es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        User::create($validated);

        return redirect('/usuarios');
    });

Route::get('/cotizaciones/nueva', function () {
    $clients = Client::all();
    $products = Product::where('active', true)->get();

    return view('cotizaciones.nueva', [
        'clients' => $clients,
        'products' => $products,
    ]);
});

Route::post('/cotizaciones/nueva', function (Request $request) {
    $validated = $request->validate([
        'client_id' => 'required',
        'event_date' => 'required|date',
        'event_type' => 'required',
        'event_address' => 'required',
        'notes' => 'nullable',
        'quantities' => 'nullable|array',
        'quantities.*' => 'integer|min:0',
    ], [
        'client_id.required' => 'El cliente es obligatorio.',
        'event_date.required' => 'La fecha del evento es obligatoria.',
        'event_date.date' => 'La fecha del evento no es válida.',
        'event_type.required' => 'El tipo de evento es obligatorio.',
        'event_address.required' => 'La dirección del evento es obligatoria.',
        'quantities.*.integer' => 'La cantidad debe ser un número entero.',
        'quantities.*.min' => 'La cantidad no puede ser negativa.',
    ]);

    $quantities = $validated['quantities'] ?? [];
    $stockErrors = [];

    foreach ($quantities as $productId => $quantity) {
        $quantity = (int) $quantity;

        if ($quantity <= 0) {
            continue;
        }

        $product = Product::find($productId);

        if (! $product || ! $product->active) {
            $stockErrors["quantities.$productId"] = 'El producto no está disponible.';
            continue;
        }

        if ($quantity > $product->stock_quantity) {
            $stockErrors["quantities.$productId"] = "La cantidad de {$product->name} supera el stock disponible ({$product->stock_quantity}).";
        }
    }

    if ($stockErrors !== []) {
        return back()->withErrors($stockErrors)->withInput();
    }

    $quotation = Quotation::create([
        'client_id' => $validated['client_id'],
        'event_date' => $validated['event_date'],
        'event_type' => $validated['event_type'],
        'event_address' => $validated['event_address'],
        'notes' => $validated['notes'] ?? null,
        'status' => 'pending',
        'subtotal' => 0,
        'discount' => 0,
        'total' => 0,
    ]);

    $subtotal = 0;

    foreach ($quantities as $productId => $quantity) {
        $quantity = (int) $quantity;

        if ($quantity <= 0) {
            continue;
        }

        $product = Product::find($productId);
        $unitPrice = $product->price;
        $itemSubtotal = $quantity * $unitPrice;

        QuotationItem::create([
            'quotation_id' => $quotation->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'subtotal' => $itemSubtotal,
        ]);

        $subtotal += $itemSubtotal;
    }

    $quotation->subtotal = $subtotal;
    $quotation->discount = 0;
    $quotation->total = $subtotal;
    $quotation->save();

    return redirect('/cotizaciones');
});

Route::get('/cotizaciones/{id}/editar', function ($id) {
    $quotation = Quotation::with('quotationItems')->findOrFail($id);
    $clients = Client::all();
    $itemProductIds = $quotation->quotationItems->pluck('product_id');
    $products = Product::query()
        ->where('active', true)
        ->orWhereIn('id', $itemProductIds)
        ->get();
    $quantities = $quotation->quotationItems->pluck('quantity', 'product_id');

    return view('cotizaciones.editar', [
        'quotation' => $quotation,
        'clients' => $clients,
        'products' => $products,
        'quantities' => $quantities,
    ]);
});

Route::post('/cotizaciones/{id}/editar', function (Request $request, $id) {
    $quotation = Quotation::findOrFail($id);

    $validated = $request->validate([
        'client_id' => 'required',
        'event_date' => 'required|date',
        'event_type' => 'required',
        'event_address' => 'required',
        'notes' => 'nullable',
        'discount' => 'required|integer|min:0',
        'quantities' => 'nullable|array',
        'quantities.*' => 'integer|min:0',
    ], [
        'client_id.required' => 'El cliente es obligatorio.',
        'event_date.required' => 'La fecha del evento es obligatoria.',
        'event_date.date' => 'La fecha del evento no es válida.',
        'event_type.required' => 'El tipo de evento es obligatorio.',
        'event_address.required' => 'La dirección del evento es obligatoria.',
        'discount.required' => 'El descuento es obligatorio.',
        'discount.integer' => 'El descuento debe ser un número entero.',
        'discount.min' => 'El descuento no puede ser negativo.',
        'quantities.*.integer' => 'La cantidad debe ser un número entero.',
        'quantities.*.min' => 'La cantidad no puede ser negativa.',
    ]);

    $quantities = $validated['quantities'] ?? [];
    $stockErrors = [];

    foreach ($quantities as $productId => $quantity) {
        $quantity = (int) $quantity;

        if ($quantity <= 0) {
            continue;
        }

        $product = Product::find($productId);

        if (! $product) {
            $stockErrors["quantities.$productId"] = 'El producto no está disponible.';
            continue;
        }

        if ($quantity > $product->stock_quantity) {
            $stockErrors["quantities.$productId"] = "La cantidad de {$product->name} supera el stock disponible ({$product->stock_quantity}).";
        }
    }

    if ($stockErrors !== []) {
        return back()->withErrors($stockErrors)->withInput();
    }

    $quotation->quotationItems()->delete();

    $subtotal = 0;

    foreach ($quantities as $productId => $quantity) {
        $quantity = (int) $quantity;

        if ($quantity <= 0) {
            continue;
        }

        $product = Product::find($productId);
        $unitPrice = $product->price;
        $itemSubtotal = $quantity * $unitPrice;

        QuotationItem::create([
            'quotation_id' => $quotation->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'subtotal' => $itemSubtotal,
        ]);

        $subtotal += $itemSubtotal;
    }

    $discount = (int) $validated['discount'];

    $quotation->client_id = $validated['client_id'];
    $quotation->event_date = $validated['event_date'];
    $quotation->event_type = $validated['event_type'];
    $quotation->event_address = $validated['event_address'];
    $quotation->notes = $validated['notes'] ?? null;
    $quotation->subtotal = $subtotal;
    $quotation->discount = $discount;
    $quotation->total = $subtotal - $discount;
    $quotation->save();

    return redirect('/cotizaciones/'.$quotation->id);
});

Route::post('/cotizaciones/{id}/eliminar', function ($id) {
    $quotation = Quotation::findOrFail($id);
    $quotation->quotationItems()->delete();
    $quotation->delete();

    return redirect('/cotizaciones');
});

Route::post('/cotizaciones/{id}/pendiente', function ($id) {
    $quotation = Quotation::findOrFail($id);
    $quotation->status = 'pending';
    $quotation->save();

    return redirect('/cotizaciones/'.$quotation->id);
});

Route::post('/cotizaciones/{id}/aprobada', function ($id) {
    $quotation = Quotation::findOrFail($id);
    $quotation->status = 'approved';
    $quotation->save();

    return redirect('/cotizaciones/'.$quotation->id);
});

Route::post('/cotizaciones/{id}/rechazada', function ($id) {
    $quotation = Quotation::findOrFail($id);
    $quotation->status = 'rejected';
    $quotation->save();

    return redirect('/cotizaciones/'.$quotation->id);
});

Route::post('/cotizaciones/{id}/cancelada', function ($id) {
    $quotation = Quotation::findOrFail($id);
    $quotation->status = 'cancelled';
    $quotation->save();

    return redirect('/cotizaciones/'.$quotation->id);
});

Route::get('/cotizaciones/{id}', function ($id) {
    $quotation = Quotation::with(['client', 'quotationItems.product'])->findOrFail($id);

    return view('cotizaciones.show', [
        'quotation' => $quotation,
    ]);
});
});
