<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'attributes' // For product variations if needed
    ];

    protected $casts = [
        'attributes' => 'array'
    ];

    /**
     * Relationship to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Add item to cart
     */
    public static function add(array $data)
    {
        return self::create([
            'user_id' => $data['user_id'] ?? auth()->id(),
            'product_id' => $data['id'],
            'quantity' => $data['quantity'] ?? 1,
            'price' => $data['price'],
            'attributes' => $data['attributes'] ?? null
        ]);
    }

    /**
     * Get cart items for current user
     */
    public static function items()
    {
        return self::where('user_id', auth()->id())->with('product')->get();
    }
}