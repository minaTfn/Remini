<template>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label v-text="countryTitle"></label>
                <select class='form-control select2-ex' :name="countryName" v-model='country' @change='getCities()'>
                    <option v-for='(title, id) in countriesList' :value='id'>{{ title }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label v-text="cityTitle"></label>
                <select class='form-control' :name="cityName" v-model='city'>
                    <option v-for='(title, id) in cities' :value='id'>{{ title }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        props: ['countriesList','countryName', 'cityName', 'countryTitle', 'cityTitle','countryValue','cityValue'],
        data() {
            return {
                country: this.countryValue,
                countries: [],
                city: this.cityValue,
                cities: [],
            }
        },
        methods: {
            getCities: function (firstTime) {
                axios.get('/api/getCities', {
                    params: {
                        country_id: this.country
                    }
                }).then(function (response) {
                    this.cities = response.data.data;
                    if(!firstTime){
                        this.city = Object.keys(this.cities)[0];
                    }
                }.bind(this));
            }
        },
        created: function () {
            const firstTime = 1;
            this.getCities(firstTime);
        }
    }
</script>
