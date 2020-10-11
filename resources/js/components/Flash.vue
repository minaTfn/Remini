<template>
    <div class="snackBar"
         :class="'bg-'+level+' '+status"
         role="alert"
         v-show="show"
         v-text="body">

    </div>
</template>

<script>
    export default {
        props: {
            message:String,
            messageType: {
                type: String,
                default: "success"
            }
        },

        data() {
            return {
                body: this.message,
                level: this.messageType,
                show: false,
                status: 'hide',
            }
        },

        created() {
            if (this.message) {
                this.flash();
            }

            window.events.$on(
                'flash', data => this.flash(data)
            );
        },

        methods: {
            flash(data) {
                if (data) {
                    this.body = data.message;
                    this.level = data.level;
                }

                this.show = true;
                this.status = 'show'

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    };
</script>
