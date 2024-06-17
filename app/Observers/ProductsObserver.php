<?php

namespace App\Observers;

use App\Models\Products;
use App\Models\Images;

class ProductsObserver
{
    /**
     * Handle the Products "created" event.
     */
    public function created(Products $products): void
    {
        $DEFAULT_IMG_URL = 'image-not-found.jpg';
        // Add generic image to product
        $image = new Images();
        $image->productId = $products->id;
        $image->imgURL = $DEFAULT_IMG_URL;
        $image->altText = 'Imagen no encontrada - ' . $products->name;


        $image->save();
    }

    /**
     * Handle the Products "updated" event.
     */
    public function updated(Products $products): void
    {
        //
    }

    /**
     * Handle the Products "deleted" event.
     */
    public function deleted(Products $products): void
    {
        // Delete all related images
        $imageIds = [];
        foreach ($products->images as $image) {
            array_push($imageIds, $image->id);
        }

        $images = Images::whereIn('id', $imageIds)->delete();
    }

    /**
     * Handle the Products "restored" event.
     */
    public function restored(Products $products): void
    {
        //
    }

    /**
     * Handle the Products "force deleted" event.
     */
    public function forceDeleted(Products $products): void
    {
        //
    }
}
