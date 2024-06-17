<?php

namespace App\Observers;

use App\Models\Products;
use App\Models\Images;

class ImagesObserver
{
    /**
     * Handle the Images "created" event.
     */
    public function created(Images $images): void
    {
        $DEFAULT_IMG_URL = 'image-not-found.jpg';
        // Delete default image
        $product = Products::find($images->productId)->with('images')->first();

        if (count($product->images) > 0 && $product->images->first()->imgURL != $DEFAULT_IMG_URL) {
            $image = $product->images->first();
            $image->delete();
        }
    }

    /**
     * Handle the Images "updated" event.
     */
    public function updated(Images $images): void
    {
        //
    }

    /**
     * Handle the Images "deleted" event.
     */
    public function deleted(Images $images): void
    {
        //
    }

    /**
     * Handle the Images "restored" event.
     */
    public function restored(Images $images): void
    {
        //
    }

    /**
     * Handle the Images "force deleted" event.
     */
    public function forceDeleted(Images $images): void
    {
        //
    }
}
