<template>
    <div>
        <form @submit.prevent="submitForm">
            <InputField name="name" label="Contact Name" placeholder="Contact Name" text="text" @update:field="form.name = $event" :errors="errors"/>
            <InputField name="email" label="Email Address" placeholder="Email Address" text="text" @update:field="form.email = $event" :errors="errors"/>
            <InputField name="company" label="Company" placeholder="Company" text="text" @update:field="form.company = $event" :errors="errors"/>
            <InputField name="birthday" label="Birthday" placeholder="MM/DD/YYYY" text="text" @update:field="form.birthday = $event" :errors="errors"/>
            <div class="flex justify-end">
                <router-link to="/"><button class="px-4 py-2 rounded mr-5 text-red-700 border hover:border-red-700">Cancel</button></router-link>
                <button class="px-4 py-2 rounded text-white bg-blue-500 hover:bg-blue-400">Add New Contact</button>
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
        data:function(){
            return {
                form:{
                    'name':'',
                    'email':'',
                    'company':'',
                    'birthday':'',
                },
                errors: null
            }
        },
        methods:{
            submitForm: function(){
                axios.post('/api/contacts', this.form)
                    .then(response => {
                        this.$route.push(response.data.links.self)
                    })
                    .catch(errors =>{
                        this.errors = errors.response.data.errors;
                    });
            }
        }
    }
</script>
