<template>
    <div>
        <div class="flex justify-between">
            <a class="text-blue-400 cursor-pointer" @click="$router.back()">
                <span class="text-xs">&#65308;</span> Back
            </a>
        </div>
        <form @submit.prevent="updateForm">
            <InputField name="name" label="Contact Name" placeholder="Contact Name" text="text" @update:field="form.name = $event" :data="form.name" :errors="errors"/>
            <InputField name="email" label="Email Address" placeholder="Email Address" text="text" @update:field="form.email = $event" :data="form.email" :errors="errors"/>
            <InputField name="company" label="Company" placeholder="Company" text="text" @update:field="form.company = $event" :data="form.company" :errors="errors"/>
            <InputField name="birthday" label="Birthday" placeholder="MM/DD/YYYY" text="text" @update:field="form.birthday = $event" :data="form.birthday" :errors="errors"/>
            <div class="flex justify-end">
                <button class="px-4 py-2 rounded mr-5 text-red-700 border hover:border-red-700">Cancel</button>
                <button class="px-4 py-2 rounded text-white bg-blue-500 hover:bg-blue-400">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from "../InputField";
    export default {
        name: "ContactCreate",
        components:{
            InputField
        },
        mounted(){
            axios.get('/api/contacts/' + this.$route.params.id)
                .then(response=>{
                    this.form = response.data.data
                    this.loading = false
                })
                .catch(error=>{
                    this.loading = false
                    if(error.response.status === 404){
                        this.$router.push('/contacts')
                    }
                });
        },
        data:function(){
            return {
                form:{
                    'name':'',
                    'email':'',
                    'company':'',
                    'birthday':'',
                },
                errors: null,
            }
        },
        methods:{
            updateForm: function(){
                axios.patch('/api/contacts/'+this.$route.params.id, this.form)
                    .then(response => {
                        this.$router.push(response.data.links.self)
                    })
                    .catch(errors =>{
                        this.errors = errors.response.data.errors;
                    });
            }
        }
    }
</script>
