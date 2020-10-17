<?php

namespace App\Models;

use Carbon\Carbon;

class DeliveryFilter extends QueryFilter {

    /**
     * filter title based on title item in query string
     * @param $value
     * @return mixed
     */
    public function title($value) {
        return $this->builder->where('title', 'like', "%{$value}%");
    }

    /**
     * filter created_at based on requestDate item in query string
     * @param $value date format
     * @return mixed
     */
    public function requestDate($value) {
        return $this->builder->whereBetween('created_at', [Carbon::parse($value)->startOfDay(), Carbon::parse($value)->endOfDay()]);
    }

    /**
     * filter maximum_deadline based on deadlineDate item in query string
     * @param $value date format
     * @return mixed
     */
    public function deadlineDate($value) {
        return $this->builder->whereBetween('maximum_deadline', [Carbon::parse($value)->startOfDay(), Carbon::parse($value)->endOfDay()]);
    }

    /**
     * filter user_id based on owner item in query string
     * @param $userID
     * @return mixed
     */
    public function owner($userID) {
        return $this->builder->where('user_id', $userID);
    }

    /**
     * filter origin_country_id based on fromCountry item in query string
     * @param $value
     * @return mixed
     */
    public function fromCountry($value) {
        return $this->builder->where('origin_country_id', $value);
    }

    /**
     * filter origin_city_id based on fromCity item in query string
     * @param $value
     * @return mixed
     */
    public function fromCity($value) {
        return $this->builder->where('origin_city_id', $value);
    }

    /**
     * filter destination_country_id based on toCountry item in query string
     * @param $value
     * @return mixed
     */
    public function toCountry($value) {
        return $this->builder->where('destination_country_id', $value);
    }

    /**
     * filter destination_city_id based on toCity item in query string
     * @param $value
     * @return mixed
     */
    public function toCity($value) {
        return $this->builder->where('destination_city_id', $value);
    }

}
