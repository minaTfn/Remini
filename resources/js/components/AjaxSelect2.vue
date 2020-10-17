<template>
    <div class="form-group ajaxSelect2">

        <input type="hidden" :name="inputName" :value="selectedItem.value"/>

        <label v-text="title"></label>

        <div class="position-relative">
            <label @click="reset" class="select2-reset ajax">
                <i class="fas fa-times"></i>
            </label>
            <model-list-select :list="options"
                               option-value="value"
                               option-text="text"
                               v-model="selectedItem"
                               @searchchange="searchItem"
                               :placeholder="placeholder ? placeholder : 'type something to search...'">
            </model-list-select>
        </div>

    </div>
</template>

<script>
    import {ModelListSelect} from 'vue-search-select'

    export default {
        mounted() {
            this.getSelected();
        },
        props: [
            'api',
            'apiSelected',
            'selected',
            'placeholder',
            'inputName',
            'title'
        ],

        data() {
            return {
                options: [],
                selectedItem: this.selected ? this.selected : {},
                searchText: '',
            }
        },
        methods: {

            getSelected: function () {
                if (this.selected && this.apiSelected) {
                    axios.get(this.apiSelected).then(function (response) {
                        if (response.data.data) {
                            this.options = Object.keys(response.data.data).map(key => ({
                                "value": key,
                                "text": response.data.data[key]
                            }));
                            this.selectedItem = this.options[0];
                        }
                    }.bind(this));
                }
            },
            // codeAndName (item) {   // :custom-text="codeAndName"
            //     return `${item.value} - ${item.text}`
            // },
            searchItem(searchText) {
                this.searchText = searchText;
                if (searchText && searchText.length >= 3) {
                    axios.get(this.api, {
                        params: {
                            name: this.searchText.toString()
                        }
                    }).then(function (response) {
                        this.options = Object.keys(response.data.data).map(key => ({
                            "value": key,
                            "text": response.data.data[key]
                        }));
                    }.bind(this));
                }

            },
            reset() {
                this.selectedItem = {}
            },
        },
        components: {
            ModelListSelect
        }
    }
</script>
<style>
    .ajaxSelect2 i.dropdown.icon {
        display: none;
    }

</style>
