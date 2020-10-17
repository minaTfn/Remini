<template>
    <div class="form-group">

        <input type="hidden" :name="inputName" :value="selectedItem"/>

        <label v-text="title"></label>
        <div class="position-relative">
            <label @click="reset" class="select2-reset">
                <i class="fas fa-times"></i>
            </label>
            <model-select :options="data"
                          v-model="selectedItem"
                          :placeholder="placeholder ? placeholder : 'select an item...'">
            </model-select>
        </div>
    </div>
</template>

<script>
    import {ModelSelect} from 'vue-search-select'

    export default {
        mounted() {
            this.data = Object.keys(this.options).map(key => ({"value": key, "text": this.options[key]}));
        },

        props: [
            'options',
            'selected',
            'placeholder',
            'inputName',
            'title'
        ],
        data() {
            return {
                selectedItem: this.selected ? this.selected : '',
                searchText: '',
                data: [],
            }
        },
        methods: {
            reset() {
                this.selectedItem = ''
            },
        },
        components: {
            ModelSelect
        }
    }
</script>
