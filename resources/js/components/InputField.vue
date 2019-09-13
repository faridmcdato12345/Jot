<template>
    <div class="relative pb-4">
        <label :for="name" class="uppercase text-blue-500 pt-2 text-xs font-bold absolute">{{label}}</label>
        <input :type="text" :id="name" class="pt-8 w-full text-gray-900 focus:outline-none focus:border-blue-400 border-b" :class="errorClassObject()" :placeholder="placeholder" @input="updateField()" v-model="value">
        <p class="text-red-600 text-xs" v-text="errorMessage()">Error here</p>
    </div>
</template>

<script>
    export default {
        name: 'InputField',
        props:[
            'name','label','placeholder','text','errors','data'
        ],
        data: function(){
            return {
                value: ''
            }
        },
        computed: {
            hasError: function(){
                return this.errors && this.errors[this.name] && this.errors[this.name].length > 0
            }
        },
        methods:{
            updateField: function(){
                this.errorClear(this.name)
                this.$emit('update:field',this.value)
            },
            errorMessage: function(){
                if(this.hasError){
                    return this.errors[this.name][0];
                }
            },
            errorClear:function(){
                if(this.hasError){
                    this.errors[this.name]= null;
                }
            },
            errorClassObject: function(){
                return {
                     'error-field': this.hasError
                }
            }
        },
        watch: {
            data: function(val){
                this.value = val
            }
        }
    }
</script>
<style scoped>
    .error-field{
        @apply .border-red-500 .border-b-2;
    }
</style>
