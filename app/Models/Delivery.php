<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
class Delivery extends Model {
    use HasFactory, Sluggable, HasTrixRichText;
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * delivery_contact_method pivot table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contactMethods() {
        return $this->belongsToMany(
            ContactMethod::class,
            'delivery_contact_method',
            'delivery_id',
            'contact_method_id'
        )->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner() {
        return $this->belongsTo(User::class,'user_id','id')->where('role','=', User::SiteUSER);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deliveryMethod() {
        return $this->belongsTo(DeliveryMethod::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function originCountry() {
        return $this->belongsTo(Country::class,'origin_country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function originCity() {
        return $this->belongsTo(City::class,'origin_city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destinationCountry() {
        return $this->belongsTo(Country::class,'destination_country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destinationCity() {
        return $this->belongsTo(City::class,'destination_city_id');
    }

}
