<?php

namespace App\Models;

use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Delivery extends Model {
    use HasFactory, Sluggable, HasTrixRichText;
    use FormAccessible;
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * by default with all the relations data
     * @var array
     */
    protected $with = ['owner:id,name'];

    /**
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }



    /**
     * get the all query strings and apply them to the eloquent model
     * @param $query
     * @param QueryFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, QueryFilter $filters) {
        return $filters->apply($query);
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
        return $this->belongsTo(User::class, 'user_id', 'id')->where('role', '=', User::SiteUSER);
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
        return $this->belongsTo(Country::class, 'origin_country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function originCity() {
        return $this->belongsTo(City::class, 'origin_city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destinationCountry() {
        return $this->belongsTo(Country::class, 'destination_country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destinationCity() {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

    public function getMaximumDeadlineForHumansAttribute() {
        return $this->maximum_deadline ? Carbon::parse($this->maximum_deadline)->diffForHumans() : '-';
    }

    public function getRequestDateAttribute() {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function formMaximumDeadlineAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d');
    }

    public function getDestinationAttribute() {
        return "{$this->destinationCountry->title} - {$this->destinationCity->title}";
    }

    public function getOriginAttribute() {
        return "{$this->originCountry->title} - {$this->originCity->title}";
    }

}
